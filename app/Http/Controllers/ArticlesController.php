<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\User;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show');
    }
    public function index()
    {
        $articles = Article::orderBy("created_at", "desc")->paginate(10);
        return view('articles.articles', compact('articles'));
    }

    public function show($id)
    {
        $article = Article::with([
            'comments' => function ($query) {
                $query->with('user');
            }
        ])->findOrFail($id);         //dd($article);
        // ddd($article);
        return view('articles.show', compact('article'));
    }
    public function create()
    {
        $this->authorize('create', Article::class);
        return view('articles.create');
    }
    public function store(Request $request)
    {
        $this->authorize('create', Article::class);

        // vérification des permissions plus tard
        $user = User::find(1);
        $request['user_id'] = $user->id;

        $this->validate($request, [
            'title' => 'required|string',
            'body' => 'required|string',
            'user_id' => 'required|numeric|exists:users,id',
        ]);

        $art = Article::create($request->all());
        // dd($art);
        return redirect('/articles')->with(['success_message' => 'L\'article a été crée !']);
    }
    public function edit(Article $article)
    {
        $this->authorize('update', $article);
        return view('articles.edit', compact('article'));
    }
    public function update(Request $request, Article $article)
    {
        $this->authorize('update', $article);
        // vérification des permissions plus tard
        // validation

        $article->update($request->all());
        return redirect('/articles')->with(['success_message' => 'L\'article a été modifié avec succès !']);
    }
    public function delete(Article $article)
    {
        $this->authorize('delete', $article);
        // vérification des permissions plus tard
        $article->delete();
        return redirect('/articles')->with(['warning_message' => 'L\'article a été supprimé avec succès !']);

    }

}
