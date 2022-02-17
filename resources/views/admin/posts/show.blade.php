@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-header"><h2>{{$post->title}}</h2></div>

                    <div class="card-body"> 
                        {{$post->content}}
                    </div>
                    @if ($post->published)
                        <span class="badge badge-success">Pubblicato</span>
                    @else
                        <span class="badge badge-danger">Bozza</span>
                    @endif
                </div>
                <div class="d-flex justify-content-center">
                    <a href="{{route("posts.index")}}"><button type="button" class="btn btn-outline-dark mt-4">Return to Dashboard</button></a>
                </div>
            </div>
        </div>
    </div>
@endsection