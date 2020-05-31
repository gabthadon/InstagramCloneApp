@extends('layouts.app')

@section('content')
<div class="container">

  <div class="row">
    <div class="col-8 offset-2">
<h1> Edit Profile </h1>
  <form action="/profile/{{$user->id}}" enctype="multipart/form-data" method="post">
  @csrf
  @method('PATCH')

    <div class="form-group row">
        <label for="title" class="col-md-4 col-form-label">Title</label>


            <input id="title" type="text" class="form-control" name="title" value="{{ old('title') ?? $user->profile->title }}"  autocomplete="title" autofocus>


                                            @error('title')

                                                 <div class="alert alert-danger">{{ $message }}</div>

                                            @enderror
    </div>

    <div class="form-group row">
        <label for="description" class="col-md-4 col-form-label">Description</label>


            <input id="description" type="text" class="form-control" name="description" value="{{ old('description')?? $user->profile->description }}"  autocomplete="description" autofocus>


                                            @error('description')

                                                 <div class="alert alert-danger">{{ $message }}</div>

                                            @enderror
    </div>

    <div class="form-group row">
        <label for="url" class="col-md-4 col-form-label">URL</label>


            <input id="url" type="text" class="form-control" name="url" value="{{ old('url') ?? $user->profile->url  }}"  autocomplete="url" autofocus>


                                            @error('url')

                                                 <div class="alert alert-danger">{{ $message }}</div>

                                            @enderror
    </div>

    <div  class="row">
      <label for="image" class="col-md-4 col-form-label">Profile Image </label>
      <input type="file" class="form-control-file" id="image" name="image">
    @error('image')
    <div class="alert alert-danger"> {{$message}} </div>

    @enderror

    </div>


  <div class="row pt-4">
  <button class="btn btn-primary">Save Profile  </button>
  </div>
  </form>
</div>
</div>

</div>
@endsection
