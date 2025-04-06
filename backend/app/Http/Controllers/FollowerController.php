<?php

namespace App\Http\Controllers;

use App\Helpers\ErrorResponse;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Follow;

class FollowerController extends Controller
{
    public function index(string $username)
    {
        $user = User::where('username', $username)->firstOrFail();

        $follower = $user->follower()
            ->with('follower')
            ->get()
            ->map(fn ($f) => [
                'id' => $f->follower->id,
                'fullname' => $f->follower->fullname,
                'username' => $f->follower->username,
                'bio' => $f->follower->bio,
                'is_private' => $f->follower->is_private,
                'created_at' => $f->follower->created_at,
                'is_requested' => $f->is_accepted ? 0 : 1,
            ]);

        return response()->json(['followers' => $follower]);
    }

    public function accept(Request $request, string $username)
    {
        $authUser = User::where('username', $request->user()->username)->firstOrFail();
        $requester = User::where('username', $username)->first();

        !$requester && ErrorResponse::error(['message' => 'User not found'], 404);

        $follow = Follow::where([
            ['follower_id', $requester->id],
            ['following_id', $authUser->id],
        ])->first();

        !$follow && ErrorResponse::error(['message' => 'The user is not following you'], 422);

        $follow->is_accepted && ErrorResponse::error(['message' => 'Follow request is already accepted'], 422);

        $follow->update(['is_accepted' => 1]);

        return response()->json(['message' => 'Follow request accepted']);
    }
}
