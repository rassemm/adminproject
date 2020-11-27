<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function create()
    {
        return view('post.create');
    }
    public function store(Request $request)
    {
        $post=new Post();
        $post->title=$request->get('title');
        $post->description=$request->get('description');
        $post->save();
        return redirect('post.index')->with('success', 'Post has been successfully submited pending for approval');
    }
    public function index()
    {
        $posts=\DB::table('posts')->get();
        return view('post.index',compact('posts'));
    }
    public function edit($id)
    {
        $post = \DB::table('posts')->where('id', $id)->first();
        return view('post.edit', compact('post', 'id'));
    }
    public function update(Request $request, $id)
    {
        switch($request->get('approve'))
        {
            case 0:
                Post::postpone($id);
                break;
            case 1:
                Post::approve($id);
                break;
            case 2:
                Post::reject($id);
                break;
            case 3:
                Post::postpone($id);
                break;
            default:    
                break;

        }
        return redirect('post.index');
    }
}