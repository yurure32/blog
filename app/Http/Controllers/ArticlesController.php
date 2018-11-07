<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\User;

use App\Article;

use App\Comment;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(\Auth::check()) {
            $articles = Article::orderBy('created_at', 'desc')->paginate(10);
            
            return view('articles.index', [
                'articles' => $articles
            ]);
        }else {
            return view('welcome');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $article = new Article;
        
        return view('articles.create', [
            'article' => $article
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:30',
            'content' => 'required|max:1200',
        ]);
        
        $request->user()->articles()->create([
            'title' => $request->title,
            'content' => $request->content,
        ]);
        
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::find($id);
        $comments = Comment::where('article_id',$id)->orderBy('created_at', 'desc')->paginate(10);
        
        return view('articles.show', [
            'article' => $article,
            'comments' => $comments
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::find($id);
        if (\Auth::id() === $article->user_id) {
            return view('articles.edit', [
                'article' => $article,
            ]);
        }
        return view('/');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|max:30',
            'content' => 'required|max:1200',
        ]);
        
        $article = Article::find($id);
        
        if (\Auth::id() === $article->user_id) {
            $article->title = $request->title;
            $article->content = $request->content;
            $article->save();
        }
        
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::find($id);
        
        if (\Auth::id() === $article->user_id) {
            $article->delete();
        }
        
        return redirect('/');
    }
}
