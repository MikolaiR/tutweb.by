<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BlogController extends Controller
{
    public function index(Request $request): View
    {
        $query = Post::where('is_active', true)
            ->where('published_at', '<=', now());

        // Search functionality
        if ($request->search) {
            $searchTerm = $request->search;
            $query->where(function ($q) use ($searchTerm) {
                $q->whereTranslationLike('title', "%{$searchTerm}%")
                  ->orWhereTranslationLike('content', "%{$searchTerm}%")
                  ->orWhereTranslationLike('excerpt', "%{$searchTerm}%");
            });
        }

        // Category filter
        $activeCategory = null;
        if ($request->category) {
            $activeCategory = Category::where('slug', $request->category)->firstOrFail();
            $query->where('category_id', $activeCategory->id);
        }

        // Tag filter
        $activeTag = null;
        if ($request->tag) {
            $activeTag = Tag::where('slug', $request->tag)->firstOrFail();
            $query->whereHas('tags', function ($q) use ($activeTag) {
                $q->where('tags.id', $activeTag->id);
            });
        }

        // Get posts with related data
        $posts = $query->with(['category', 'tags', 'media'])
            ->orderByDesc('published_at')
            ->paginate(9)
            ->withQueryString();

        // Get categories with post count
        $categories = Category::withCount(['posts' => function ($query) {
                $query->where('is_active', true)
                    ->where('published_at', '<=', now());
            }])
            ->whereHas('posts', function ($query) {
                $query->where('is_active', true)
                    ->where('published_at', '<=', now());
            })
            ->orderBy('name')
            ->get();

        // Get popular tags
        $tags = Tag::withCount(['posts' => function ($query) {
                $query->where('is_active', true)
                    ->where('published_at', '<=', now());
            }])
            ->whereHas('posts', function ($query) {
                $query->where('is_active', true)
                    ->where('published_at', '<=', now());
            })
            ->orderByDesc('posts_count')
            ->limit(15)
            ->get();

        return view('blog.index', compact('posts', 'categories', 'tags', 'activeCategory', 'activeTag'));
    }

    public function show(Post $post): View
    {
        abort_if(!$post->is_active || $post->published_at > now(), 404);

        // Load relationships
        $post->load(['category', 'tags']);

        // Get related posts based on category and tags
        $relatedPosts = Post::where('is_active', true)
            ->where('published_at', '<=', now())
            ->where('id', '!=', $post->id)
            ->where(function ($query) use ($post) {
                $query->where('category_id', $post->category_id)
                    ->orWhereHas('tags', function ($q) use ($post) {
                        $q->whereIn('tags.id', $post->tags->pluck('id'));
                    });
            })
            ->with(['category', 'media'])
            ->inRandomOrder()
            ->limit(3)
            ->get();

        // Get next and previous posts
        $nextPost = Post::where('is_active', true)
            ->where('published_at', '<=', now())
            ->where('published_at', '>', $post->published_at)
            ->orderBy('published_at')
            ->first();

        $previousPost = Post::where('is_active', true)
            ->where('published_at', '<=', now())
            ->where('published_at', '<', $post->published_at)
            ->orderByDesc('published_at')
            ->first();

        return view('blog.show', compact('post', 'relatedPosts', 'nextPost', 'previousPost'));
    }
}
