<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\ImageArticle;
use App\Models\View;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::with('image')->orderBy('id', 'desc')->get();

        return view('articles.index', [
            'articles' => $articles,
        ]);
    }

    public function userArticles($id)
    {
        return view('articles.user-articles', [
            'articles' => Article::where('user_id', $id)->get()->sortDesc()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articles.create', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $article = new Article();
        $image = new ImageArticle();


        $article->user_id = \Auth::user()->id;
        $article->title = $request->title;
        $article->little_description = $request->little_description;
        $article->description = $request->description;
        $article->category_id = $request->category_id;


        $article->save();

        $image->article_id = $article->id;
        $image->image = $request->image;
        $image->save();

        return redirect()->route('articles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('articles.show', [
            'article' => Article::where('id', $id)->get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Article::findOrFail($id)->delete();
        if ($delete) {
            return view('articles.user-articles', [
                'articles' => Article::where('user_id', $id)->get()->sortDesc()
            ]);
        }

        return redirect()->route('index');
    }
}
