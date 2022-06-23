@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row"> 
            @foreach ($category->posts as $post)
            <div class="col-3">
                <div class="card">
                    <h4>{{$post->title}}</h4>
                    <p>{{$category->name}}</p>
                    <img src="{{$post->image}}" alt="">
                    <p>{{$post->content}}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection