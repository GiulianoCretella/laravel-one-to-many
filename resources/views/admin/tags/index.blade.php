@extends('layouts.admin')

@section('content')
<a href="{{route('admin.tags.create')}}">Crea nuovo tag</a>
<div class="container">
    <div class="row">
        @foreach ($tags as $tag)
        <div class="col-2 py-2">
            <div class="card text-center">
                <a href="{{route('admin.tags.show',$tag->id)}}"><h4>{{$tag->name}}</h4></a>
                <a href="{{route('admin.tags.edit',$tag->id)}}" class="btn btn-primary">Modifica</a>
                <form action="{{route('admin.tags.destroy',$tag->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger w-100">Cancella</button>
                </form>
            </div>
            
        </div>
        @endforeach
    </div>
</div>
@endsection