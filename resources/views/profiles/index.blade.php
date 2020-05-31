
<script src="/js/jquery.js"></script>
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
<div class="col-3 p-5">
    <img src="/uploads/{{$user->profile->image}}" class="rounded-circle" style="height: 120px">

</div>
<div class="col-9 pt-5">
  <div class="d-flex  justify-content-between align-items-baseline">
<div class="d-flex align-items-center pb-3">
  <h1 class="pr-3">{{$user->username}}  </h1>
    <button class="btn btn-primary " user_id="{{$user->id}}" style="height:34px" id="follow">Follow </button>
  </div>


    @can('update', $user->profile)
<a href="/p/create/">Add New Post </a>
@endcan
</div>

@can('update', $user->profile)
<div><a href="/profile/{{$user->id}}/edit"> Edit Post</a></div>
@endcan
<div class="d-flex">

<div class="pr-5"><strong>{{$user->posts->count()}}</strong>post</div>
<div class="pr-5"><strong>{{$user->profile->followers->count()}}</strong>followers</div>
<div class="pr-5"><strong>{{$user->following->count()}}</strong>followings</div>

</div>
<div class="pt-4"><strong>{{$user->Profile->title}}</strong></div>
<div>{{$user->Profile->description}}</div>


<div><a href="instagram.com">{{$user->Profile->url}} </a>  </div>

</div>


</div>

<div class="row pt-5" >
  @foreach($user->posts as $post)
<div class="col-4">
  <a href="/p/{{$post->id}}"> <img src="/uploads/{{$post->image}}" class="w-100 "/> </a>
     </div>

  @endforeach

@if($follows==true)

<script>
$('#follow').text('Unfollow');
var status = "Unfollow";
</script>

@else

<script>
$('#follow').text('Follow');
var status = "Follow";
</script>

@endif

  </div>

</div>


<script>

$(document).ready(function(){

$('#follow').click(function(){
var num="null";

var user =  {{$user->id}};
$.get("{{url("follow/$user->id ") }}" , {num:num}, function(data){

if($('#follow').text()=="Follow"){
  $('#follow').text("Unfollow");
}else if ($('#follow').text()=="Unfollow"){
    $('#follow').text("Follow");
}
});

});
});
</script>


@endsection
