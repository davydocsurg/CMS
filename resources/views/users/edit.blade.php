@extends('layouts.nav')

@section('content')

<div class="col-md-12">
  <div class="card mb-3 bg-dark text-white">
    <div class="card-header position-relative min-vh-25 mb-7">
      {{-- <div class="bg-holder rounded-soft rounded-bottom-0" style="background-image: url({{ asset('images/6.jpg') }});"></div> --}}
      <div class="bg-holder rounded-soft rounded-bottom-0" style="background-image: url({{ asset($user->avatar) }});"></div>
      <!--/.bg-holder-->
      <div class="avatar avatar-5xl avatar-profile"><img class="rounded-circle img-thumbnail shadow-sm" src="{{ asset($user->avatar) }}" alt="" width="200"></div>
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-lg-8">
          <h4 class="mb-1"> {{ $user->name }}<svg class="svg-inline--fa fa-check-circle fa-w-16 text-primary ml-1" data-toggle="tooltip" data-placement="right" title="" data-fa-transform="shrink-4 down-2" aria-labelledby="svg-inline--fa-title-KafN9Raxxw49" data-prefix="fas" data-icon="check-circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="" style="transform-origin: 0.5em 0.625em;" data-original-title="Verified"><title id="svg-inline--fa-title-KafN9Raxxw49">Verified</title><g transform="translate(256 256)"><g transform="translate(0, 64)  scale(0.75, 0.75)  rotate(0 0 0)"><path fill="currentColor" d="M504 256c0 136.967-111.033 248-248 248S8 392.967 8 256 119.033 8 256 8s248 111.033 248 248zM227.314 387.314l184-184c6.248-6.248 6.248-16.379 0-22.627l-22.627-22.627c-6.248-6.249-16.379-6.249-22.628 0L216 308.118l-70.059-70.059c-6.248-6.248-16.379-6.248-22.628 0l-22.627 22.627c-6.248 6.248-6.248 16.379 0 22.627l104 104c6.249 6.249 16.379 6.249 22.628.001z" transform="translate(-256 -256)"></path></g></g></svg><!-- <small class="fas fa-check-circle text-primary ml-1" data-toggle="tooltip" data-placement="right" title="Verified" data-fa-transform="shrink-4 down-2"></small> --></h4>
          <h5 class="fs-0 font-weight-normal">Senior Software Engineer at Technext Limited</h5>
          <p class="text-500">New York, USA</p><button class="btn btn-falcon-primary btn-sm px-3" type="button">Following</button><button class="btn btn-falcon-default btn-sm px-3 ml-2" type="button">Message</button>
          <hr class="border-dashed my-4 d-lg-none">
        </div>

      </div>
    </div>
  </div>
</div>

<div class="col-lg-8">
    <div class="card mb-3 ">
      <div class="card-header bg-light">
          <h5 class="mb-0">About Me</h5>
      </div>
      <div class="card-body text-justify">
          {{ $user->about }}
      </div>
    </div>
  </div>
    <div class="row no-gutters">
        <div class="col-lg-8 pr-lg-2">
            <div class="card mb-3 bg-dark text-white">
                <div class="card-header bg-dark">
                    <h5 class="mb-0">Profile Settings</h5>
                </div>
                <div class="card-body">
                    @include('partials.errors')

                    <form action="{{ route('users.update_profile') }}" method="POST">

                        @csrf

                        @method('PUT')

                        <div class="row">
                            <div class="col-lg-6">



                                <div class="form-group">
                                    <label for="name"> Name</label>
                                    <input class="form-control" id="name" name="name" type="text" value="{{ $user->name }}">
                                </div>
                            </div>

                            <div class="col-12">
                              <div class="form-group">
                                <img src="{{ asset($user->avatar) }}" alt="" style="width:50%;">
                              </div>
                              <div class="form-group">
                                <label for="avatar">Profile Picture</label>

                                <input type="file" class="form-control" id="avatar" name="avatar" placeholder="" value=""  >
                              </div>
                            </div>

                            {{-- <div class="col-lg-6">
                                <div class="form-group"><label for="last-name">Last Name</label><input class="form-control"
                                        id="last-name" type="text" value="Hopkins"></div>
                            </div> --}}
                            {{--
                            <div class="col-lg-6">
                                <div class="form-group"><label for="email1">Email</label><input class="form-control"
                                        id="email1" type="text" value="anthony@gmail.com"></div>
                            </div>
                            <div class="col-lg-6">
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

                                    <textarea class="form-control" id="about" name="about" cols="5" rows="5">
                                    {{ $user->about }}
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
                                    implement the technologies that successful projects need.
                                    --}}
                                    </textarea></div>
                            </div>
                            <div class="col-12 d-flex justify-content-end card-footer bg-dark"><button class="btn btn-success"
                                    type="submit">Update </button></div>
                        </div>
                    </form>
                </div>
            </div>


        </div>
    </div>
@endsection
