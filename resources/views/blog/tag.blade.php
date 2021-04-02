@extends('layouts.front')

@section('title')
  Tag: {{ $tag->name }}
@endsection

@section('content')

    <!--================Header Menu Area =================-->

    <!--================Header Menu Area =================-->

    <!--================Home Banner Area =================-->
    <section class="banner_area">
      <div class="banner_inner d-flex align-items-center">
        <div class="container">
          <div
            class="banner_content d-md-flex justify-content-between align-items-center"
          >
            <div class="mb-3 mb-md-0">
              <h2>{{ $tag->name }}</h2>
              {{-- <p>{{ substr($post->description,0,12) }}</p> --}}
            </div>
            <div class="page_link">
              <a href="{{ route('welcome') }}">Home</a>
              {{-- <a href="{{ route('blog.show', $post->id) }}">Blog </a> --}}
              <a href="{{ route('blog.tag', $tag->id) }}">Tag: {{ $tag->name }}</a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--================End Home Banner Area =================-->

  <!--================Blog Area =================-->
  <section class="blog_area section_gap">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mb-5 mb-lg-0">
              <div class="blog_left_sidebar">

                @forelse ($posts as $post)
                    <article class="blog_item">
                        <div class="blog_item_img">
                        <img class="card-img rounded-0" src="{{ asset($post->image) }}" alt="">
                        <a href="#" class="blog_item_date">
                            <h3>{{ $post->category->name }}</h3>
                        </a>

                        {{-- <a href="#" class="blog_item_date" style="margin-right: 200px !important;">
                            <h3>15</h3>
                            <p>Jan</p>
                        </a> --}}
                        </div>

                        <div class="blog_details">
                            <a class="d-inline-block" href="{{ route('blog.show', $post->id) }}">
                              <h2>{{ $post->title }}</h2>
                              <p>{{ substr($post->description,0,220) }}...</p>
                                <p class="btn btn-link">Read More <i class="fas fa-book-reader"></i></p>
                            </a>
                            <p></p>
                            <ul class="blog-info-link">
                            <li><a href="#">
                                {{-- <i class="fas fa-user-tie"></i>  --}}
                                By:
                                <img src="{{ asset($post->user->profile->avatar) }}"  height="" alt="" style="border-radius:50%; border:.1rem solid white; width:1.7rem">
                                {{ $post->user->name }}
                            </a></li>
                            {{-- <li><a href="#"><i class="fas fa-comments"></i> 03 Comments</a></li> --}}
                            </ul>
                        </div>
                    </article>
                @empty
                <div class="card">
                    <div class="card-body overflow-hidden p-lg-6">
                      <div class="row align-items-center justify-content-between">
                        <div class="col-lg-6"><img class="img-fluid" src="{{ asset('images/4.png') }}" alt=""></div>
                        <div class="col-lg-6 pl-lg-4 my-5 text-center text-lg-left">
                            <h3>
                              No search results found for: <strong>{{ request()->query('search') }}</strong>
                            </h3>
                          <p class="lead">Go back <a class="btn btn-falcon-primary" href="{{ route('welcome') }}"><i class="fas fa-home"></i>Home</a>.</p>
                        </div>
                      </div>
                    </div>
                  </div>
                @endforelse

              </div>
          </div>
          @include('partials.sidebar')
      </div>
      </div>
  </section>
  <!--================Blog Area =================-->



@endsection

{{-- <div class="navigation-area">
  <div class="row">
    @if ($next)
      <div class="col-lg-6 col-md-6 col-12 nav-left flex-row d-flex justify-content-start align-items-center">
        <div class="thumb">
            <a href="{{ route('blog.show', $next->id) }}">
                <img class="img-fluid" src="{{ asset($next->image) }}" alt="{{ substr($next->title,0,10) }}" width="65" height="65">
            </a>
        </div>
        <div class="arrow">
            <a href="{{ route('blog.show', $next->id) }}" class="disabled">
                <span class="fas fa-arrow-left text-white"></span>
            </a>
        </div>
      <div class="detials">
            <p>Previous Post</p>
            <a href="{{ route('blog.show', $next->id) }}" class="disabled">
                <h4>{{ substr($next->title,0,20) }}...</h4>
            </a>
        </div>
      </div>
    @endif

    @if ($prev)
      <div class="col-lg-6 col-md-6 col-12 nav-right flex-row d-flex justify-content-end align-items-center">
        <div class="detials">
            <p>Next Post</p>
            <a href="{{ route('blog.show', $prev->id) }}">
                <h4>{{ substr($prev->title,0,20) }}...</h4>
            </a>
        </div>
        <div class="arrow">
            <a href="{{ route('blog.show', $prev->id) }}">
                <span class="fas fa-arrow-right text-white"></span>
            </a>
        </div>
        <div class="thumb">
            <a href="{{ route('blog.show', $prev->id) }}">
                <img class="img-fluid" src="{{ asset($prev->image) }}" alt="{{ substr($prev->title,0,10) }}" width="65" height="65">
            </a>
        </div>
      </div>
    @endif
  </div>
</div> --}}