@extends('layouts.main')
@section('content')
<main role="main" class="flex-shrink-0">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <img src="/images/head.jpg" width="50%">
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-12 text-center">
                <h1>Наші популярні оголошення</h1>
            </div>
        </div>
        <div class="row mt-5 justify-content-around">
            <div class="col-3 text-center p-0">
                <div class="card" style="width: 18rem;">
                    <img src="/images/head.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            <div class="col-3 text-center p-0">
                <div class="card" style="width: 18rem;">
                    <img src="/images/head.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            <div class="col-3 text-center p-0">
                <div class="card" style="width: 18rem;">
                    <img src="/images/head.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</main>
@endsection
