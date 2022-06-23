@extends('layouts.admin')

@section('content')
<form action="{{route('admin.categories.store')}}" method="POST">
    @csrf
    <div class="form-group">
      <label for="name">Nome Categoria</label>
      <input type="text" class="form-control" id="name" aria-describedby="name" placeholder="Enter category name" name="name" value="{{old('name')}}">
    </div>
    <button type="submit" class="btn btn-primary">Crea</button>
  </form>
@endsection