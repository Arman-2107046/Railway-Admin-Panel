<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    // Get all news
    public function index()
    {
        $news = News::orderBy('published_at', 'desc')->get();

        return response()->json([
            'status' => 'success',
            'data' => $news
        ]);
    }

    // Get single news by ID
    public function show($id)
    {
        $news = News::find($id);

        if (!$news) {
            return response()->json([
                'status' => 'error',
                'message' => 'News not found'
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $news
        ]);
    }
}
