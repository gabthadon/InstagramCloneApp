@extends('layouts.app')

@section('content')
<div class="container">

@foreach($posts as $post)

<div class="row py-4 pb-4">
  <div class="col-6 offset-3"><a href="/profile/{{$post->user->id}}">
<img src="/uploads/{{$post->image}}" class="w-100">

  </a>    </div>

<div class="row">  </div>

  <div class="col-6 offset-3">
  <div class="d-flex align-items-center">




    <p><span class="font-weight-bold"><a href="/profile/{{$post->user->id}}"> <span class="text-dark">{{$post->user->username}} </span></a> </span>  {{$post->caption}} </p> </div>

</div>

@endforeach

<div class="row">
<div class="col-12"> {{$posts->links()  }}</div>
</div>

</div>
@endsection
