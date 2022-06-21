<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUpdatePostRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $col = [
        //     'posts.*',
        //     'users.name as user_name',
        // ];

        // $posts = Post::join('users', 'users.id', '=', 'posts.user_id')
        //     ->where('user_id', Auth::user()->id)->get($col);

        $post = Post::where('id', 5)->first();
        $category =  Category::where('id', 2)->first();

        //them attach
        //xoa detach
        //dong bo sync
        //on-off  toggle
        $post->category()->detach([2, 1]);
            dd(123);
        $posts = Post::with(['user.profile', 'category'])->get();
        // $posts->load('user', 'user.profile');
        // dd($posts);

        // $posts = Post::with('user')->get();
        // dd($posts);
        $user = Auth::user();


        $posts = $posts->filter(function ($post) use ($user) {
            if ($user->id != 1) {
                return $post->user_id == $user->id;
            }
            return $post;
        });

        return view('layouts.posts.index', ['posts' => $posts]);
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
        // $category = Category::find($request->category);
        $data = [
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'content' => $request->content,
            'user_id' => Auth::user()->id,
            'thumbnail' => $request->thumbnail,
        ];
        
        try {
            $post = Post::create($data);
            $post->category()->sync($request->category);
            return redirect()->route('posts.index')->with('success', 'Create post successfuly');
        } catch (\Exception $th) {
            //throw $th;
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
        return view('layouts.posts.edit', ['post' => $post]);
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
