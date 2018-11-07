<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\User;

use App\Article;

use App\Comment;

class CommentsController extends Controller
{
    public function store(Request $request) 
    {
        $this->validate($request, [
            'content' => 'required|max:400',
        ]);
        
        
        $request->user()->comments()->create([
            'article_id' => $request->article_id,
            'content' => $request->content,
        ]);
        
        return redirect()->back();
    }
    
    public function destroy($id)
    {
        $comment = Comment::find($id);
        
        if (\Auth::id() === $comment->user_id) {
            $comment->delete();
        }
        
        return redirect()->back();
    }
}
