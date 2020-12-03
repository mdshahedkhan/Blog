@extends('frontend.App.app')
@section('title')
    Single Post
@endsection
@section('content')
    <!-- Blog Post -->
    @foreach($allPost as $Post)
        <div class="card mb-4">
            <img class="card-img-top img-fluid" height="80px" src="{{ asset('/upload/Post/'.$Post->image) }}" alt="{{ $Post->title }}">
            <div class="card-body">
                <h2 class="card-title">{{ $Post->title }}</h2>
                <p class="card-text">{{ $Post->description }}</p>
                {{--<a href="#" class="btn btn-primary">Read More &rarr;</a>--}}
            </div>
            <div class="card-footer text-muted">
                Posted on January 1, 2020 by
                <a href="">{{ $Post->users}}</a>
            </div>
        </div>
    @endforeach
    <!-- Pagination -->
    {{ $allPost->links() }}
    {{--<ul class="pagination justify-content-center mb-4">
        <li class="page-item">
            <a class="page-link" href="#">&larr; Older</a>
        </li>
        <li class="page-item disabled">
            <a class="page-link" href="#">Newer &rarr;</a>
        </li>
    </ul>--}}
@endsection
