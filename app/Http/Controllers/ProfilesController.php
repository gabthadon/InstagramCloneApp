<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facade\Image;
use App\User;

class ProfilesController extends Controller
{

  public function __contruct(){
    $this->middleware('auth');
  }

  public function index(User $user)
  {

$follows= (auth()->user()) ? auth()->user()->following->contains($user->id) : false ;

//dd($follows);

return view('profiles.index',compact('user', 'follows'));

  }

  public function edit(User $user ){

$this->authorize('update', $user->Profile);
  return view('profiles.edit', compact('user'));
  }

  public function update(User $user){

$this->authorize('update', $user->profile);
    $data = request()->validate([
      'title'=>'required',
      'description'=>'required',
      'url'=>'url',
      'image'=>'image',

    ]);


    if(request('image')){
$imagePath=request('image')->store('/profile');

$imagearray=['image'=>$imagePath];
}



auth()->user()->profile->update(array_merge($data,
$imagearray ?? []

));



    return redirect("/profile/{$user->id}");
  }
}
