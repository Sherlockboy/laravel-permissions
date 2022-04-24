<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::with('user')->get();

        return view('articles.index', compact('articles'));
    }

    public function create()
    {
        $categories = Category::all('id', 'name');

        return view('articles.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = [
            'title' => $request->input('title'),
            'full_text' => $request->input('full_text'),
            'category_id' => $request->input('category_id'),
            'user_id' => auth()->id(),
            'published_at' => auth()->user()->canPublish() && $request->input('published_at') ? now() : null,
        ];

        Article::create($data);

        return redirect()->route('articles.index');
    }

    public function edit(Article $article)
    {
        $categories = Category::all('id', 'name');

        return view('articles.edit', compact('article', 'categories'));
    }

    public function update(Request $request, Article $article)
    {
        $data = [
            'title' => $request->input('title'),
            'full_text' => $request->input('full_text'),
            'category_id' => $request->input('category_id'),
        ];

        if(auth()->user()->canPublish()) {
            $data['published_at'] = $request->input('published_at') ? now() : null;
        }

        $article->update($data);

        return redirect()->route('articles.index');
    }

    public function destroy(Article $article)
    {
        $article->delete();

        return redirect()->route('articles.index');
    }
}
