<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $articles = Article::query()->latest()->paginate(7);
        $featured = $articles->shift();
        return view('landing', compact('articles', 'featured'));
    }
}
