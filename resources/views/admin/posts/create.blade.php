@extends('layouts.admin');

@section('content')
<form action="{{route('admin.posts.store')}}" method="POST">
    @csrf
    <div class="form-group">
      <label for="Title">Title</label>
      <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" aria-describedby="title" placeholder="Enter title" name="title" value="{{old('title')}}">
      @error('title')
          <div class="alert alert-danger">{{$message}}</div>
      @enderror
    </div>
    <div class="form-group">
      <label for="image">Image Url</label>
      <input type="text" class="form-control @error('image') is-invalid @enderror" id="image" aria-describedby="image" placeholder="Enter image url" name="image" value="{{old('image')}}">
      @error('image')
          <div class="alert alert-danger">{{$message}}</div>
      @enderror
    </div>
    <div class="form-group">
      <label for="content">Content</label>
      <textarea name="content" class="form-control @error('content') is-invalid @enderror" id="content" cols="30" rows="10" placeholder="A cosa stai pensando?">{{old('content')}}</textarea>
      @error('content')
          <div class="alert alert-danger">{{$message}}</div>
      @enderror
    </div>
    <div class="form-group">
      <label for="category">Category</label>
      <select name="category_id" id="category" class="form-control @error('category_id') is_invalid @enderror">
        <option value="">Scegli la portata</option>
        @foreach ($categories as $category)
        <option value="{{$category->id}}">{{$category->name}}</option>
        @endforeach
        @error('category_id')
          <div class="alert alert-danger">{{$message}}</div>
        @enderror
     </select>
    </div>
    <div class="form-group">
      <h5>Tags</h5>
      @foreach($tags as $tag)
      <div class="form-check-inline">
        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="{{$tag->slug}}" name="tags[]" value="{{$tag->id}}" {{in_array($tag->id,old("tags",[]))}}>
          <label class="form-check-label" for="{{$tag->slug}}">{{$tag->slug}}</label>
        </div>
      </div>
      @endforeach
    </div>
    <div class="form-check">
      <input type="checkbox" class="form-check-input" id="published" name="published" {{old('published') ? 'checked': ''}}>
      <label class="form-check-label" for="published">Pubblicato</label>
    </div>
    <button type="submit" class="btn btn-primary">Salva</button>
  </form>
@endsection