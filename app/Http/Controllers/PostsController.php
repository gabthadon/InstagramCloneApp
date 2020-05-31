<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
//use Intervention\Image\Facade\Image;

class PostsController extends Controller
{

  public function  __contruct(){
     $this->middleware('auth');
  }

public function index(){

$users = auth()->user()->following()->pluck('profiles.user_id');

$posts = Post::whereIn('user_id', $users)->orderBy('created_at', 'DESC')->paginate(2);

return view('posts.index', compact('posts'));

}

    public function create(){

      return view('posts.create');
    }


    public function store(){

      $data=request()->validate([
        'caption'=>'required',
        'image'=>'required|image',
      ]);
$imagePath=$data['image']->store('/');

//$image=Image::make("/uploads/".$imagePath)->fit(1200, 1200);
//$image->save();
auth()->user()->posts()->create([
  'caption'=>$data['caption'],
  'image'=>$imagePath
]);
    return  redirect('/profile/'. auth()->user()->id);
    }

public function show(\App\Post $post){

return view('posts.show', compact('post'));
}



}
