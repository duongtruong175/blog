<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Comment;

class BackendCommentController extends Controller
{
    // Variable to the directory contains a view
    protected $folder = 'backend.comment.';
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get all data
        $comments = Comment::with(['user', 'article'])->paginate(5);

        $viewdata = [
            'comments' => $comments
        ];

        return view($this->folder . 'index', $viewdata);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $comment = Comment::findOrFail($id);

        $comment->delete();

        return redirect()->route('backend_comment.destroy');
    }
}
