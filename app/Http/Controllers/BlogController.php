<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::all();
        return view('admin.blog.index')->with('blogs', $blogs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $data = $this->validate($request, [
            'title' => 'string|max:10|min:1|required',
            'reacts' => 'integer',
            'content' => 'nullable',
            'img' => 'required|image'
        ], [
            'title.max' => 'Error in title'
        ]);

        $path = $request->file('img')->store('imgs');

        $data['img'] = $path;

        Blog::create($data);
        session()->flash('success', 'Your Blog has been created');
        return redirect(route('blogs.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        return view('admin.blog.show', ['blog' => $blog]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        return view('admin.blog.edit', ['blog' => $blog]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        $data = $this->validate($request, [
            'title' => 'string|max:10|min:1|required',
            'reacts' => 'integer',
            'content' => 'nullable'
        ], [
            'title.max' => 'Error in title'
        ]);

        $blog->update($data);
        session()->flash('success', 'Your Blog has been updated');
        return redirect(route('blogs.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();
        session()->flash('success', 'You deleted the Blog');
        return redirect(route('blogs.index'));
    }
}
