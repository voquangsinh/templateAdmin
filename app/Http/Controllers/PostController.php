<?php

namespace App\Http\Controllers;

use App\Events\CreateNewPost;
use App\Http\Requests\CreateUpdatePostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Scopes\IsAuthorPostScope;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Post::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $postsWithoutScope = Post::get();
        $postWithScope = Post::isAuthor()->get();
        // $postsWithOutScope = Post::withoutGlobalScope(IsAuthorPostScope::class)->get();
        return view('layouts.posts.index', ['posts' => $postWithScope]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::get();
        return view('layouts.posts.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUpdatePostRequest $request)
    {
        $data = [
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'content' => $request->content,
            'user_id' => Auth::user()->id,
            'thumbnail' => $request->thumbnail,
        ];
        
        try {
            $post = Post::create($data);
            $post->categories()->sync($request->categoryIds);
            event(new CreateNewPost($post));
            return redirect()->route('posts.index')->with('success', 'Create post successfuly');
        } catch (\Exception $e) {
            //throw $th;
            Log::error($e->getMessage());
            return back()->with('error', 'Create post failed');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('layouts.posts.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('layouts.posts.edit', ['post' => $post, 'categories' => Category::get()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(CreateUpdatePostRequest $request, Post $post)
    {
        $data = [
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'content' => $request->content,
            'user_id' => Auth::user()->id,
            'thumbnail' => $request->thumbnail ?? $post->thumbnail,
        ];
        try {
            
            $post->update($data);
            $post->categories()->sync($request->categoryIds);

            return redirect()->route('posts.index')->with('success', 'Update post successfuly');
        } catch (\Exception $e) {
            throw $e;
            return back()->with('error', 'Update post failed');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        try {
            $post->delete();
            return redirect()->route('posts.index')->with('success', 'Delete post successfuly');
        } catch (\Exception $e) {
            throw $e;
            return back()->with('error', 'Delete post failed');
        }
    }
}
