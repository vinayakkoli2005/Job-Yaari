<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display the public listing of blogs.
     */
    public function index()
    {
        $blogs = Blog::orderBy('published_at', 'desc')->get();

        // Get distinct month/year combinations for the filter dropdown
        $dates = Blog::select('published_at')
            ->orderBy('published_at', 'desc')
            ->get()
            ->map(function ($blog) {
                return [
                    'value' => $blog->published_at->format('Y-m'),
                    'label' => $blog->published_at->format('F Y')
                ];
            })
            ->unique('value')
            ->values()
            ->all();

        return view('blogs.index', compact('blogs', 'dates'));
    }

    /**
     * Display the blog detail page.
     */
    public function show($id)
    {
        $blog = Blog::findOrFail($id);
        return view('blogs.show', compact('blog'));
    }

    /**
     * Filter blogs via AJAX.
     */
    public function filter(Request $request)
    {
        $query = Blog::query();

        // Filter by Category
        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        // Filter by Date (format: Y-m)
        if ($request->filled('date')) {
            $dateParts = explode('-', $request->date);
            if (count($dateParts) === 2) {
                $query->whereYear('published_at', $dateParts[0])
                      ->whereMonth('published_at', $dateParts[1]);
            }
        }

        // Filter by Search Query
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('title', 'LIKE', '%' . $search . '%')
                  ->orWhere('short_description', 'LIKE', '%' . $search . '%');
            });
        }

        $blogs = $query->orderBy('published_at', 'desc')->get();

        return view('blogs._cards_grid', compact('blogs'))->render();
    }
}
