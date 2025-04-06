<?php

namespace App\Http\Controllers;

use App\Helpers\ErrorResponse;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Models\PostAttachment;

class PostController extends Controller
{
    public function index(Request $request)
    {

    }

    public function store(Request $request)
{
    $request->validate([
        'caption' => 'required|string|max:255',
        'images.*' => 'required|image|mimes:jpg,jpeg,png,webp,gif',
    ]);

    $user = User::where('username', $request->user()->username)->firstOrFail();

    $imageUrl = collect($request->file('images'))->map(function ($file) use ($user) {
        $path = $file->store("posts/{$user->username}", 'public');
        return Storage::url($path);
    });

    $post = $user->posts()->create([
        'caption' => $request->caption,
    ]);

    $attachment = $imageUrl->map(fn ($url) => [
        'url' => $url,
        'post_id' => $post->id,
    ]);

    PostAttachment::insert($attachment->toArray());

    return response()->json([
        'message' => 'Create post success',
    ], 201);
}

    public function destroy(Request $request, int $id)
    {
        $authUser = $request->user();
        $post = Post::with('postAttachment')->find($id);

        !$post && ErrorResponse::error(['message' => 'Post not found'], 404);

        !($authUser->username === $post->user->username) && ErrorResponse::error(['message' => 'Forbidden access'], 403);

        $post->delete();

        return response()->json([
            'message' => 'Delete post success',
        ]);
    }
}
