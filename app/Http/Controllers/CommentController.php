<?php
namespace App\Http\Controllers\Admin;

use App\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index(Post $post)
    {
        return response()->json(
            $post->comments()
                ->with('user')
                ->orderBy('created_at', 'DESC')
                ->get()
        );
    }

    public function store(Request $request, Post $post)
    {

        $comment = $post->comments()->create([
            'body' => $request->body,
            'user_id' => auth()->id()
        ])->load('user');

        event(new CommentSent($comment));
        
        return response()->json($comment);
    }
}
