<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;

class CommentsController extends Controller
{
    public function index()
    {
        $comments = Comment::allFor(Input::get('type'), Input::get('id'));
        return Response::json($comments, 200, [], JSON_NUMERIC_CHECK);
    }

    public function store(Requests\StoreCommentRequest $request)
    {
        $model_id = Input::get('commentable_id');
        $model = Input::get('commentable_type');
        if (Comment::isCommentable($model, $model_id)) {
            $comment = Comment::create([
                'commentable_id' => $model,
                'commentable_type' => $model_id,
                'content' => Input::get('content'),
                'email' => Input::get('email'),
                'username' => Input::get('username'),
                'reply' => Input::get('reply', 0),
                'ip' => $request->ip(),
            ]);
            return Response::json($comment, 200, [], JSON_NUMERIC_CHECK);
        } else {
            return Response::json("This content is not commentable", 422);
        }
    }

    public function destroy($id)
    {
        $comment = Comment::find($id);
        if ($comment->ip == \Illuminate\Support\Facades\Request::ip) {
            Comment::where('reply', '=', $comment->id)->delete();
            $comment->delete();
            return Response::json($comment, 200, [], JSON_NUMERIC_CHECK);
        } else {
            return Response::json('This comment is not yours', 403);
        }
    }
}