<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\BlogPosting;
use Illuminate\Http\Request;

class BlogPostingController extends Controller
{
    public function index()
    {
        return BlogPosting::all();
    }
     public function show(BlogPosting $blogposting)
    {
        return $blogposting;
    }
     public function store(Request $request)
    {
        return BlogPosting::create($request->all());
    }
    public function update(Request $request, BlogPosting $blogposting)
    {
        $blogposting->update($request->all());
        return response()->json($blogposting, 200);
    }
      public function delete(BlogPosting $blogposting)
    {
        $blogposting->delete();
        return response()->json(null, 204);
    }
}
