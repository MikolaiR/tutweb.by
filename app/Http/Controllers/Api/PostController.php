<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class PostController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $query = Post::with(['category', 'tags', 'media'])
            ->where('is_active', true)
            ->where('published_at', '<=', now())
            ->orderByDesc('published_at');

        if ($request->has('category')) {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        if ($request->has('tag')) {
            $query->whereHas('tags', function ($q) use ($request) {
                $q->where('slug', $request->tag);
            });
        }

        $posts = $query->paginate(12);

        return response()->json($posts);
    }

    public function show(Post $post): JsonResponse
    {
        if (!$post->is_active || $post->published_at > now()) {
            abort(404);
        }

        $post->load(['category', 'tags', 'media']);
        
        return response()->json($post);
    }
}
