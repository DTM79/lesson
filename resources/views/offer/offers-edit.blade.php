@extends('layouts.main')
@section('content')
    <main role="main">
        <div class="album py-5 bg-light mt-5">
            <div class="container">
                <form action="{{route('offers-submit-edit',$offer['id'])}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input name="title" type="text" class="form-control" id="title" value="{{$offer['title']}}">
                        @error('title')
                        <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input name="price" type="text" class="form-control" id="price" value="{{$offer['price']}}">
                        @error('price')
                        <strong class="text-danger">{{ $message }}</strong>
                        @enderror
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
                        <textarea name="description" class="form-control" id="description" rows="3">{{$offer['description']}}</textarea>
                        @error('description')
                        <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-info">Send</button>
                </form>
            </div>
        </div>
    </main>
@endsection
