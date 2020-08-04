@extends('backend.layouts.fullLayoutMaster')

@section('title', __('Verify Your E-mail Address'))

@section('page-style')
{{-- Page Css files --}}
<link rel="stylesheet"
      href="{{ asset(mix('css/pages/authentication.css')) }}">
@endsection
@section('content')
<section class="row flexbox-container">
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
                <h4 class="mb-0">@lang('Verify Your E-mail Address')</h4>
              </div>
            </div>
            <p class="px-2 mb-0"> @lang('Before proceeding, please check your email for a verification link.')
              <br>
              <br>
            @lang('If you did not receive the email')</p>
            <div class="card-content">
              <div class="card-body">
                @if (session('status'))
                <div class="alert alert-success"
                     role="alert">
                  {{ session('status') }}
                </div>
                @endif
                <form method="POST"
                      action="{{ route('frontend.auth.verification.resend') }}">
                  @csrf
                  <div class="form-label-group ">

  <div class="float-md d-block mb-1">
    <button type="submit"
            class="btn btn-primary btn-block px-75">@lang('click here to request
      another').</button>

  </div>
                  </div>



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
