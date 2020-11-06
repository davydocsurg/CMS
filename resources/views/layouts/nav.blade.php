<!DOCTYPE html>
	<html lang="en">

	<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>{{ config('app.name', '') }}</title>

	{{-- fontawesome --}}

	<script src="{{ asset('fontawesome-free/css/all.min.css') }}" defer></script>


	<!-- Fonts -->
	<link rel="stylesheet" href="{{ asset('fontawesome-free/css/all.min.css') }}">
	<link rel="dns-prefetch" href="//fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

	<!-- Styles -->
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('css/navy.min.css') }}" rel="stylesheet">
	<link href="{{ asset('css/ad2.css') }}" rel="stylesheet">

	{{-- <link rel="stylesheet" href="{{ asset('css/select2.css') }}"> --}}
	{{-- <link rel="stylesheet" href="{{ asset('css/select2.min.css') }}"> --}}
	{{-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" /> --}}

	{{-- <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}"> --}}

	@yield('styles')
	{{-- @trixassets --}}
</head>

<body>
	<style>
		#userDropdown span::after {

			font-weight: 900;
			content: '\f107';
			font-family: 'Font Awesome 5 Free';
			margin-right: .1rem;

			}
	</style>
{{-- <div id="app"> --}}
<!-- Page Wrapper -->
<div id="wrapper">

	<!-- Sidebar -->
	<ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

			<!-- Sidebar - Brand -->
			<a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/') }}">
					<div class="sidebar-brand-icon ">
						{{-- rotate-n-15 --}}
							{{-- <i class="fas fa-laugh-wink"></i> --}}
							<svg class="svg-inline--fa fa-blog fa-w-16 text-900 fs-3" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="blog" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M172.2 226.8c-14.6-2.9-28.2 8.9-28.2 23.8V301c0 10.2 7.1 18.4 16.7 22 18.2 6.8 31.3 24.4 31.3 45 0 26.5-21.5 48-48 48s-48-21.5-48-48V120c0-13.3-10.7-24-24-24H24c-13.3 0-24 10.7-24 24v248c0 89.5 82.1 160.2 175 140.7 54.4-11.4 98.3-55.4 109.7-109.7 17.4-82.9-37-157.2-112.5-172.2zM209 0c-9.2-.5-17 6.8-17 16v31.6c0 8.5 6.6 15.5 15 15.9 129.4 7 233.4 112 240.9 241.5.5 8.4 7.5 15 15.9 15h32.1c9.2 0 16.5-7.8 16-17C503.4 139.8 372.2 8.6 209 0zm.3 96c-9.3-.7-17.3 6.7-17.3 16.1v32.1c0 8.4 6.5 15.3 14.8 15.9 76.8 6.3 138 68.2 144.9 145.2.8 8.3 7.6 14.7 15.9 14.7h32.2c9.3 0 16.8-8 16.1-17.3-8.4-110.1-96.5-198.2-206.6-206.7z"></path></svg>

							{{-- <svg class="svg-inline--fa fa-whmcs fa-w-14 text-900 fs-3" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="whmcs" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M448 161v-21.3l-28.5-8.8-2.2-10.4 20.1-20.7L427 80.4l-29 7.5-7.2-7.5 7.5-28.2-19.1-11.6-21.3 21-10.7-3.2-7-26.4h-22.6l-6.2 26.4-12.1 3.2-19.7-21-19.4 11 8.1 27.7-8.1 8.4-28.5-7.5-11 19.1 20.7 21-2.9 10.4-28.5 7.8-.3 21.7 28.8 7.5 2.4 12.1-20.1 19.9 10.4 18.5 29.6-7.5 7.2 8.6-8.1 26.9 19.9 11.6 19.4-20.4 11.6 2.9 6.7 28.5 22.6.3 6.7-28.8 11.6-3.5 20.7 21.6 20.4-12.1-8.8-28 7.8-8.1 28.8 8.8 10.3-20.1-20.9-18.8 2.2-12.1 29.1-7zm-119.2 45.2c-31.3 0-56.8-25.4-56.8-56.8s25.4-56.8 56.8-56.8 56.8 25.4 56.8 56.8c0 31.5-25.4 56.8-56.8 56.8zm72.3 16.4l46.9 14.5V277l-55.1 13.4-4.1 22.7 38.9 35.3-19.2 37.9-54-16.7-14.6 15.2 16.7 52.5-38.3 22.7-38.9-40.5-21.7 6.6-12.6 54-42.4-.5-12.6-53.6-21.7-5.6-36.4 38.4-37.4-21.7 15.2-50.5-13.7-16.1-55.5 14.1-19.7-34.8 37.9-37.4-4.8-22.8-54-14.1.5-40.9L54 219.9l5.7-19.7-38.9-39.4L41.5 125l53.6 14.1 15.2-15.7-15.2-52 36.4-20.7 36.8 39.4L191 84l11.6-52H245l11.6 45.9L234 72l-6.3-1.7-3.3 5.7-11 19.1-3.3 5.6 4.6 4.6 17.2 17.4-.3 1-23.8 6.5-6.2 1.7-.1 6.4-.2 12.9C153.8 161.6 118 204 118 254.7c0 58.3 47.3 105.7 105.7 105.7 50.5 0 92.7-35.4 103.2-82.8l13.2.2 6.9.1 1.6-6.7 5.6-24 1.9-.6 17.1 17.8 4.7 4.9 5.8-3.4 20.4-12.1 5.8-3.5-2-6.5-6.8-21.2z"></path></svg> --}}
					</div>
					<div class="sidebar-brand-text mx-3">{{ config('app.name', '') }} <sup>1</sup></div>
				</a>

				{{-- <hr class="sidebar-divider my-3">

				 <div class="container text-center">
					<span class="mr-2 d-none d-lg-inline text-white medium">{{ Auth::user()->name }} </span>
					<br> <br>
					<img src="{{ Auth::user()->avatar }}" class=""  width="40%" height="" alt="User Image" style="border-radius:50%; border:.2rem solid white">
				</div>  --}}
			<!-- Divider -->
			<hr class="sidebar-divider my-3">

			<!-- Nav Item - Dashboard -->
			<li class="nav-item active">
					<a class="nav-link" href="{{ url('/home') }}">
							<i class="fas fa-fw fa-tachometer-alt"></i>
							<span>Dashboard</span></a>
			</li>

			<!-- Divider -->
			<hr class="sidebar-divider">

			<!-- Heading -->
			{{-- <div class="sidebar-heading">
					Interface
			</div> --}}

			<!-- Nav Item - Pages Collapse Menu -->
			{{-- <li class="nav-item">
					<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
							aria-expanded="true" aria-controls="collapseTwo">
							<i class="fas fa-fw fa-cog"></i>
							<span>Components</span>
					</a>
					<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
							<div class="bg-white py-2 collapse-inner rounded">
									<h6 class="collapse-header">Custom Components:</h6>
									<a class="collapse-item" href="buttons.html">Buttons</a>
									<a class="collapse-item" href="cards.html">Cards</a>
							</div>
					</div>
			</li> --}}

			<!-- Nav Item - Utilities Collapse Menu -->
			{{-- <li class="nav-item">
					<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
							aria-expanded="true" aria-controls="collapseUtilities">
							<i class="fas fa-fw fa-wrench"></i>
							<span>Utilities</span>
					</a>
					<div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
							data-parent="#accordionSidebar">
							<div class="bg-white py-2 collapse-inner rounded">
									<h6 class="collapse-header">Custom Utilities:</h6>
									<a class="collapse-item" href="utilities-color.html">Colors</a>
									<a class="collapse-item" href="utilities-border.html">Borders</a>
									<a class="collapse-item" href="utilities-animation.html">Animations</a>
									<a class="collapse-item" href="utilities-other.html">Other</a>
							</div>
					</div>
			</li> --}}

			<!-- Divider -->
			{{-- <hr class="sidebar-divider"> --}}

			<!-- Heading -->
			{{-- <div class="sidebar-heading">
					Addons
			</div> --}}

			<!-- Nav Item - Pages Collapse Menu -->
			{{-- <li class="nav-item">
					<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
							aria-expanded="true" aria-controls="collapsePages">
							<i class="fas fa-fw fa-folder"></i>
							<span>Pages</span>
					</a>
					<div id="collapsePages" class="collapse" aria-labelledby="headingPages"
							data-parent="#accordionSidebar">
							<div class="bg-white py-2 collapse-inner rounded">
									<h6 class="collapse-header">Login Screens:</h6>
									<a class="collapse-item" href="login.html">Login</a>
									<a class="collapse-item" href="register.html">Register</a>
									<a class="collapse-item" href="forgot-password.html">Forgot Password</a>
									<div class="collapse-divider"></div>
									<h6 class="collapse-header">Other Pages:</h6>
									<a class="collapse-item" href="404.html">404 Page</a>
									<a class="collapse-item" href="blank.html">Blank Page</a>
							</div>
					</div>
			</li> --}}

			<!-- Nav Item - Charts -->
			<li class="nav-item">
					<a class="nav-link" href="{{ route('post.index') }}">
							<i class="fas fa-fw fa-chart-area"></i>
							<span>Posts</span></a>
			</li>

			<!-- Nav Item - Tables -->
			<li class="nav-item">
					<a class="nav-link" href="{{ route('categories.index') }}">
							<i class="fas fa-fw fa-table"></i>
							<span>Categories</span></a>
			</li>

			<li class="nav-item">
				<a class="nav-link" href="{{ route('tags.index') }}">
						<i class="fas fa-tags"></i>
						<span>Tags</span></a>
		</li>


		@if (auth()->user()->isAdmin())
		<!-- Divider -->
		<hr class="sidebar-divider d-none d-md-block">

		<li class="nav-item">
			<a class="nav-link" href="{{ route('users.index') }}">
				<i class="fas fa-users-cog"></i>
				<span>Users</span></a>
			</li>
			@endif

			<!-- Divider -->
			<hr class="sidebar-divider d-none d-md-block">

			<li class="nav-item">
				<a class="nav-link" href="{{ route('trashed_posts.index') }}">
						<i class="far fa-trash-alt"></i>
						<span>Trashed Posts</span></a>
			</li>
			<hr class="sidebar-divider d-none d-md-block">


			<!-- Sidebar Toggler (Sidebar) -->
			<div class="text-center d-none d-md-inline">
					<button class="rounded-circle border-0" id="sidebarToggle"></button>
			</div>

	</ul>
	<!-- End of Sidebar -->

	<!-- Content Wrapper -->
	<div id="content-wrapper" class="d-flex flex-column">

			<!-- Main Content -->
			<div id="content">

					<!-- Topbar -->
					<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

							<!-- Sidebar Toggle (Topbar) -->
							<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
									<i class="fa fa-bars"></i>
							</button>

							<!-- Topbar Search -->
							<form
									class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search"
									method="GET"
									>
									<div class="input-group">
											<input type="text" class="form-control bg-light border-0 small"
													placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2"
													value="{{ request()->query('search') }}">
											<div class="input-group-append">
													<button class="btn btn-secondary" type="button">
															<i class="fas fa-search fa-sm"></i>
													</button>
											</div>
									</div>
							</form>

							<!-- Topbar Navbar -->
							<ul class="navbar-nav ml-auto">

									<!-- Nav Item - Search Dropdown (Visible Only XS) -->
									<li class="nav-item dropdown no-arrow d-sm-none">
											<a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
													data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
													<i class="fas fa-search fa-fw"></i>
											</a>
											<!-- Dropdown - Messages -->
											 <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
													aria-labelledby="searchDropdown">
													<form class="form-inline mr-auto w-100 navbar-search">
															<div class="input-group">
																	<input type="text" class="form-control bg-light border-0 small"
																			placeholder="Search for..." aria-label="Search"
																			aria-describedby="basic-addon2">
																	<div class="input-group-append">
																			<button class="btn btn-primary" type="button">
																					<i class="fas fa-search fa-sm"></i>
																			</button>
																	</div>
															</div>
													</form>
											</div>
									</li>

									<!-- Nav Item - Alerts -->
									{{-- <li class="nav-item dropdown no-arrow mx-1">
											<a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
													data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
													<i class="fas fa-bell fa-fw"></i> --}}
													<!-- Counter - Alerts -->
													{{-- <span class="badge badge-danger badge-counter">3+</span>
											</a> --}}
											<!-- Dropdown - Alerts -->
											{{-- <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
													aria-labelledby="alertsDropdown">
													<h6 class="dropdown-header">
															Alerts Center
													</h6>
													<a class="dropdown-item d-flex align-items-center" href="#">
															<div class="mr-3">
																	<div class="icon-circle bg-primary">
																			<i class="fas fa-file-alt text-white"></i>
																	</div>
															</div>
															<div>
																	<div class="small text-gray-500">December 12, 2019</div>
																	<span class="font-weight-bold">A new monthly report is ready to
																			download!</span>
															</div>
													</a>
													<a class="dropdown-item d-flex align-items-center" href="#">
															<div class="mr-3">
																	<div class="icon-circle bg-success">
																			<i class="fas fa-donate text-white"></i>
																	</div>
															</div>
															<div>
																	<div class="small text-gray-500">December 7, 2019</div>
																	$290.29 has been deposited into your account!
															</div>
													</a>
													<a class="dropdown-item d-flex align-items-center" href="#">
															<div class="mr-3">
																	<div class="icon-circle bg-warning">
																			<i class="fas fa-exclamation-triangle text-white"></i>
																	</div>
															</div>
															<div>
																	<div class="small text-gray-500">December 2, 2019</div>
																	Spending Alert: We've noticed unusually high spending for your account.
															</div>
													</a>
													<a class="dropdown-item text-center small text-gray-500" href="#">Show All
															Alerts</a>
											</div>
									</li> --}}

									<!-- Nav Item - Messages -->
									{{-- <li class="nav-item dropdown no-arrow mx-1">
											<a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
													data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
													<i class="fas fa-envelope fa-fw"></i> --}}
													<!-- Counter - Messages -->
													{{-- <span class="badge badge-danger badge-counter">7</span>
											</a> --}}
											<!-- Dropdown - Messages -->
											{{-- <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
													aria-labelledby="messagesDropdown">
													<h6 class="dropdown-header">
															Message Center
													</h6>
													<a class="dropdown-item d-flex align-items-center" href="#">
															<div class="dropdown-list-image mr-3">
																	<img class="rounded-circle"
																			src="https://source.unsplash.com/fn_BT9fwg_E/60x60" alt="">
																	<div class="status-indicator bg-success"></div>
															</div>
															<div class="font-weight-bold">
																	<div class="text-truncate">Hi there! I am wondering if you can help me with
																			a problem I've been having.</div>
																	<div class="small text-gray-500">Emily Fowler · 58m</div>
															</div>
													</a>
													<a class="dropdown-item text-center small text-gray-500" href="#">Read More
															Messages</a>
											</div>
									</li>

									<div class="topbar-divider d-none d-sm-block"></div> --}}

									<!-- Nav Item - User Information -->
									<li class="nav-item dropdown no-arrow">
										<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
										data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

										<div class="topbar-divider d-none d-sm-block"></div>
										<span class="mr-2 d-none d-lg-inline text-gray-600 small text-dark">{{ Auth::user()->name }} </span>
										<img src="{{ asset(Auth::user()->avatar) }}" class="rounded-circle img-profile"  width="20%" height="" alt="User Image" style="border-radius:50%; border:.1rem solid white">
													{{-- <img class="img-profile rounded-circle"
															src="{{ asset('images/avatar.jpg') }}"> --}}
															{{-- <i class="fas fa-caret-down"></i> --}}
															{{-- <svg style="width: .800rem" class="svg-inline--fa fa-caret-down fa-w-10 text-900 fs-3" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="caret-down" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M31.3 192h257.3c17.8 0 26.7 21.5 14.1 34.1L174.1 354.8c-7.8 7.8-20.5 7.8-28.3 0L17.2 226.1C4.6 213.5 13.5 192 31.3 192z"></path></svg> --}}
															{{-- <span class="caret"></span> --}}
											</a>
											<!-- Dropdown - User Information -->
											<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
													aria-labelledby="userDropdown">
													<a class="dropdown-item" href="{{ route('users.edit_profile') }}">
															<i class="fas fa-user-tie fa-sm fa-fw mr-2 "></i>
															My Profile
													</a>
													<a class="dropdown-item" href="#">
															<i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
															Settings
													</a>
													<a class="dropdown-item" href="#">
															<i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
															Activity Log
													</a>
													<div class="dropdown-divider"></div>
													{{-- <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
															<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
															Logout
													</a> --}}
														<a class="dropdown-item" href="{{ route('logout') }}"
															 onclick="event.preventDefault();
																						 document.getElementById('logout-form').submit();">
															<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
															{{ __('Logout') }}
														</a>

														<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
																@csrf
														</form>
											</div>
									</li>

							</ul>

					</nav>
					<main class="py-4 px-4">
						@if (session()->has('success'))
							<div class="alert alert-success alert-dismissible fade show" role="alert">
								{{ session()->get('success') }}
								<button class="close" type="button" data-dismiss="alert" aria-label="Close"><span class="font-weight-light" aria-hidden="true"><i class="far fa-times-circle"></i></span></button>
							</div>
						@endif

						@if (session()->has('error'))
							<div class="alert alert-danger alert-dismissible fade show">
								{{ session()->get('error') }}
								<button class="close" type="button" data-dismiss="alert" aria-label="Close"><span class="font-weight-light" aria-hidden="true"><i class="far fa-times-circle"></i></span></button>
							</div>
						@endif

						@if (session()->has('cat-warning'))
							<div class="alert alert-warning alert-dismissible fade show">
								<h4 class="alert-heading font-weight-semi-bold">Warning!</h4>
								<p>{{ session()->get('cat-warning') }}</p>
								<hr>
								<p class="mb-0">You need to remove posts associated with this category before you can delete it.</p>
								<hr>
								<p class="mb-0"><h2>Nwaegerue Chimeremeze do u believe me now?</h2> <hr> <img src="{{ asset('images/nwa.jpg') }}" alt="" srcset=""></p>
								<button class="close" type="button" data-dismiss="alert" aria-label="Close"><span class="font-weight-light" aria-hidden="true"><i class="far fa-times-circle"></i></span></button>
							</div>
						@endif

						@if (session()->has('tag-warning'))
						<div class="alert alert-warning alert-dismissible fade show">
							<h4 class="alert-heading font-weight-semi-bold">Warning!</h4>
							<p>{{ session()->get('tag-warning') }}</p>
							<hr>
							<p class="mb-0">You need to remove posts associated with this tag before you can delete it.</p>
							<button class="close" type="button" data-dismiss="alert" aria-label="Close"><span class="font-weight-light" aria-hidden="true"><i class="far fa-times-circle"></i></span></button>
						</div>
					@endif
						@yield('content')
					</main>
			</div>
	</div>
			{{--
	</div> --}}

	@yield('scripts')

	{{-- js --}}
	{{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}
	<script src="{{ asset('js/vendor/jquery/jquery.min.js') }}" ></script>
	<script src="{{ asset('js/vendor/bootstrap/js/bootstrap.bundle.min.js') }}" ></script>
	<script src="{{ asset('js/vendor/jquery-easing/jquery.easing.min.js') }}" ></script>
	{{-- <script src="{{ asset('js/vendor/chart.js/Chart.min.js') }}" ></script> --}}
	{{-- <script src="{{ asset('js/demo/chart-area-demo.js') }}" ></script> --}}
	{{-- <script src="{{ asset('js/demo/chart-pie-demo.js') }}" ></script> --}}
	<script src="{{ asset('js/sb-admin-2.min.js') }}" ></script>
	{{-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script> --}}

</body>

</html>
