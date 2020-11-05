{{-- <div class="row"> --}}

  <div class="col-lg-4">
      <div class="blog_right_sidebar">
          <aside class="single_sidebar_widget search_widget">
              <form action="" method="GET">
                <div class="form-group">
                  <div class="input-group mb-3">
                    <input type="text" class="form-control" name="search" placeholder="Search Post Title" value="{{ request()->query('search') }}">
                    <div class="input-group-append">
                      <button class="btn" type="submit"><i class="fas fa-search"></i></button>
                    </div>
                  </div>
                </div>
                <button class="main_btn rounded-0 w-100" type="submit">Search</button>
              </form>
          </aside>

          <aside class="single_sidebar_widget post_category_widget">
            <h4 class="widget_title">Category</h4>
            <ul class="list cat-list">
                @foreach ($categories as $category)
                    <li>
                        <a href="{{ route('blog.category', $category->id) }}" class="d-flex">
                            <p>{{ $category->name }}</p>
                            <p>({{ $category->count() }})</p>
                        </a>
                    </li>
                @endforeach

            </ul>
          </aside>

          {{-- <aside class="single_sidebar_widget popular_post_widget">
              <h3 class="widget_title">Recent Post</h3>
              <div class="media post_item">
                  <img src="img/blog/popular-post/post1.jpg" alt="post">
                  <div class="media-body">
                      <a href="single-blog.html">
                          <h3>From life was you fish...</h3>
                      </a>
                      <p>January 12, 2019</p>
                  </div>
              </div>
              <div class="media post_item">
                  <img src="img/blog/popular-post/post2.jpg" alt="post">
                  <div class="media-body">
                      <a href="single-blog.html">
                          <h3>The Amazing Hubble</h3>
                      </a>
                      <p>02 Hours ago</p>
                  </div>
              </div>
              <div class="media post_item">
                  <img src="img/blog/popular-post/post3.jpg" alt="post">
                  <div class="media-body">
                      <a href="single-blog.html">
                          <h3>Astronomy Or Astrology</h3>
                      </a>
                      <p>03 Hours ago</p>
                  </div>
              </div>
              <div class="media post_item">
                  <img src="img/blog/popular-post/post4.jpg" alt="post">
                  <div class="media-body">
                      <a href="single-blog.html">
                          <h3>Asteroids telescope</h3>
                      </a>
                      <p>01 Hours ago</p>
                  </div>
              </div>
          </aside>--}}
          <aside class="single_sidebar_widget tag_cloud_widget">
              <h4 class="widget_title">Tag Clouds</h4>
              <ul class="list">
                    @foreach ($tags as $tag)
                        <li>
                            <a href="{{ route('blog.tag', $tag->id) }}">
                              {{ $tag->name }}
                            </a>
                        </li>
                    @endforeach

              </ul>
          </aside>


          {{-- <aside class="single_sidebar_widget instagram_feeds">
            <h4 class="widget_title">Instagram Feeds</h4>
            <ul class="instagram_row flex-wrap">
                <li>
                    <a href="#">
                      <img class="img-fluid" src="img/instagram/widget-i1.png" alt="">
                    </a>
                </li>

            </ul>
          </aside> --}}


          {{-- <aside class="single_sidebar_widget newsletter_widget">
            <h4 class="widget_title">Newsletter</h4>

            <form action="#">
              <div class="form-group">
                <input type="email" class="form-control" placeholder="Enter email" required>
              </div>
              <button class="main_btn rounded-0 w-100" type="submit">Subscribe</button>
            </form>
          </aside> --}}
      </div>
  </div>
{{-- </div> --}}