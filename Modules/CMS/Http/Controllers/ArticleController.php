<?php

namespace Modules\CMS\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\CMS\Entities\Article;
use Modules\CMS\Entities\Category;
use Modules\CMS\Entities\Tag;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::all();

        return view('cms::article.index', ['articles' => $articles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::published()->get();
        $tags = Tag::published()->get();

        return view('cms::article.create', ['categories' => $categories, 'tags' => $tags]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'title' => 'required',
            'slug' => 'required|unique:articles',
            'category_id' => 'required',
            'status' => 'required',
            //'cover_image'     =>  'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $attribute = $request->only([
            'title',
            'slug',
            'short_description',
            'description',
            'featured',
            'category_id',
            'author_id',
            'order',
            'status',
            'meta_key',
            'meta_description',
            'meta_data'
        ]);

        if(request('cover_image'))
        {
            $attribute = array_merge($attribute, [
                'cover_image' => request()->file('cover_image')->store('articles', 'public')
            ]);
        }

        $article = Article::create(array_merge($attribute, ['author_id' => auth()->id()]));

        // Attach tags
        if(!empty(request('tags')))
        {
            $article->tags()->attach(request('tags'));
        }

        return redirect(route('articles.index'))
            ->with('flash', 'Your article has been created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('cms::article.show', ['article' => $article]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        $categories = Category::published()->get();
        $tags = Tag::published()->get();

        return view('cms::articles.edit', [
            'categories' => $categories,
            'tags' => $tags,
            'article' => $article]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:categories',
            'category_id' => 'required',
            'published' => 'required'
        ]);

        $article->update($request->only([
            'title',
            'slug',
            'short_description',
            'description',
            'featured',
            'image',
            'category_id',
            'author_id',
            'order',
            'status',
            'meta_key',
            'meta_description',
            'meta_data'
        ]));

        return redirect(route('articles.index'))
            ->with('flash', 'Your article has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();

        return redirect()->back();
    }
}
