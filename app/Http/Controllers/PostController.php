<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller implements HasMiddleware
{

    // middleware from Laravel docs
    public static function middleware(): array
    {
        // method 'store' has the middleware log
        return [
            new Middleware('auth', except: ['index', 'show']),
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // check Eloquent Models in docs
        // $posts = Post::orderBy('created_at','desc')->get()   get can be changed to paginate
        $posts = Post::latest()->paginate(6);


        // to send data to the view,2nd para DATA ARRAY and will be grabbed in blade
        // ['name' =>'john']
        return view('posts.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */

    //  StorePostRequest: http/request folder / dd($request);
    public function store(Request $request)
    {
        // Posts created at dashboard.blade.php
        // VALIDATE method, takes the array of the form
        $request->validate([
            'title' => ['required','max:255'],
            // if body => empty then it goes empty
            'body' => ['required'],
            'image' => ['nullable','file', 'max:5000', 'mimes:png,jpg,webp']
        ]);

        // Storage facade, saves into /storage.
        // Add the put and by default goes to /app folder
        // 1st argument is the name of the folder, to define the place/disk
        // and to create a symbolic link use storage:link

        // Store image if exist - add validation like 'image' => ['nullable'];
        // then save it in a var to use for the DB, use null because $path is inside IF
        $path = null;
        if ($request->hasFile('image')) {
            $path = Storage::disk('public')->put('posts_image', $request->image);
            // dd($path);
        }

        // CREATE POST - create([]) instead of using [] the whole field can be used as a var
        // Post::create($fields);
        Auth::user()->posts()->create([
            'title' => $request->title,
            'body' => $request->body,
            'image' => $path
        ]);

        // REDIRECT with() is similar to withError() and takes key and value
        // will be grabbed in the view
        return back()->with('success','Your post was created');

    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {

        // User passed auto by laravel

        // view()/posts/show AND associative array
        return view('posts.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        Gate::authorize('modify', $post);
        // update button sends to post.edit
        // edit renders the resource/views/posts path
        // check if auth and owns the post - using Gate::
        return view('posts.edit', ['post' => $post]);



    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {

        Gate::authorize('modify', $post);

        // Validate
        $fields = $request->validate([
            'title' => ['required','max:255'],
            'body' => ['required']
        ]);
        // Update POST - look for new array
        $post->update($fields);

        // change from back() to redirect()->dashboard()
        return redirect()->dashboard('dashboard')->with('success','Your post was updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        // Auth the action
        Gate::authorize('modify', $post);

        // Delete image if exist - delete() looks for the path
        if ($post->image) {
            Storage::disk('public')->delete($post->image);

        }

        // DELETE
        $post->delete();

        // Redirect with back() method
        return back()->with('delete', 'Your post was deleted!');

    }
}


// from laravel/docs filestorage
//    INFO  The [C:\Users\natha\Desktop\myapplication\public\storage] link has been connected to [C:\Users\natha\Desktop\myapplication\storage\app/public]
//
