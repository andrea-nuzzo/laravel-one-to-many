@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-header"><h2>{{$post->title}}</h2></div>

                    <div class="card-body border border-dark m-3"> 
                        {{$post->content}}
                    </div>
                    <div>
                        <div class="badge badge-info m-2">{{$post->category->name}}</div>
                    </div>
                    
                    <div class="m-2">
                        @if ($post->published)
                            <div class="badge badge-success">Pubblicato</div>
                        @else
                            <div class="badge badge-danger">Bozza</div>
                        @endif
                    </div>
                </div>
                <div class="d-flex mt-4">
                    <a href="{{route("posts.index")}}"><button type="button" class="btn btn-outline-dark ">Return to Dashboard</button></a>
                    <a href="{{route("posts.edit", $post->id)}}"><button type="button" class="btn btn-outline-warning mx-3">Update</button></a>
                    <form action="{{route("posts.destroy", $post->id)}}" method="POST" >
                        @csrf
                        @method("DELETE")
                        <button type="submit" class="btn btn-outline-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection