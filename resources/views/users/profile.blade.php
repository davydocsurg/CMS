@extends('layouts.nav')

@section('content')

    <style>
        .fab {
            font-size: 25px !important;

        }

    </style>

    <div class="col-md-12">
        <div class="card mb-3 bg-dark text-white">
            <div class="card-header position-relative min-vh-25 mb-7" style="background-image: url({{ asset($user->profile->cover_photo) }});
                         background-repeat:no-repeat;
                          background-position: center;
                          background-size: cover;
                          background-attachment: fixed;   ">
                {{-- <div class="bg-holder rounded-soft rounded-bottom-0" style="background-image: url({{ asset('images/6.jpg') }});"></div> --}}
                <div class="bg-holder rounded-soft rounded-bottom-0 bg-danger"
                    style="background-image: url({{ asset($user->profile->avatar) }});"></div>
                <!--/.bg-holder-->
                <div class="avatar avatar-5xl avatar-profile"><img class="rounded-circle img-thumbnail shadow-sm"
                        src="{{ asset($user->profile->avatar) }}" alt="" width="200"></div>
            </div>
            <div class="card-body " style="background: rgb(55, 56, 55)">
                {{-- rgb(55, 56, 55) --}}
                <div class="row">
                    <div class="col-lg-12">
                        <h4 class="mb-1"> {{ $user->name }}<svg
                                class="svg-inline--fa fa-check-circle fa-w-26 text-primary ml-1 mb-2" data-toggle="tooltip"
                                data-placement="right" title="Verified Profile" data-fa-transform="shrink-4 down-2"
                                aria-labelledby="svg-inline--fa-title-KafN9Raxxw49" data-prefix="fas"
                                data-icon="check-circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                data-fa-i2svg="" style="transform-origin: 0.5em 0.625em; height: 22px !important;"
                                data-original-title="Verified">
                                <title id="svg-inline--fa-title-KafN9Raxxw49">Verified Profile</title>
                                <g transform="translate(256 256)">
                                    <g transform="translate(0, 64)  scale(0.75, 0.75)  rotate(0 0 0)">
                                        <path fill="currentColor"
                                            d="M504 256c0 136.967-111.033 248-248 248S8 392.967 8 256 119.033 8 256 8s248 111.033 248 248zM227.314 387.314l184-184c6.248-6.248 6.248-16.379 0-22.627l-22.627-22.627c-6.248-6.249-16.379-6.249-22.628 0L216 308.118l-70.059-70.059c-6.248-6.248-16.379-6.248-22.628 0l-22.627 22.627c-6.248 6.248-6.248 16.379 0 22.627l104 104c6.249 6.249 16.379 6.249 22.628.001z"
                                            transform="translate(-256 -256)"></path>
                                    </g>
                                </g>
                            </svg>
                            <!-- <small class="fas fa-check-circle text-primary ml-1" data-toggle="tooltip" data-placement="right" title="Verified" data-fa-transform="shrink-4 down-2"></small> -->
                        </h4>
                        <h5 class="fs-0 font-weight-normal">{{ $user->profile->job_title }}</h5>
                        <p class="text-500">{{ $user->profile->location }}</p><button
                            class="btn btn-falcon-primary btn-sm px-3" type="button">Following</button><button
                            class="btn btn-falcon-default btn-sm px-3 ml-2" type="button">Message</button>
                        <hr class="border-dashed my-4 d-lg-none">
                        <div class="float-right justify-content-space-between">
                            @if ($user->profile->facebook)
                                <a href="{{ $user->profile->facebook }}" target="_blank" rel="noopener noreferrer"
                                    class="text-primary"><i class="fab fa-facebook text-white"></i></a>
                            @endif

                            @if ($user->profile->twitter)
                                <a href="{{ $user->profile->twitter }}" target="_blank" rel="noopener noreferrer"
                                    class="text-primar" style="color: rgb(0, 255, 255)"><i class="fab fa-twitter"></i></a>
                            @endif

                            @if ($user->profile->youtube)
                                <a href="{{ $user->profile->youtube }}" target="_blank" rel="noopener noreferrer"
                                    class="text-danger"><i class="fab fa-youtube "></i></a>
                            @endif

                            @if ($user->profile->linkedin)
                                <a href="{{ $user->profile->linkedin }}" target="_blank" rel="noopener noreferrer"
                                    class="text-info"><i class="fab fa-linkedin"></i></a>
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card mb-3 ">
            <div class="card-header bg-light">
                <h5 class="mb-0">About Me</h5>
            </div>
            <div class="card-body text-justify">
                {{ $user->profile->about }}
            </div>
        </div>
    </div>
    <div class="row no-gutters">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pr-lg-2">
            <div class="card mb-3 bg-dark text-white">
                <div class="card-header bg-dark">
                    <h5 class="mb-0">Profile Settings</h5>
                </div>
                <div class="card-body">
                    @include('partials.errors')

                    <form action="{{ route('profile.update', $user->profile->id) }}" method="POST"
                        enctype="multipart/form-data">

                        @csrf

                        @method('PUT')

                        <div class="row">
                            <div class="col-lg-6">



                                <div class="form-group">
                                    <label for="name"> Name</label>
                                    <input class="form-control" id="name" name="name" type="text"
                                        value="{{ $user->name }}">
                                </div>
                            </div>

                            <div class="col-12">
                                {{-- <div class="form-group">
                                <img src="{{ asset($user->profile->avatar) }}" alt="" class="rounded-circle" style="width:50%;">
                              </div> --}}
                                <div class="form-group">
                                    <label for="avatar">Change Profile Picture</label>

                                    <input type="file" class="form-control" id="avatar" name="avatar" placeholder=""
                                        value="">
                                </div>

                                <div class="form-group">
                                    <label for="cover photo">Change Cover Photo</label>

                                    <input type="file" class="form-control" id="cover_photo" name="cover_photo"
                                        placeholder="" value="">
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group"><label for="email">Change Email</label>
                                    <input class="form-control" id="email" type="email" name="email"
                                        value="{{ $user->email }}">
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="password" class="">{{ __('New Password') }}</label>

                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        autocomplete="new-password" placeholder="minimum of 8 characters">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- <div class="col-lg-6">
                                <div class="form-group"><label for="last-name">Last Name</label><input class="form-control"
                                        id="last-name" type="text" value="Hopkins"></div>
                            </div> --}}
                            {{-- <div class="col-lg-6">
                                <div class="form-group"><label for="phone">Phone</label><input class="form-control"
                                        id="phone" type="text" value="+44098098304"></div>
                            </div>
                            <div class="col-12">
                                <div class="form-group"><label for="heading">Heading</label><input class="form-control"
                                        id="heading" type="text" value="Software Engineer"></div>
                            </div> --}}
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="about">About Me</label>

                                    <textarea class="form-control" id="about" name="about" cols="5" rows="5"
                                        placeholder="About You">{{ $user->profile->about }}</textarea>
                                </div>
                                {{-- Dedicated, passionate, and accomplished Full Stack
                                    Developer with 9+ years of progressive experience working as an Independent Contractor
                                    for Google and developing and growing my educational social network that helps others
                                    learn programming, web design, game development,
                                    networking. I’ve acquired a wide depth of knowledge and expertise in using my technical
                                    skills in programming, computer science, software
                                    development, and mobile app development to developing solutions to help organizations
                                    increase productivity, and accelerate business
                                    performance. It’s great that we live in an age where we can share so much with
                                    technology but I’m but I’m ready for the next phase of
                                    my career, with a healthy balance between the virtual world and a workplace where I help
                                    others face-to-face. There’s always something
                                    new to learn, especially in IT-related fields. People like working with me because I can
                                    explain technology to everyone, from staff to
                                    executives who need me to tie together the details and the big picture. I can also
                                    implement the technologies that successful projects need. --}}

                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="Job Title">Job Title</label>
                                    <input type="text" name="job_title" id="job_title" class="form-control"
                                        value="{{ $user->profile->job_title }}"
                                        placeholder="Senior Software Engineer at Technext Limited">
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="Location">Location</label>
                                    <input type="text" name="location" id="location" class="form-control"
                                        value="{{ $user->profile->location }}" placeholder="New York, USA">
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="Facebook Profile">Facebook Profile</label>
                                    <input type="url" name="facebook" id="facebook" class="form-control"
                                        value="{{ $user->profile->facebook }}"
                                        placeholder="https://facebook.com/username">
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="Youtube Channel">Youtube Channel</label>
                                    <input type="url" name="youtube" id="youtube" class="form-control"
                                        value="{{ $user->profile->youtube }}" placeholder="https://youtube.com/channel">
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="Twitter">Twitter</label>
                                    <input type="url" name="twitter" id="twitter" class="form-control"
                                        value="{{ $user->profile->twitter }}" placeholder="https://twiiter.com/username">
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="linkedin">LinkedIn</label>
                                    <input type="url" name="linkedin" id="linkedin" class="form-control"
                                        value="{{ $user->profile->linkedin }}"
                                        placeholder="https://linkedin.com/in/username">
                                </div>
                            </div>

                            {{-- <div class="col-12">
                            <div class="form-group">
                              <label for="password-confirm" class="">{{ __('Confirm Password') }}</label>

                              <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="retype password">
                            </div>
                          </div> --}}
                            <div class="col-12 d-flex justify-content-end card-footer bg-dark"><button
                                    class="btn btn-success" type="submit">Update </button></div>
                        </div>
                    </form>
                </div>
            </div>


        </div>
    </div>
@endsection
