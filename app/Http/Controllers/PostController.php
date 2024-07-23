<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

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

    //  StorePostRequest: http/request folder
    public function store(Request $request)
    {
        // Posts created at dashboard.blade.php - dd('ok')
        // dd($request);

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
        Gate::authorize('modify', $post);
        // dd('ok');
        $post->delete();

        // Redirect with back() method
        return back()->with('delete', 'Your post was deleted!');

    }
}
