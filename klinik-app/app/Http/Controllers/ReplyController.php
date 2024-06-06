<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Reply;
use Illuminate\Support\Facades\Auth;

class ReplyController extends Controller
{
    public function store(Request $request, Post $post)
    {
        $request->validate([
            'body' => 'required',
        ]);

        $reply = new Reply([
            'body' => $request->get('body'),
            'user_id' => auth()->user()->id,
            'post_id' => $post->id, // Make sure to associate reply with the post
        ]);
        $reply->save();

        return back()->with('success', 'Reply posted successfully.');
    }

    public function edit(Reply $reply)
    {
        if (Auth::id() !== $reply->user_id) {
            return redirect()->back()->with('error', 'You do not have permission to edit this reply.');
        }

        return view('Pasien.Forum.Replies.edit', compact('reply'));
    }

    public function update(Request $request, Reply $reply)
    {
        if (Auth::id() !== $reply->user_id) {
            return redirect()->back()->with('error', 'You do not have permission to update this reply.');
        }

        $request->validate([
            'body' => 'required',
        ]);

        $reply->update($request->only(['body']));

        return redirect()->route('treatments.index')->with('success', 'Reply updated successfully.');
    }

    public function destroy(Reply $reply)
    {
        if (Auth::id() == $reply->user_id || Auth::id() == $reply->post->user_id || Auth::user()->is_admin) {
            $reply->delete();
            return back()->with('success', 'Reply deleted successfully.');
        }
    
        return back()->with('error', 'You do not have permission to delete this reply.');
    }
    

    
}
