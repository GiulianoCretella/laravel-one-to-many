@extends('layouts.admin')

@section('content')
<form action="{{route('admin.tags.update', $tag->id)}}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
      <label for="name">Nome Tag</label>
      <input type="text" class="form-control" id="name" aria-describedby="name" placeholder="Enter tag name" name="name" value="{{$tag->name}}">
    </div>
    <button type="submit" class="btn btn-primary">Modifica</button>
  </form>
@endsection