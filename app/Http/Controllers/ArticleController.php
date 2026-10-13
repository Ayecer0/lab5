<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Список статей.
     */
    public function index()
    {
        $articles = Article::latest()->paginate(5);
        return view('articles.index', ['articles' => $articles]);
    }

    /**
     * Форма создания статьи.
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Сохранение новой статьи.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'shortDesc' => 'required',
            'desc' => 'required',
        ]);

        Article::create([
            'datePublic' => $request->datePublic,
            'title' => $request->title,
            'shortDesc' => $request->shortDesc,
            'desc' => $request->desc,
        ]);

        return redirect()->route('articles.index');
    }

    /**
     * Просмотр статьи.
     */
    public function show(Article $article)
    {
        return view('articles.show', ['article' => $article]);
    }

    /**
     * Форма редактирования статьи.
     */
    public function edit(Article $article)
    {
        return view('articles.edit', ['article' => $article]);
    }

    /**
     * Сохранение изменений статьи.
     */
    public function update(Request $request, Article $article)
    {
        $request->validate([
            'title' => 'required|max:255',
            'shortDesc' => 'required',
            'desc' => 'required',
        ]);

        $article->update([
            'datePublic' => $request->datePublic,
            'title' => $request->title,
            'shortDesc' => $request->shortDesc,
            'desc' => $request->desc,
        ]);

        // Переход на страницу изменённой статьи
        return redirect()->route('articles.show', $article->id);
    }

    /**
     * Удаление статьи.
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('articles.index');
    }
}