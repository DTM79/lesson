@extends('layouts.main')
@section('content')
<main role="main">
    <div class="album py-5 bg-light mt-5">
        <div class="container">
            @if(Auth::user())
                <div class="row">
                    <div class="col-12 text-center">
                        <a href="{{route('articles-add')}}" type="button" class="btn btn-primary my-2">Добавити нову статтю</a>
                    </div>
            @endif
                @foreach($articles as $article)
                    <div class="col-12">
                        <h2 class="blog-post-title">{{$article['title']}}</h2>
                        @foreach($article->getAllImage() as $image)
                            <div class="col-5">
                                <img src="{{asset('/storage/articleImg/'.$article->id.'/'.$image)}}" width="30%">
                            </div>
                        @endforeach
                            <h2 class="blog-post-title"> <br> {{$article['description']}}</h2>
                                <div class="btn-group">
                                    <a href="{{route('articles-view', $article['id'])}}"  type="button" class="btn btn-sm btn-outline-secondary">Перегляд</a>
                                        @if(Auth::user() && Auth::user()->id == $article['user_id'])
                                            <a href="{{route('articles-edit', $article['id'])}}"type="button" class="btn btn-sm btn-outline-secondary">Редагувати</a>
                                            <a href="{{route('articles-remove', $article['id'])}}" type="button" class="btn btn-sm btn-outline-danger">Видалити</a>
                                        @endif
                                </div>
                    </div>
                @endforeach
            </div>
                @if(!isset($search))
                <div>
                    {!! $articles->links() !!}
                </div>
                @endif
        </div>
    </div>
</main>
@endsection
