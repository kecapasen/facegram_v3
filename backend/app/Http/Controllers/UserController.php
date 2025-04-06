<?php

namespace App\Http\Controllers;

use App\Helpers\ErrorResponse;
use App\Models\User;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $authUser = User::where('username', $request->user()->username)->firstOrFail();

        $user = User::where('id', '!=', $authUser->id)
            ->whereDoesntHave('follower', fn ($q) => $q->where('follower_id', $authUser->id))
            ->get(['id', 'fullname', 'username', 'bio', 'is_private', 'created_at']);

        $user->isEmpty() && ErrorResponse::error(['message' => 'User not found'], 404);

        return response()->json(['users' => $user]);
    }

    public function show(Request $request, string $username)
    {
        $authUser = User::where('username', $request->user()->username)->firstOrFail();

        $user = User::with([
            'post.postAttachment',
            'follower',
            'following' => fn ($q) => $q->where('follower_id', $authUser->id)
        ])
        ->withCount(['post', 'follower', 'following'])
        ->where('username', $username)
        ->first();

        !$user && ErrorResponse::error(['message' => 'User not found'], 404);

        $isYourAccount = $authUser->id === $user->id;

        $follow = $user->following->first();
        $followingStatus = $isYourAccount ? null : ($follow?->is_accepted ? 'following' : 'requested');

        $canViewPosts = !$user->is_private || $follow?->is_accepted;

        return response()->json([
            'id' => $user->id,
            'fullname' => $user->fullname,
            'username' => $user->username,
            'bio' => $user->bio,
            'is_private' => $user->is_private,
            'created_at' => $user->created_at,
            'is_your_account' => $isYourAccount,
            'following_status' => $followingStatus,
            'posts_count' => $user->post_count,
            'followers_count' => $user->follower_count,
            'following_count' => $user->following_count,
            'posts' => $canViewPosts ? $user->post : [],
        ]);
    }
}
