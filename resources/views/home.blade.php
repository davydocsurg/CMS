@extends('layouts.nav')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card bg-dark text-white">
                <div class="card-header bg-dark">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                    <hr>
                     Manage posts, categories, tags. <i class="fas fa-arrow-down"></i>
                </div>
            </div>
            {{-- <hr> --}}
            {{-- <div class="card bg-dark text-white rounded" style="">
                <div class="card-img-top"><img class="img-fluid" src="{{ asset('images/6.jpg') }}" alt="Card image" /></div>
                <div class="card-img-overlay d-flex align-items-end">
                  <div>
                    <h5 class="card-title text-white">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  </div>
                </div>
              </div> --}}
<hr>
<div class="carousel slide carousel-fade" id="carouselExampleFade" data-ride="carousel">
    <div class="carousel-inner rounded">
      <div class="carousel-item active"><img class="d-block w-100" src="{{ asset('images/CMS.png') }}" alt="First slide"></div>
      <div class="carousel-item"><img class="d-block w-100" src="{{ asset('images/CMS(1).png') }}" alt="Second slide"></div>
      <div class="carousel-item"><img class="d-block w-100" src="{{ asset('images/CMS(2).png') }}" alt="Third slide"></div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
<hr>
{{-- <div class="carousel slide" id="carouselExampleControls" data-ride="carousel">
    <ol class="carousel-indicators">
      <li class="active" data-target="#carouselExampleControls" data-slide-to="0"></li>
      <li data-target="#carouselExampleControls" data-slide-to="1"></li>
      <li data-target="#carouselExampleControls" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner rounded">
      <div class="carousel-item active"><img class="d-block w-100" src="{{ asset('images/6.jpg') }}" alt="First slide"></div>
      <div class="carousel-item"><img class="d-block w-100" src="{{ asset('images/6.jpg') }}" alt="Second slide"></div>
      <div class="carousel-item"><img class="d-block w-100" src="{{ asset('images/6.jpg') }}" alt="Third slide"></div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div> --}}




        </div>
    </div>
</div>
@endsection
