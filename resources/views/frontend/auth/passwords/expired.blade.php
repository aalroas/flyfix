@extends('backend.layouts.fullLayoutMaster')

@section('title', __('Your password has expired.'))
@section('page-style')
{{-- Page Css files --}}
<link rel="stylesheet"
      href="{{ asset(mix('css/pages/authentication.css')) }}">
@endsection
<div class="col-xl-7 col-md-9 col-10 d-flex justify-content-center px-0">
    <div class="card bg-authentication rounded-0 mb-0">
      <div class="row m-0">
        <div class="col-lg-6 d-lg-block d-none text-center align-self-center">
          <img src="{{ asset('images/pages/forgot-password.png') }}"
               alt="branding logo">
        </div>
        <div class="col-lg-6 col-12 p-0">
          <div class="card rounded-0 mb-0 px-2 py-1">
            <div class="card-header pb-1">
              <div class="card-title">
                <h4 class="mb-0">@lang('Your password has expired.')</h4>
              </div>
            </div>

 <p class="px-2 mb-0">


 </p>
    <div class="card-content">
      <div class="card-body">
        @if (session('status'))
        <div class="alert alert-success"
             role="alert">
          {{ session('status') }}
        </div>
        @endif
<form method="POST"
      action="{{ route('frontend.auth.password.expired.update') }}">
  @csrf
                  <div class="form-group row">
                                <label for="current_password" class="col-md-4 col-form-label text-md-right">@lang('Current Password')</label>

                                <div class="col-md-6">
                                    <input type="password" name="current_password" class="form-control" placeholder="{{ __('Current Password') }}" maxlength="100" required autofocus />
                                </div>
                            </div><!--form-group-->

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">@lang('New Password')</label>

                                <div class="col-md-6">
                                    <input type="password" id="password" name="password" class="form-control" placeholder="{{ __('New Password') }}" maxlength="100" required autocomplete="password" />
                                </div>
                            </div><!--form-group-->

                            <div class="form-group row">
                                <label for="password_confirmation" class="col-md-4 col-form-label text-md-right">@lang('Password Confirmation')</label>

                                <div class="col-md-6">
                                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" maxlength="100" placeholder="{{ __('Password Confirmation') }}" required autocomplete="new-password" />
                                </div>
                            </div><!--form-group-->

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button class="btn btn-primary" type="submit">@lang('Update Password')</button>
                                </div>
                            </div><!--form-group-->


                          </form>
                          </div>
                          </div>
                          </div>
                          </div>
                          </div>
                          </div>
                          </div>
                          </div>
                          </section>
                          @endsection
