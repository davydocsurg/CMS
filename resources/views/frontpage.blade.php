@extends('layouts.front')

@section('title')
  Welcome
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
              <h2><i class="fas fa-blog" style="color: #71cd14"></i></h2>
              <p>Welcome to my <i class="fas fa-blog" style="color: #71cd14"></i></p>
            </div>
            <div class="page_link">
              <a href="{{ route('welcome') }}">Home</a>
              {{-- <a href="{{ route('blog.show', $post->id) }}">Blog </a> --}}
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
                            {{-- @foreach ($categories as $category) --}}
                            <a href="#" class="blog_item_date">
                              <h3>{{ $post->category->name }}</h3>
                          </a>
                            {{-- @endforeach --}}

                            {{-- <a href="#" class="blog_item_date" style="margin-right: 200px !important;">
                                <h3>15</h3>
                                <p>Jan</p>
                            </a> --}}
                            </div>

                            <div class="blog_details">
                                <a class="d-inline-block" href="{{ route('blog.show', $post->id) }}#disqus_thread">
                                    <h2>{{ $post->title }}</h2>
                                    <p>{{ substr($post->description,0,220) }}...</p>
                                    <p class="btn btn-link">Read More <i class="fas fa-book-reader"></i></p>
                                </a>
                                <ul class="blog-info-link">
                                <li><a href="">
                                    {{-- <i class="fas fa-user-tie"></i>  --}}
                                    <img src="{{ $post->user->avatar }}"  height="" alt="" style="border-radius:50%; border:.1rem solid white; width:1.7rem">
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
                              {{-- <p class="lead">Go back home.</p><a class="btn btn-falcon-primary" href="route('welcome')">Home</a> --}}
                            </div>
                          </div>
                        </div>
                      </div>
                    @endforelse

                      {{-- <nav class="blog-pagination justify-content-center d-flex">
                          <ul class="pagination">
                              <li class="page-item">
                                  <a href="#" class="page-link" aria-label="Previous">
                                      <span aria-hidden="true">
                                          <span class="fas fa-chevron-left"></span>
                                      </span>
                                  </a>
                              </li>
                              <li class="page-item">
                                  <a href="#" class="page-link">1</a>
                              </li>
                              <li class="page-item active">
                                  <a href="#" class="page-link">2</a>
                              </li>
                              <li class="page-item">
                                  <a href="#" class="page-link" aria-label="Next">
                                      <span aria-hidden="true">
                                          <span class="fas fa-chevron-right"></span>
                                      </span>
                                  </a>
                              </li>
                          </ul>
                      </nav> --}}

                      {{ $posts->appends(['search' =>request()->query('search')])->links() }}
                  </div>
              </div>
              @include('partials.sidebar')
          </div>
      </div>
  </section>
  <!--================Blog Area =================-->



@endsection