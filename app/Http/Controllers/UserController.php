<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function articles()
    {
        $user = $request->user();
        dd($user->articles);

        return view('user.articles', compact('articles'));
    }
}
