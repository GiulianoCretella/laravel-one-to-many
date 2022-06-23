@extends('layouts.admin')

@section('content')
<a href="{{route('admin.categories.create')}}">Crea nuova categoria</a>
<div class="container">
    <div class="row">
        @foreach ($categories as $category)
        <div class="col-2">
            <div class="card text-center">
                <a href="{{route('admin.categories.show',$category->id)}}"><h5>{{$category->name}}</h5></a>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection