@extends('layouts.main')
@section('content')
    <main role="main" class="container">
        <div class="row">
            <aside class="col-md-4 blog-sidebar card pt-3">
                <div class="text-center">
                    <img class="rounded-circle" src="/images/user.jpg" alt="Generic placeholder image" width="140" height="140">
                    <h2>User</h2>
                </div>
                <div class="modal-body text-left">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">First Name: <b>{{$offer->user->name}}</b></li>
                        <li class="list-group-item">Last Name: <b></b></li>
                        <li class="list-group-item">Email: <b>{{$offer->user->email}}</b></li>
                        <li class="list-group-item">Phone: <b></b></li>
                    </ul>
                </div>
            </aside><!— /.blog-sidebar —>
            <div class="col-md-8 blog-main">
                <div class="card">
                    <div class="card-body">
                        <div class="jumbotron p-4 p-md-5 text-dark rounded bg-dark">

                            @foreach($offer->getAllImage() as $image)
                                <div class="mb-5">
                                    <img src="{{asset('/storage/offerImg/'.$offer->id.'/'.$image)}}" width="100%">
                                </div>
                            @endforeach

                            <div class="jumbotron p-4 p-md-5 rounded">
                                <h2>{{$offer->title}}</h2>
                                <h6>{{$offer->price}} UAH</h6>
                                <p class="lead my-3">{{$offer->description}}</p>
                            </div>
                        </div>
                    </div>
                </div><!— /.blog-main —>
            </div>
        </div><!— /.row —>
    </main><!— /.blog-main, .container —>
@stop
