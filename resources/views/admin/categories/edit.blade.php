@extends('layouts.admin')

@section('content')
<form action="{{route('admin.categories.update', $category->id)}}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
      <label for="name">Nome Categoria</label>
      <input type="text" class="form-control" id="name" aria-describedby="name" placeholder="Enter category name" name="name" value="{{$category->name}}">
    </div>
    <button type="submit" class="btn btn-primary">Modifica</button>
  </form>
@endsection