<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use Response;

class ArticlesController extends Controller
{
//index function -get list of articles
    public function index()
    {
      $articles = Article::all();

      return Response::json($articles);
    }

//store article - takes request param from front
    public function store(Request $request)
    {
      $article = new Article;
      $article->title = $request->input('title');
      $article->body = $request->input('body');

      $image=$request->file('image');
      $imageName= $image->getClientOriginalName();
      // move image to public-storage
      $image->move('storage/', $imageName);
      //storing link on server
      $article->image = $request->root().'/storage/'.$imageName;

      //line that actually saves to db
      $article->save();

      //send back success or error
      return Response::json(['success' => 'yooo!']);
    }

//update function 2 params id & request
    public function update($id, Request $request)
    {
      //query one specific via id, article var to hold
      $article = Article::find($id);

      $article->title = $request->input('title');
      $article->body = $request->input('body');

      $image=$request->file('image');
      $imageName= $image->getClientOriginalName();
      $image->move('storage/', $imageName);
      $article->image = $request->root().'/storage/'.$imageName;

      $article->save();

      return Response::json(['success' => 'Article Updated.']);
    }

//show individual article
    public function show($id)
    {
      $article = Article::find($id);

      return Response::json($article);
    }

//delete an article
    public function delete($id)
    {
      $article = Article::find($id);

      $article->delete();

      return Response::json(['success' => "Farewell!"]);
    }

}
