<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCommentRequest;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCommentRequest $request)
    {
        // Validate errors (StoreCommentRequest validated)
        $comment = Comment::create([
            'article_id' => $request->article_id,
            'user_id' => $request->user_id,
            'content' => $request->content
        ]);

        if($comment) {
            $user_name = $comment->user->name;
            $time_created = $comment->time_elapsed_string($comment->created_at);
            $content = $comment->content;
            return response()->json([
                'user_name' => $user_name,
                'time_created' => $time_created,
                'content' => $content
            ]);
        } else {
            return abort(500);
        }
    }
}
