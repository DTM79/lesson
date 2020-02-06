@extends('layouts.main')
@section('content')
    <main role="main">
        <div class="album py-5 bg-light mt-5">
            <div class="container">
                <form action="{{route('articles-submit-edit',$article['id'])}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input name="title" type="text" class="form-control" id="title" value="{{$article['title']}}">
                    </div>
                    <div class="form-group">
                        <label for="images">Images</label>
                        <div>
                            <input type="file" name="images[]" id="images" multiple />
                        </div>
                        @error('images')
                        <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" class="form-control" id="description" rows="3">{{$article['description']}}</textarea>
                    </div>
                    <button type="submit" class="btn btn-info">Send</button>
                </form>
            </div>
        </div>
    </main>
@endsection
