<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;

class CommentsController extends Controller
{
    public function index()
    {
        $comments = Comment::where(['commentable_id' => Input::get('id'), 'commentable_type' => Input::get('type')])->get();
        return Response::json($comments);
    }
}