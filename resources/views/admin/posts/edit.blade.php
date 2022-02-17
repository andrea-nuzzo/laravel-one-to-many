@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-header">Modifica il Post</h2></div>

                    <div class="card-body"> 
                        <form action="{{route("posts.update", $post->id)}}" method="POST">
                            @csrf
                            @method("PUT")

                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" placeholder="Add title" value="{{old('title') ? old('title') : $post->title }}">
                                @error('title')
                                 <div class="alert alert-danger my-2"> {{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="content">Content</label>
                                <textarea type="text" class="form-control @error('content') is-invalid @enderror" name="content" id="content" placeholder="Add text" rows="8">{{old('content') ? old('content') : $post->content}}</textarea>
                                @error('content')
                                 <div class="alert alert-danger my-2"> {{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="category">Categories</label>
                                <select class="custom-select @error('category_id') is-invalid @enderror" name="category_id" id="category">
                                    <option value="">Choose a categories</option>
                                    @foreach ($categories as $category)
                                    <option value="{{$category->id}}" {{old('title', $post->category_id) == $category->id ? "selected" : ""}}>{{$category->name}}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                 <div class="alert alert-danger my-2"> {{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group form-check">
                                @php
                                    $published = old('published') ? old('published') : $post->published;
                                @endphp
                                <input type="checkbox" class="form-check-input @error('published') is-invalid @enderror" name="published" id="published" {{$published ? 'checked': ''}} >
                                <label class="form-check-label" for="published">Published</label>
                                @error('published')
                                 <div class="alert alert-danger my-2"> {{$message}}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn updateBtn">Update</button>

                            <a href="{{route("posts.index")}}"><button type="button" class="btn  showBtn">Return to Dashboard</button></a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection