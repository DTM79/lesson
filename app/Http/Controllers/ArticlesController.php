<?php
namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ArticlesController extends Controller
{
    public function articles()
    {
        $articles = Article::orderBy('id', 'DESC')->paginate(12);
        return view('article/articles', compact('articles'));
    }
    public function add()
    {
        return view('article/articles-add');
    }
    public function submit(ArticleRequest $request)
    {
        $article = new Article();
        $article->title = $request->input('title');
        $article->description = $request->input('description');
        $article->user_id = Auth::user()->id;
        $article->save();
        if($request->hasFile('images')) {
            $files = $request->file('images');
            $articleFileNames = '';
            $path = 'public/articleImg/' . $article->id;
            if(!Storage::exists($path)) {
                Storage::makeDirectory($path);
            }
            foreach ($files as $file) {
                $name = $file->getClientOriginalName();
                $file->move(storage_path("app/$path"), $name);
                $articleFileNames .= $name.',';
            }
            $article->image = $articleFileNames;
            $article->save();
        }
        return redirect()->route('articles');
    }
    public function edit(Article $article)
    {
        return view ('article/articles-edit', compact('article'));
    }
    public function submitedit(ArticleRequest $request, Article $article)
    {
        $article->title = $request->input('title');
        $article->description = $request->input('description');
        $article->save();
        if($request->hasFile('images')) {
            $files = $request->file('images');
            $articleFileNames = '';
            $path = 'public/articleImg/' . $article->id;
            if(!Storage::exists($path)) {
                Storage::makeDirectory($path);
            }
            else{
                Storage::deleteDirectory($path);
                Storage::makeDirectory($path);
            }
            foreach ($files as $file) {
                $name = $file->getClientOriginalName();
                $file->move(storage_path("app/$path"), $name);
                $articleFileNames .= $name.',';
            }
            $article->image = $articleFileNames;
            $article->save();
        }
        return redirect()->route('articles');
    }
    public function remove(Article $article)
    {
        $path = 'public/articleImg/' . $article->id;
        if (!Storage::exists($path)) {
            Storage::deleteDirectory($path);
        }
        $article->delete();
        return redirect ()->route ('articles');
    }
    public function view(Article $article)
    {
        return view('article/article', compact('article'));
    }
//    public function search(Request $request)
//    {
//        $search = true;
//        $articles = Article::where('title', 'like', '%'.$request->input('search').'%')->get();
//        return view('article/articles', compact('articles', 'search'));
//    }
}

