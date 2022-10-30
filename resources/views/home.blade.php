@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    @guest
                    @else
                    @if (\Illuminate\Support\Facades\Auth::user()->admin==true)

                        <div class="alert alert-success" role="alert">
                           U ARE ADMIN:)
                        </div>
                            <a href="{{route('blogs.index')}}">Blogs CRUD</a>
                        <br>
                            <a href="{{route('comments.index')}}">Comments CRUD</a>
                    @endif
                    @endguest
                        @foreach($blogs as $blog)
                            <div class="card">
                                    <h5 class="card-header">Author: {{$users->where('id',$blog->user_id)->first()->name}}</h5>
                                <div class="card-body">
                                    <h5 class="card-title me-auto">Title: {{$blog->title}}</h5>
                                    <p class="card-text">text: {{$blog->description}}</p>
                                </div>
                                <div class="card-body">Comments:
                                    @foreach($comments->where('blog_id',$blogs[0]->id)->toArray() as $comment)
                                    <hr>

                                        <img src="{{ '/images/'.$comment['image'] }}" class="img-fluid img-thumbnail" width="75">
                                    <p class="card-text">text: {{$comment['description']}}</p>

                                    @endforeach
                                </div>
                            </div>
                            <br>
                        @endforeach


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
