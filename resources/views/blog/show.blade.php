@extends('layouts.front')

@section('title')
    {{ $post->title }}
@endsection

@section('content')
    <!--================Header Menu Area =================-->

    <!--================Header Menu Area =================-->

    <!--================Home Banner Area =================-->
    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="container">
                <div class="banner_content d-md-flex justify-content-between align-items-center">
                    <div class="mb-3 mb-md-0">
                        <h2>Blog Details</h2>
                        <p>Very us move be blessed multiply night</p>

                        <br><br><br>
                        <div class="addthis_inline_share_toolbox"></div>
                    </div>
                    <div class="page_link">
                        <a href="{{ route('welcome') }}">Home</a>
                        {{-- <a href="{{ route('blog.show') }}">Blog </a> --}}
                        {{-- <a href="{{ route('blog.show') }}">Blog Details</a> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Home Banner Area =================-->

    <!--================Blog Area =================-->
    <section class="blog_area single-post-area section_gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 posts-list">
                    <div class="single-post">
                        <div class="feature-img">
                            <img class="img-fluid" src="{{ asset($post->image) }}" alt="">
                        </div>
                        <div class="blog_details">
                            <h2>
                                {!! $post->title !!}
                            </h2>
                            <p>{!! $post->description !!}</p>

                            <hr>

                            <p class="excert">

                                {!! $post->content !!}

                            </p>
                            <hr>
                            <ul class="blog-info-link mt-3 mb-4">
                                <li><a href="#">
                                        {{-- <i class="fas fa-user-tie"></i> --}}
                                        By:
                                        <img src="{{ asset($post->user->profile->avatar) }}" height="" alt=""
                                            style="border-radius:50%; border:.1rem solid white; width:1.7rem">
                                        {{ $post->user->name }}
                                    </a></li>
                                {{-- <li><a href="#"><i class="fas fa-comments"></i> 03 Comments</a></li> --}}

                            </ul>


                            {{-- <div class="quote-wrapper">
                          <div class="quotes">
                              MCSE boot camps have its supporters and its detractors. Some people do not understand why you should have to spend money on boot camp when you can get the MCSE study materials yourself at a fraction of the camp price. However, who has the willpower to actually sit through a self-imposed MCSE training.
                          </div>
                        </div> --}}

                        </div>
                    </div>
                    <div class="navigation-top">
                        <div class="d-sm-flex justify-content-between text-center">
                            {{-- <p class="like-info"><span class="align-middle"><i class="fas fa-heart"></i></span> Lily and 4 people like this</p> --}}
                            <div class="col-sm-4 text-center my-2 my-sm-0">
                                {{-- <p class="comment-count"><span class="align-middle"><i class="fas fa-comments"></i></span> 06 Comments</p> --}}
                            </div>
                            <ul class="social-icons">
                                <div class="addthis_inline_share_toolbox_wcri float-right"></div>
                            </ul>
                        </div>

                        <div class="navigation-area">
                            <div class="row">
                                @if ($next)
                                    <div
                                        class="col-lg-6 col-md-6 col-12 nav-left flex-row d-flex justify-content-start align-items-center">
                                        <div class="thumb">
                                            <a href="{{ route('blog.show', $next->id) }}">
                                                <img class="img-fluid" src="{{ asset($next->image) }}"
                                                    alt="{{ substr($next->title, 0, 10) }}" width="65" height="65">
                                            </a>
                                        </div>
                                        <div class="arrow">
                                            <a href="{{ route('blog.show', $next->id) }}" class="disabled">
                                                <span class="fas fa-arrow-left text-white"></span>
                                            </a>
                                        </div>
                                        <div class="detials">
                                            <p>Prev Post</p>
                                            <a href="{{ route('blog.show', $next->id) }}" class="disabled">
                                                <h4>{{ substr($next->title, 0, 20) }}...</h4>
                                            </a>
                                        </div>
                                    </div>
                                @endif

                                @if ($prev)
                                    <div
                                        class="col-lg-6 col-md-6 col-12 nav-right flex-row d-flex justify-content-end align-items-center">
                                        <div class="detials">
                                            <p>Next Post</p>
                                            <a href="{{ route('blog.show', $prev->id) }}">
                                                <h4>{{ substr($prev->title, 0, 20) }}...</h4>
                                            </a>
                                        </div>
                                        <div class="arrow">
                                            <a href="{{ route('blog.show', $prev->id) }}">
                                                <span class="fas fa-arrow-right text-white"></span>
                                            </a>
                                        </div>
                                        <div class="thumb">
                                            <a href="{{ route('blog.show', $prev->id) }}">
                                                <img class="img-fluid" src="{{ asset($prev->image) }}"
                                                    alt="{{ substr($prev->title, 0, 10) }}" width="65" height="65">
                                            </a>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                        {{-- substr($post->post_body,0,190) --}}
                        {{-- {{ $posts->appends(['search' =>request()->query('search')])->links() }} --}}
                    </div>


                    <div class="blog-author">
                        <div class="media align-items-center">
                            {{-- <img src="{{ asset($post->user->profile->avatar) }}" alt=""> --}}
                            <div class="media-body">
                                <div class="-d-flex">
                                    <div class="col-g-">
                                        <img src="{{ asset($post->user->profile->avatar) }}" height="" class="float-left"
                                            alt="" style="border-radius:50%; border:.1rem solid white; width: 5.4rem;">
                                    </div>
                                    <div class="col-lg-6">
                                        <h4 class="">{{ $post->user->name }}</h4>

                                    </div>
                                </div>
                                <p>
                                    {{ $post->user->profile->about }}
                                </p>
                                <hr>
                                <div class="float-right justify-content-space-between">
                                    @if ($post->user->profile->facebook)
                                        <a href="{{ $post->user->profile->facebook }}" target="_blank"
                                            rel="noopener noreferrer" class="text-primary"><i
                                                class="fab fa-facebook text-primary"></i></a>
                                    @endif

                                    @if ($post->user->profile->twitter)
                                        <a href="{{ $post->user->profile->twitter }}" target="_blank"
                                            rel="noopener noreferrer" class="text-info"><i class="fab fa-twitter"></i></a>
                                    @endif

                                    @if ($post->user->profile->youtube)
                                        <a href="{{ $post->user->profile->youtube }}" target="_blank"
                                            rel="noopener noreferrer" class="text-danger"><i class="fab fa-youtube"></i></a>
                                    @endif

                                    @if ($post->user->profile->linkedin)
                                        <a href="{{ $post->user->profile->linkedin }}" target="_blank"
                                            rel="noopener noreferrer" class="text-info"><i class="fab fa-linkedin"></i></a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- <div class="comments-area">
                    <h4>05 Comments</h4>
                    <div class="comment-list">
                      <div class="single-comment justify-content-between d-flex">
                        <div class="user justify-content-between d-flex">
                            <div class="thumb">
                                <img src="img/blog/c1.png" alt="">
                            </div>
                            <div class="desc">
                                <p class="comment">
                                  Multiply sea night grass fourth day sea lesser rule open subdue female fill which them Blessed, give fill lesser bearing multiply sea night grass fourth day sea lesser
                                </p>

                                <div class="d-flex justify-content-between">
                                  <div class="d-flex align-items-center">
                                    <h5>
                                      <a href="#">Emilly Blunt</a>
                                    </h5>
                                    <p class="date">December 4, 2017 at 3:12 pm </p>
                                  </div>

                                  <div class="reply-btn">
                                    <a href="#" class="btn-reply text-uppercase">reply</a>
                                  </div>
                                </div>

                            </div>
                        </div>
                    </div>
                  </div>
                    </div> --}}

                    <div id="disqus_thread"></div>
                    <script>
                        /**
                         *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                         *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/

                        var disqus_config = function() {
                            this.page.url =
                                "{{ config('app.url') }}/blog/post/{{ $post->id }}#disqus_thread"; // Replace PAGE_URL with your page's canonical URL variable
                            this.page.identifier =
                                "{{ $post->id }}"; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                        };

                        (function() { // DON'T EDIT BELOW THIS LINE
                            var d = document,
                                s = d.createElement('script');
                            s.src = 'https://blogcms-4.disqus.com/embed.js';
                            s.setAttribute('data-timestamp', +new Date());
                            (d.head || d.body).appendChild(s);
                        })();

                    </script>
                    <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments
                            powered by Disqus.</a></noscript>

                    {{-- <div class="comment-form">
                    <h4>Leave a Reply</h4>
                    <form class="form-contact comment_form" action="#" id="commentForm">
                      <div class="row">
                        <div class="col-12">
                          <div class="form-group">
                              <textarea class="form-control w-100" name="comment" id="comment" cols="30" rows="9" placeholder="Write Comment"></textarea>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <input class="form-control" name="name" id="name" type="text" placeholder="Name">
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <input class="form-control" name="email" id="email" type="email" placeholder="Email">
                          </div>
                        </div>
                        <div class="col-12">
                          <div class="form-group">
                            <input class="form-control" name="website" id="website" type="text" placeholder="Website">
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <button type="submit" class="main_btn">Send Message</button>
                      </div>
                    </form>
                </div> --}}
                </div>
                @include('partials.sidebar')
            </div>
        </div>
    </section>
    <!--================Blog Area =================-->

@endsection
