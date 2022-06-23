@extends('layouts.admin')

@section('content')
<a href="{{route('admin.categories.create')}}">Crea nuova categoria</a>
<div class="container">
    <div class="row">
        @foreach ($categories as $category)
        <div class="col-2 py-2">
            <div class="card text-center">
                <a href="{{route('admin.categories.show',$category->id)}}"><h4>{{$category->name}}</h4></a>
                <a href="{{route('admin.categories.edit',$category->id)}}" class="btn btn-primary">Modifica</a>
                <a href="{{route('admin.categories.destroy',$category->id)}}" class="btn btn-danger">Elimina</a>
            </div>
            
        </div>
        @endforeach
    </div>
</div>
@endsection