@extends('layouts.nav')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card bg-dark text-white">
                <div class="card-header bg-dark">Site Settings</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('settings.update_set') }}">
                        @csrf
                        {{-- @if (isset($user))
                            @method('PUT')
                        @endif --}}
                        <div class="form-group row">
                            <label for="site name" class="col-md-4 col-form-label text-md-right">{{ __('Site Name') }}</label>

                            <div class="col-md-6">
                                <input id="site_name" type="text" class="form-control" name="site_name" value="{{ $settings->site_name }}" placeholder="My Blog">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Contact E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="contact_email" type="email" class="form-control" name="contact_email" value="{{ $settings->contact_email }}" placeholder="me@example.com">
                            </div>
                        </div>

                        <div class="form-group row">
                          <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                          <div class="col-md-6">
                              <input id="address" type="text" class="form-control" name="address" value="{{ $settings->address }}" placeholder="Chicago, USA">
                          </div>
                        </div>

                        <div class="form-group row">
                          <label for="contact number" class="col-md-4 col-form-label text-md-right">{{ __('Contact Number') }}</label>

                          <div class="col-md-6">
                              <input id="contact_number" type="text" class="form-control" name="contact_number" value="{{ $settings->contact_number }}" placeholder="+1 987 563 5567">
                          </div>
                      </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-success">
                                    Update Settings
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                {{-- <div class="card-footer bg-dark">footer</div> --}}
            </div>
        </div>
    </div>
</div>
@endsection
