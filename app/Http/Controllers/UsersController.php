<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Comment;

class UsersController extends Controller
{
    public function show($id)
    {
        $user = User::find($id);
        
        $articles = $user->articles()->orderBy('created_at', 'desc')->paginate(10);
        $comments = $user->comments()->orderBy('created_at', 'desc')->paginate(10);

        $data = [
            'user' => $user,
            'articles' => $articles,
            'comments' => $comments,
        ];

        $data += $this->counts($user);

        return view('users.show', $data);

    }
    public function comments($id)
    {
        $user = User::find($id);
        
        $articles = $user->articles()->orderBy('created_at', 'desc')->paginate(10);
        $comments = $user->comments()->orderBy('created_at', 'desc')->paginate(10);

        $data = [
            'user' => $user,
            'articles' => $articles,
            'comments' => $comments,
        ];

        $data += $this->counts($user);

        return view('users.comments', $data);

    }
}
