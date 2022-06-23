@extends('layouts.admin')

@section('content')
<a href="{{route('admin.categories.index')}}"><h5>Torna alle categorie</h5></a>
    <div class="container">
        <div class="row"> 
            @foreach ($category->posts as $post)
            <div class="col-3">
                <a href="{{route('admin.posts.show',$post->id)}}">
                    <div class="card">
                        <h4>{{$post->title}}</h4>
                        <p>{{$category->name}}</p>
                        <img src="{{$post->image}}" alt="">
                        <p>{{$post->content}}</p>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
@endsection