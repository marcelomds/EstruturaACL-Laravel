<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Auth\Access\Gate;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Post $post)
    {
        dd(auth()->user->isAdmin());
        $posts = $post->get();

        return view('home', compact('posts'));
    }

    public function update($idPost, Post $post)
    {
        $post = $post->find($idPost);

        $this->authorize('update-post', $post);
//        if (Gate::denies('update-post', $post)) {
//            abort(403, 'Access denied');
//        }

        return view('post.update', compact('post'));
    }

    public function rolesPermissions()
    {
       echo "<h2>" . auth()->user()->name . "</h2>";

       foreach (auth()->user()->roles as $role) {
           echo "<b>" . $role->name . "</b><br>";

           $permissions = $role->permissions;
           foreach ($permissions as $permission) {
               echo $permission->name . "<br>";
           }

           echo "<hr>";
       }
    }
}
