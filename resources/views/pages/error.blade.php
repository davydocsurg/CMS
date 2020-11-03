@extends('layouts.nav')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-10">
      <div class="card text-center">
        <div class="card-body p-4 p-sm-5">
          <div class="display-1 text-300 fs-error">404</div>
          <p class="lead mt-4 text-800 text-sans-serif font-weight-semi-bold">
            The page you're looking for is doesn't exist.
          </p>
          <hr />
          <p>
            Make sure the address is correct and that the page hasn't moved.
            If you think this is a mistake,
            <a href="mailto:info@exmaple.com">contact us</a>.
          </p>
          <a class="btn btn-primary btn-sm mt-3" href="/home"
            ><i class="fas fa-home"></i><!-- <span class="fas fa-home mr-2"></span> -->Take me home</a
          >
        </div>
      </div>
    </div>
  </div>
</div>
@endsection