<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::withCount('replies')->latest()->get();
        return view('Pasien.Forum.Posts.index', compact('posts'));
    }

    public function create()
    {
        return view('Pasien.Forum.Posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);

        $post = new Post([
            'title' => $request->get('title'),
            'body' => $request->get('body'),
            'user_id' => auth()->user()->id,
        ]);
        $post->save();

        return redirect()->route('posts.index')->with('success', 'Post created successfully.');
    }

    public function edit(Post $post)
    {
        if (Auth::id() !== $post->user_id) {
            return redirect()->route('posts.index')->with('error', 'You do not have permission to edit this post.');
        }

        return view('Pasien.Forum.Posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        if (Auth::id() !== $post->user_id) {
            return redirect()->route('posts.index')->with('error', 'You do not have permission to update this post.');
        }

        $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);

        $post->update($request->only(['title', 'body']));

        return redirect()->route('posts.index')->with('success', 'Post updated successfully.');
    }

    public function destroy(Post $post)
    {
        if (Auth::user()->is_admin || Auth::id() == $post->user_id) {
            $post->delete();
            return redirect()->route('posts.index')->with('success', 'Post deleted successfully.');
        }
    
        return redirect()->route('posts.index')->with('error', 'You do not have permission to delete this post.');
    }

    public function show(Post $post)
    {
        $replies = $post->replies()->latest()->get();
        return view('Pasien.Forum.Posts.show', compact('post', 'replies'));
    }
}
