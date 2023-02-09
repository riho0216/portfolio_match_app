<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    private $comment;

    public function __construct(Comment $comment)
    {
        $this->comment = $comment;
    }

    public function store($post_id, Request $request)
    {
        $request->validate([
            'comment_body'.$post_id => 'required|max:200',
        ],[
            'comment_body'.$post_id . '.required' => 'Cannot submit an empty comment',
            'comment_body'.$post_id . '.max' => 'The comment must contain not greter than 200 characters'
        ]);
        
        $this->comment->user_id = Auth::user()->id;
        $this->comment->post_id = $post_id;
        $this->comment->body = $request->input('comment_body'.$post_id);
        $this->comment->save();

        return redirect()->back();
    }

    public function destroy($id)
    {
        $comment = $this->comment->findOrFail($id);
        $comment->delete();
        return redirect()->back();
    }
}
