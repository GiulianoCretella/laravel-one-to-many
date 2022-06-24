@extends('layouts.admin')

@section('content')
<a href="{{route('admin.tags.index')}}"><h5>Torna ai tag</h5></a>
    <div class="container">
        <div class="row"> 
            @foreach ($tag->posts as $post)
            <div class="col-3">
                <a href="{{route('admin.posts.show',$post->id)}}">
                    <div class="card">
                        <h4>{{$post->title}}</h4>
                        <p>{{$tag->name}}</p>
                        <img src="{{$post->image}}" alt="">
                        <p>{{$post->content}}</p>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
@endsection