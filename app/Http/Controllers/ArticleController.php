<?php

namespace App\Http\Controllers;

use App\Http\Middleware\AdminAccess;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['show', 'index']);
        $this->middleware('admin')->except(['show', 'index']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $articles = Article::all();
        $articles = Article::paginate(10);
        return view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('articles.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $validated = $request->validate([
            'title' => 'required|string|min:3|max:255',
            'body' => 'required|string',
            //Tambah kolom category_id
            'category_id' => 'nullable|exists:categories,id',
        ]);

        if ($request->hasFile('image')) {
            $request->validate([
                'image' => 'required|image|mimes:png,jpg,jpeg,gif,svg|max:2048',
            ]);

            $imagePath = $request->file('image')->store('public/images');

            $validated['image'] = $imagePath;
        }
        $article = Article::create([
            'title' => $validated['title'],
            'body' => $validated['body'],
            'image' => $validated['image'] ?? null,
            'published_at' => $request->has('is_published') ? Carbon::now() : null,
            //Tambah category_id
            'category_id' => $validated['category_id'] ?? null,
        ]);
        if ($request->has('tags')) {
            $article->tags()->attach($request->input('tags'));
        }
        return redirect()->route('articles.index')->with('success', 'Article added successfully.');
    }
    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('articles.edit', compact('article', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        $validated = $request->validate([
            'title' => 'required|string|min:3|max:255',
            'body' => 'required|string',
        ]);

        if ($request->hasFile('image')) {
            $request->validate([
                'image' => 'required|image|mimes:png,jpg,jpeg,gif,svg|max:2048',
            ]);

            $imagePath = $request->file('image')->store('public/images');

            Storage::delete($article->image);

            $validated['image'] = $imagePath;
        }
        $article->update([
            'title' => $validated['title'],
            'body' => $validated['body'],
            'image' => $validated['image'] ?? $article->image,
            'published_at' => $request->has('is_published') ? Carbon::now() : null,

        ]);
        if ($request->has('tags')) {
            $article->tags()->sync($request->input('tags'));
        }

        return redirect()->route('articles.index')->with('success', 'Article Created');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        if ($article->image) {
            Storage::delete($article->image);
        }
        $article->delete();
        return redirect()->route('articles.index')->with('success', 'Article deleted successfully.');
    }
}
