<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Article;
use App\Http\Resources\Article as ArticleResource;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Get Articles

        $articles = Article::orderBy('created_at','desc')->paginate(5);

        //Return collection of articles as a resource

        return ArticleResource::collection($articles);

    }


    public function store(Request $request)
    {
        //
        $article = $request->isMethod('put') ? Article::findOrFail($request->article_id) : new Article;

        $article->id = $request->input('article_id');
        $article->title = $request->input('title');
        $article->body = $request->input('body');

        if($article->save()){
          return new ArticleResource($article);
        }

    }


    public function show($id)
    {
        //Get a single articles
        $article = Article::findOrFail($id);

        return new ArticleResource($article);


    }

    public function destroy($id)
    {
        //
        $article = Article::findOrFail($id);

        if($article->delete()){
        return new ArticleResource($article);
      }
    }
}
