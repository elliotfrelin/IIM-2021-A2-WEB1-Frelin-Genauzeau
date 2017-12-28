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
        $comments = Comment::allFor(Input::get('type'), Input::get('id'));
        return Response::json($comments, 200, [], JSON_NUMERIC_CHECK);
    }
}