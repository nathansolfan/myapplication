<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
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

    //  StorePostRequest: http/request folder
    public function store(Request $request)
    {
        // Posts created at dashboard.blade.php - dd('ok') works

        // VALIDATE method, takes the array of the form
        $fields = $request->validate([
            'title' => ['required','max:255'],
            // if body => empty then it goes empty
            'body' => ['required']
        ]);

        // CREATE POST - create([]) instead of using [] the whole field can be used as a var
        // Post::create($fields);
        Auth::user()->posts()->create($fields);

        // REDIRECT with() is similar to withError() and takes key and value
        // will be grabbed in the view
        return back()->with('success','Your post was created');

    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        // view()/posts/show AND associative array
        return view('posts.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        // dd('ok');
        $post->delete();

        // Redirect with back() method
        return back()->with('delete', 'Your post was deleted!');

    }
}
