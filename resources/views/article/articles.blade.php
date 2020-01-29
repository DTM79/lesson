@extends('layouts.main')
@section('content')
<main role="main">
    <div class="album py-5 bg-light mt-5">
        <div class="container">
            @if(Auth::user())
                <div class="row">
                    <div class="col-12 text-center">
                        <a href="{{route('articles-add')}}" type="button" class="btn btn-primary my-2">add new article</a>
                    </div>
            @endif
            @foreach($articles as $article)
            <div class="col-12">
                <h2 class="blog-post-title">{{$article['title']}} <br> </h2>
                <img src="{{$article->getPreview()}}" height="200">
                <h2 class="blog-post-title"> <br> {{$article['description']}}</h2>
                <div class="btn-group">
                    <a href="{{route('articles-view', $article['id'])}}"  type="button" class="btn btn-sm btn-outline-secondary">View</a>
                    @if(Auth::user() && Auth::user()->id == $article['user_id'])
                        <a href="{{route('articles-edit', $article['id'])}}"type="button" class="btn btn-sm btn-outline-secondary">Edit</a>
                        <a href="{{route('articles-remove', $article['id'])}}" type="button" class="btn btn-sm btn-outline-danger">Remove</a>
                    @endif
                </div>
            </div>
            @endforeach
            </div>
            <div>
            {!! $articles->links() !!}
            </div>
        </div>
    </div>
</main>
@endsection
