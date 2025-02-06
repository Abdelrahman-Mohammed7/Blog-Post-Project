<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    public function index()
    {

        $posts = Post::orderBy('created_at', 'desc')->paginate(10);  
        

        return view('posts.index', ['posts' => $posts]);
    }
    

    public function show(Post $post) 
    {

        return view('posts.show', ['post' => $post]);
    }

    public function create()
    {
        
        $users = User::all();

        return view('posts.create', ['users' => $users]);
    }

    public function store()
    {

        request()->validate([
            'title' => ['required', 'min:3'],
            'description' => ['required', 'min:10'],

        ]);


        $data = request()->all();

        $title = request()->title;
        $description = request()->description;



        Post::create([
            'title' => $title,
            'description' => $description,

        ]);


        return to_route('posts.index');
    }

    public function edit(Post $post)
    {
       
        $users = User::all();

        return view('posts.edit', ['users' => $users, 'post' => $post]);
    }

    public function update($postId)
    {
       

        $title = request()->title;
        $description = request()->description;
       


        $singlePostFromDB = Post::find($postId);
        $singlePostFromDB->update([
            'title' => $title,
            'description' => $description,
            
        ]);


        return to_route('posts.show', $postId);
    }

    public function destroy($postId)
    {

        $post = Post::find($postId);
        $post->delete();

        Post::where('id', $postId)->delete();


        return to_route('posts.index');
    }
}