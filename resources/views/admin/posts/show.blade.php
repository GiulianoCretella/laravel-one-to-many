@extends('layouts.admin');

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <a href="{{route('admin.posts.index')}}"><h4>Torna ai Post</h4></a>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-6">
            <div class="card p-4">
                <h4>{{$post->title}}</h4>
                <p>{{$post->category ? $post->category->name : ''}}</p>
                <img src="{{$post->image}}" alt="">
                <p>{{$post->content}}</p>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-6 text-center my-1">
            <a class="btn btn-primary" href="{{route('admin.posts.edit',$post->id)}}">Modifica</a>
            <form action="{{route('admin.posts.destroy',$post->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Cancella</button>
            </form>

        </div>
    </div>
</div>
   
@endsection