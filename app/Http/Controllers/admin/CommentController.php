<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FormCommentRequest;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function show(Request $request)
    {
        return json_encode(Comment::getAllCommentsForPhoto($request->idSet));
    }

    public function store(FormCommentRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->user()->id;
        Comment::saveComment($data);
        return back();
    }
}
