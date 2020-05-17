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
        $articleCount = Article::count();
        $categories = Category::published()->get()->toTree();
        $tags = Tag::published()->get();

        $categories = traverseFlatten($categories, 'name');

        return view('cms::article.create', [
            'categories' => $categories,
            'tags' => $tags,
            'article_count' => $articleCount
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
        $attributes = $this->attributes($request);

        // Merge User ID
        $attributes = array_merge($attributes, ['author_id' => auth()->id()]);

        $article = Article::create($attributes);

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
        $articleCount = Article::count();
        $categories = Category::published()->get();
        $tags = Tag::published()->get();

        $categories = traverseFlatten($categories, 'name');

        return view('cms::article.edit', [
            'categories' => $categories,
            'tags' => $tags,
            'article' => $article,
            'article_count' => $articleCount]);
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
        $attributes = $this->attributes($request, $article->id);

        $article->update($attributes);

        // Attach tags
        if(!empty(request('tags')))
        {
            $article->tags()->sync(request('tags'));
        }

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

    protected function attributes($request, $id = '')
    {
        // Validate Inputs
        request()->validate([
            'title' => 'required',
            'slug' => 'required|unique:articles,slug,' . $id,
            'category_id' => 'required',
            'status' => 'required',
            //'cover_image'     =>  'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Get Attributes
        $attributes = $request->only([
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

        // Check for cover image
        if(request('cover_image'))
        {
            $attributes = array_merge($attributes, [
                'cover_image' => request()->file('cover_image')->store('articles', 'public')
            ]);
        }

        return $attributes;
    }
}
