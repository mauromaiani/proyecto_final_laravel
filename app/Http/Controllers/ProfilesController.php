<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProfilesController extends Controller
{
    public function index(User $user){
      $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;

      return view('profiles.index', compact('user', 'follows'));
    }

    public function edit(\App\User $user){
      $this->authorize('update', $user->profile);
      return view('profiles.edit', compact('user'));
    }

    public function update(User $user){
      $this->authorize('update', $user->profile);

      $data = request()->validate([
        'title' => 'required',
        'description' => '',
        'url'=>'',
        'image'=>'',
      ]);

      if(request('image')){
        $imagePath = request('image')->store('profile', 'public');

        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000, 1000);
        $image->save();

        $imageArray = ['image' => $imagePath];
      }


      auth()->user()->profile->update(array_merge(
        $data,
        $imageArray ?? []
      ));

      return redirect("/profile/{$user->id}");
    }

    // public function search(){
    //   $search = \Request::get('title');
    //   $profiles = User::where('username', 'like', '%' .$search. '%')->orderBy ('id')->paginate(10);
    //   return view('search');
    // }

    // public function search(){
      // $search = DB::table('users');->get();
      // $profiles = User::where('username', 'like', '%' .$search. '%')->orderBy ('id')->paginate(10);
      // return view('search');
  //  }

    public function show($username){
      $profile = User::find($username);
      return view('profiles.search')->with('profile', $profile);
    }

}
