<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //
    public function index()
    {

        // Grab User Post - send Data from Controller to view and use index method
        // Post model > where method apply criteria > posts where userId is Auth::(id)
        // chain get() to get the user post - the details can be seen on migration/create_post table
        // Post::where('user_id', Auth::id())->get(); is not needed as relation on Model/User


        // laravel eloquent model - check - posts without method() give a collection
        // posts() from  Illuminate/Database/Eloquent/Relations/HasMany
        $posts = Auth::user()->posts;

        // dd($posts);



        // from views/user, to use the collection, pass it to the view
        return view('users.dashboard', [ 'posts' => $posts ]);

    }
}
