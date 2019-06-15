<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function newComment(Request $request)
    {
        $comment = new Comment([
            'ticket_id' => $request->get('ticket_id'),
            'content' => $request->get('content'),
            'ticket_type' => $request->get('ticket_type')
        ]);
        $comment->save();

        return redirect()->back()->with('msg', 'Your comment has been created!');
    }
}
