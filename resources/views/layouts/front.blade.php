<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <link rel="icon" href="{{ asset('img/favicon.ico') }}" type="image/png" />
    <title>
      @yield('title')
    </title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/welcome/bootstrap.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/vendors/linericon/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/welcome/font-awesome.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/welcome/themify-icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/vendors/owl-carousel/owl.carousel.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/vendors/lightbox/simpleLightbox.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/vendors/nice-select/css/nice-select.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/vendors/animate-css/animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/vendors/jquery-ui/jquery-ui.css') }}" />
    <!-- main css -->
    <link rel="stylesheet" href="{{ asset('css/welcome/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/welcome/responsive.css') }}" />

    	<!-- Fonts -->
  <link rel="stylesheet" href="{{ asset('fontawesome-free/css/all.min.css') }}">

  {{-- toasts --}}
	<link rel="stylesheet" href="{{ asset('css/toastr.min.css') }}">
  </head>

  <body>

    <main >
      <header class="header_area">

        <div class="main_menu">
          <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light w-100">
              <!-- Brand and toggle get grouped for better mobile display -->
              <a class="navbar-brand logo_h " href="/" >
                    <svg class="svg-inline--fa fa-blog fa-w-16 text-900 fs-3" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="blog" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M172.2 226.8c-14.6-2.9-28.2 8.9-28.2 23.8V301c0 10.2 7.1 18.4 16.7 22 18.2 6.8 31.3 24.4 31.3 45 0 26.5-21.5 48-48 48s-48-21.5-48-48V120c0-13.3-10.7-24-24-24H24c-13.3 0-24 10.7-24 24v248c0 89.5 82.1 160.2 175 140.7 54.4-11.4 98.3-55.4 109.7-109.7 17.4-82.9-37-157.2-112.5-172.2zM209 0c-9.2-.5-17 6.8-17 16v31.6c0 8.5 6.6 15.5 15 15.9 129.4 7 233.4 112 240.9 241.5.5 8.4 7.5 15 15.9 15h32.1c9.2 0 16.5-7.8 16-17C503.4 139.8 372.2 8.6 209 0zm.3 96c-9.3-.7-17.3 6.7-17.3 16.1v32.1c0 8.4 6.5 15.3 14.8 15.9 76.8 6.3 138 68.2 144.9 145.2.8 8.3 7.6 14.7 15.9 14.7h32.2c9.3 0 16.8-8 16.1-17.3-8.4-110.1-96.5-198.2-206.6-206.7z"></path></svg>
                    {{-- Nwaegerue Chimemeremeze --}}
                    {{-- <i class="fas fa-blog" style="width: 2em !important;"></i> --}}
                    <sup>{{ $title }}</sup>
              </a>
              <button
                class="navbar-toggler"
                type="button"
                data-toggle="collapse"
                data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent"
                aria-expanded="false"
                aria-label="Toggle navigation"
              >
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <!-- Collect the nav links, forms, and other content for toggling -->
              <div
                class="collapse navbar-collapse offset w-100"
                id="navbarSupportedContent"
              >
                {{-- <div class="row w-100 mr-0">
                  <div class="col-lg-7 pr-0">
                    <ul class="nav navbar-nav center_nav pull-right">
                      <li class="nav-item">
                        <a class="nav-link" href="">Home</a>
                      </li>

                      <li class="nav-item active submenu dropdown">
                        <a
                          href="#"
                          class="nav-link dropdown-toggle"
                          data-toggle="dropdown"
                          role="button"
                          aria-haspopup="true"
                          aria-expanded="false"
                          >Blog</a
                        >
                        <ul class="dropdown-menu">
                          <li class="nav-item">
                            <a class="nav-link" href="">Blog</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href=""
                              >Blog Details</a
                            >
                          </li>
                        </ul>
                      </li>

                      <li class="nav-item">
                        <a class="nav-link" href="">Contact</a>
                      </li>
                    </ul>
                  </div> --}}

                  <div class="col-lg-12 pr-0">
                    <ul class="nav navbar-nav  center_nav pull-right">

                      @if (Route::has('login'))
                        @auth
                          <li class="nav-item">
                            <a href="{{ url('/dashboard') }}" class=" nav-link">Dashboard</a>
                          </li>
                        @else
                          <li class="nav-item">
                            <a href="{{ route('login') }}" class=" nav-link">
                              Login <i class="fas fa-sign-in-alt" aria-hidden="true"></i>
                            </a>
                          </li>

                            @if (Route::has('register'))
                              <li class="nav-item">
                                <a href="{{ route('register') }}" class="nav-link">Register</a>
                              </li>
                            @endif
                        @endauth
                      @endif

                    </ul>
                  </div>
                </div>
              </div>
            </nav>
          </div>
        </div>
      </header>
      @yield('content')


    <!--================ start footer Area  =================-->
    <footer class="footer-area section_gap">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-md-6 single-footer-widget float-right">
            <h4>Newsletter</h4>
            <p>You can trust us. we only send promo offers,</p>
            {{-- <div class="form-wrap" id="mc_embed_signup"> --}}
              <form action="/subscribe"
                method="post" class="form-inline">
                @csrf
                <input class="form-control" name="email" placeholder="Your Email Address"  required="" type="email">
                <button class="click-btn btn btn-default" type="submit">Subscribe</button>

                {{-- onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Email Address '" --}}
                {{-- <div style="position: absolute; left: -5000px;">
                  <input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">
                </div> --}}

                {{-- <div class="info"></div> --}}
              </form>
            {{-- </div> --}}
          </div>

        </div>
        <div class="footer-bottom row align-items-center">
          <div class="col-lg-4 col-md-12 footer-social">
            <br><br><br>
            <div class="addthis_inline_share_toolbox"></div>
            {{-- <a href="#"><i class="fab fa-facebook"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-dribbble"></i></a>
            <a href="#"><i class="fab fa-behance"></i></a> --}}
          </div>
        </div>
      </div>
    </footer>
  <!--================ End footer Area  =================-->
    </main>

      <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{ asset('js/welcome/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('js/vendor/bootstrap/js/bootstrap.bundle.min.js') }}" ></script>
    <script src="{{ asset('js/welcome/popper.js') }}"></script>
    {{-- <script src="{{ asset('js/welcome/bootstrap.min.js') }}"></script> --}}
    <script src="{{ asset('js/welcome/stellar.js') }}"></script>
    <script src="{{ asset('css/vendors/lightbox/simpleLightbox.min.js') }}"></script>
    <script src="{{ asset('css/vendors/nice-select/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('css/vendors/isotope/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('css/vendors/isotope/isotope-min.js') }}"></script>
    <script src="{{ asset('css/vendors/owl-carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('css/vendors/jquery-ui/jquery-ui.js') }}"></script>
    <script src="{{ asset('js/welcome/jquery.ajaxchimp.min.js') }}"></script>
    <script src="{{ asset('js/welcome/mail-script.js') }}"></script>
    <script src="{{ asset('css/vendors/jquery-ui/jquery-ui.js') }}"></script>
    <script src="{{ asset('js/welcome/theme.js') }}"></script>
    <script src="{{ asset('fontawesome-free/css/all.min.css') }}"></script>
    <script id="dsq-count-scr" src="//blogcms-4.disqus.com/count.js" async></script>
    	{{-- toasts --}}
    <script src="{{ asset('js/toastr.min.js') }}"></script>

    <script>
      @if (session()->has('subscribed'))
        toastr.success('{{ session()->get('subscribed') }}')
      @endif
    </script>

    {{-- <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5fa1eab8c3aaa4cf"></script> --}}
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5fa1eab8c3aaa4cf"></script>

</body>

</html>


