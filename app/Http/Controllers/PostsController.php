<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PostsController extends Controller
{
    public function __construct(){
      $this->middleware('auth');
    }

    public function index(){
      $users = auth()->user()->following()->pluck('profiles.user_id');
      $posts = Post::whereIn('user_id', $users)->latest()->paginate(5);
      return view('posts.index', compact('posts'));

      // $users = auth()->user();
      // $posts = Post::orderBy('created_at', 'desc')->paginate(5);
      // return view('posts.index', compact('posts'));

    }

    public function create(){
      return view('posts.create');
    }

    public function store(){
      $data = request()->validate([
        'caption' => 'required',
        'image' => 'required|image',
      ]);

      $imagePath = request('image')->store('uploads', 'public');

      $image = Image::make(public_path("storage/{$imagePath}"))->fit(1080, 1080);
      $image->save();

      auth()->user()->posts()->create([
        'caption' => $data['caption'],
        'image' => $imagePath,
      ]);

      //\App\Post::create($data);

      return redirect ('/profile/' . auth()->user()->id);
    }

    public function show(\App\Post $post){
      return view('posts.show', compact('post'));
    }

    public function edit(\App\Post $post){
      $this->authorize('update', $post);
      return view('posts.edit', compact('post'));
    }

    public function update(\App\Post $post){
      $this->authorize('update', $post);
      $data = request()->validate([
        'caption'=>'required',
        'image'=>'',
      ]);

      if(request('image')){
        $imagePath = request('image')->store('profile', 'public');

        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000, 1000);
        $image->save();

        $imageArray = ['image' => $imagePath];
      }


      $post->update(array_merge(
        $data,
        $imageArray ?? []
      ));

      //auth()->user()->$post->update($data);
      //$post->id->update($data);

      //$post->update($data);

      return redirect("/post/{$post->id}");
    }

    public function destroy(\App\Post $post){
      //$this->authorize('update', $post);
      $post->delete();
      return redirect("/profile/{$post->user_id}");
    }

}
