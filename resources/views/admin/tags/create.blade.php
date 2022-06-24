@extends('layouts.admin')

@section('content')
<form action="{{route('admin.tags.store')}}" method="POST">
    @csrf
    <div class="form-group">
      <label for="name">Nome Tag</label>
      <input type="text" class="form-control" id="name" aria-describedby="name" placeholder="Enter tag name" name="name" value="{{old('name')}}">
    </div>
    <button type="submit" class="btn btn-primary">Crea</button>
  </form>
@endsection