<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::orderBy('created_at', 'desc')->paginate(5);

        return view("blogs", ['blogs' => $blogs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("create.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Blog $blog)
    {
        $validated = request()->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string'
        ]);

        $blog->title = $validated['title'];
        $blog->content = $validated['content'];
        $blog->author = auth()->user()->name;
        $blog->user_id = auth()->user()->id;

        $blog->save();

        return redirect()->route("/")->with('success', 'Blog created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show($blogId)
    {
        $blog = Blog::find($blogId);

        return view('blogs.blog', ['blog' => $blog]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($blogId)
    {
        $blog = Blog::find($blogId);
        return view("blogs.edit", ['blog' => $blog]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $blog = Blog::find($id);
        $blog->title = $request->input('title');
        $blog->content = $request->input('content');
        $blog->update();

        return redirect('/')->with('status', 'Data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $blog = Blog::find($id);
        $blog->delete();

        return redirect('/')->with('status', 'Data deleted successfully');
    }
}
