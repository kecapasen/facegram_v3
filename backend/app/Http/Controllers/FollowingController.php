<?php

namespace App\Http\Controllers;

use App\Helpers\ErrorResponse;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Follow;

class FollowingController extends Controller
{
    public function index(Request $request)
    {
        $user = User::where('username', $request->user()->username)->firstOrFail();

        $following = $user->following()
            ->with('following')
            ->get()
            ->map(fn ($f) => [
                'id' => $f->following->id,
                'fullname' => $f->following->fullname,
                'username' => $f->following->username,
                'bio' => $f->following->bio,
                'is_private' => $f->following->is_private,
                'is_verified' => $f->following->is_verified,
                'created_at' => $f->following->created_at,
                'is_requested' => $f->is_accepted ? 0 : 1,
            ]);

        return response()->json(['following' => $following]);
    }

    public function follow(Request $request, string $username)
    {
        $authUser = User::where('username', $request->user()->username)->firstOrFail();
        $targetUser = User::where('username', $username)->first();

        !$targetUser && ErrorResponse::error(['message' => 'User not found'], 404);
        $authUser->id === $targetUser->id && ErrorResponse::error(['message' => 'You are not allowed to follow yourself'], 422);

        $exists = Follow::where('follower_id', $authUser->id)
            ->where('following_id', $targetUser->id)
            ->exists();

        $exists && ErrorResponse::error([
            'message' => 'You are already followed',
            'status' => $targetUser->is_private ? 'requested' : 'following',
        ], 422);

        $follow = Follow::create([
            'follower_id' => $authUser->id,
            'following_id' => $targetUser->id,
            'is_accepted' => !$targetUser->is_private,
        ]);

        return response()->json([
            'message' => 'Follow success',
            'status' => $follow->is_accepted ? 'following' : 'requested',
        ]);
    }

    public function unfollow(Request $request, string $username)
    {
        $authUser = User::where('username', $request->user()->username)->firstOrFail();
        $targetUser = User::where('username', $username)->first();

        !$targetUser && ErrorResponse::error(['message' => 'User not found'], 404);

        $deleted = Follow::where('follower_id', $authUser->id)
            ->where('following_id', $targetUser->id)
            ->delete();

        !$deleted && ErrorResponse::error(['message' => 'You are not following the user'], 422);

        return response()->json([], 204);
    }
}
