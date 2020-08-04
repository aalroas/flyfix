@extends('backend.layouts.contentLayoutMaster')

@section('title', 'Account Settings')

@section('vendor-style')

@langrtl
<!-- vendor css files -->
<link rel='stylesheet' href="{{ asset(mix('rtl-vendors/rtl-css/forms/select/select2.min.css')) }}">
<link rel='stylesheet' href="{{ asset(mix('rtl-vendors/rtl-css/pickers/pickadate/pickadate.css')) }}">
@else

<!-- vendor css files -->
<link rel='stylesheet' href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
<link rel='stylesheet' href="{{ asset(mix('vendors/css/pickers/pickadate/pickadate.css')) }}">
@endlangrtl

@endsection
@section('page-style')
@langrtl
<!-- Page css files -->
<link rel="stylesheet" href="{{ asset(mix('rtl-css/plugins/extensions/noui-slider.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('rtl-css/core/colors/palette-noui.css')) }}">
@else
<!-- Page css files -->
<link rel="stylesheet" href="{{ asset(mix('css/plugins/extensions/noui-slider.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('css/core/colors/palette-noui.css')) }}">
@endlangrtl

@endsection

@section('content')
<!-- account setting page start -->
<section id="page-account-settings">
  <div class="row">
    <!-- left menu section -->
    <div class="col-md-3 mb-2 mb-md-0">
      <ul class="nav nav-pills flex-column mt-md-0 mt-1">
        <li class="nav-item">
          <a class="nav-link d-flex py-75 active" id="account-pill-general" data-toggle="pill"
            href="#account-vertical-general" aria-expanded="true">
            <i class="feather icon-globe mr-50 font-medium-3"></i>
            General
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link d-flex py-75" id="account-pill-password" data-toggle="pill"
            href="#password" aria-expanded="false">
            <i class="feather icon-lock mr-50 font-medium-3"></i>
            Change Password
          </a>
        </li>


      </ul>
    </div>
    <!-- right content section -->
    <div class="col-md-9">
      <div class="card">
        <div class="card-content">
          <div class="card-body">
            <div class="tab-content">
              @include('includes.partials.messages')
              <div role="tabpanel" class="tab-pane active" id="account-vertical-general"
                aria-labelledby="account-pill-general" aria-expanded="true">
                <div class="media">
                  <a href="javascript: void(0);">

                      <img id="output" src="{{$logged_in_user->avatar}}"
                           class="rounded mr-75"
                           alt="{{ $logged_in_user->name }}"
                           height="120"
                           width="120">
                  </a>
                    <form action="{{route('frontend.user.profile.update')}}" method="post"   enctype="multipart/form-data">
                  @csrf
                  @method('patch')
                  <div class="media-body mt-75">
                    <div class="col-12 px-0 d-flex flex-sm-row flex-column justify-content-start">
                      <label class="btn btn-sm btn-primary ml-50 mb-50 mb-sm-0 cursor-pointer"
                        for="account-upload">Upload new photo</label>
                      <input onchange="loadFile(event)" name="image" type="file" id="account-upload" hidden>
                      <button class="btn btn-sm btn-outline-warning ml-50">Reset</button>
                    </div>
                    <p class="text-muted ml-75 mt-50"><small>Allowed JPG or PNG. Max
                        size of
                        1000kB</small></p>
                  </div>
                </div>
                <hr>
<script>
  var loadFile = function(event) {
    var reader = new FileReader();
    reader.onload = function(){
      var output = document.getElementById('output');
      output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
  };
</script>


                  <div class="row">
                    <div class="col-12">
                      <div class="form-group">
                        <div class="controls">
                          <label for="account-name">@lang('Type')</label>
                          <h6>@include('backend.auth.user.includes.type', ['user' => $logged_in_user])</h6>
                        </div>
                      </div>
                    </div>

                    <div class="col-12">
                      <div class="form-group">
                        <div class="controls">
                          <label for="account-name">@lang('Name')</label>
                          <input type="text" class="form-control" name="name" id="account-name"
                            placeholder="@lang('Name')" value="{{ $logged_in_user->name }}" required
                            data-validation-required-message="This name field is required">
                        </div>
                      </div>
                    </div>

                    @if ($logged_in_user->canChangeEmail())
                    <div class="col-12">
                      <div class="form-group">
                        <div class="controls">
                          <label for="account-e-mail">@lang('E-mail Address')</label>

                          <input type="email" class="form-control" id="account-e-mail"
                            placeholder="@lang('E-mail Address')" value="{{ $logged_in_user->email }}" name="email"
                            id="email" data-validation-required-message="This email field is required">

                          <br>
                          <div class="alert alert-warning alert-dismissible mb-2" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">×</span>
                            </button>
                            <p class="mb-0">
                              @lang('If you change your e-mail you will be logged out until you confirm your new e-mail
                              address.')
                            </p>

                          </div>
                        </div>
                      </div>
                    </div>
                    @endif

                    @if ($logged_in_user->isSocial())
                    <div class="col-12">
                      <div class="form-group">
                        <div class="controls">
                          <label for="account-e-mail">@lang('Social Provider')</label>
                          <h6>{{ ucfirst($logged_in_user->provider) }}</h6>
                        </div>
                      </div>
                    </div>
                    @endif

                    <div class="col-12">
                      <div class="form-group">
                        <div class="controls">
                          <label for="account-e-mail">@lang('Timezone')</label>
                          <h6>
                            {{ $logged_in_user->timezone ? str_replace('_', ' ', $logged_in_user->timezone) : __('N/A') }}
                          </h6>
                        </div>
                      </div>
                    </div>

                    <div class="col-12">
                      <div class="form-group">
                        <div class="controls">
                          <label for="account-e-mail">@lang('Account Created')</label>
                          <h6>@displayDate($logged_in_user->created_at)
                            ({{ $logged_in_user->created_at->diffForHumans() }})</h6>
                        </div>
                      </div>
                    </div>

                    <div class="col-12">
                      <div class="form-group">
                        <div class="controls">
                          <label for="account-e-mail">@lang('Last Updated')</label>
                          <h6>@displayDate($logged_in_user->updated_at)
                            ({{ $logged_in_user->updated_at->diffForHumans() }})</h6>
                        </div>
                      </div>
                    </div>

                    <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                      <button type="submit" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Save
                        changes</button>
                      <button type="reset" class="btn btn-outline-warning">Cancel</button>
                    </div>
                  </div>
                </form>
              </div>
              <div class="tab-pane fade " id="password" role="tabpanel"
                aria-labelledby="account-pill-password" aria-expanded="false">
                <form action="{{route('frontend.auth.password.change')}}" method="post">
                  @csrf
                  @method('patch')
                  <div class="row">
                    <div class="col-12">
                      <div class="form-group">
                        <div class="controls">
                          <label for="account-old-password">@lang('Current Password')</label>
                          <input type="password" class="form-control" id="account-old-password" maxlength="100" required
                            autofocus placeholder="{{ __('Current Password') }}" name="current_password"
                            data-validation-required-message="This old password field is required">
                        </div>
                      </div>
                    </div>

                    <div class="col-12">
                      <div class="form-group">
                        <div class="controls">
                          <label for="account-new-password">@lang('New Password')</label>
                          <input id="account-new-password" class="form-control"
                            data-validation-required-message="The password field is required" type="password"
                            name="password" class="form-control" placeholder="{{ __('New Password') }}" maxlength="100"
                            required>
                        </div>
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="form-group">
                        <div class="controls">
                          <label for="account-retype-new-password">Retype New
                            Password</label>
                          <input type="password" name="password_confirmation" class="form-control"
                            placeholder="{{ __('New Password Confirmation') }}" maxlength="100" required
                            id="account-retype-new-password" data-validation-match-match="password"
                            data-validation-required-message="The Confirm password field is required">
                        </div>

                      </div>
                    </div>
                    <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                      <button type="submit" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">@lang('Update
                        Password')</button>
                      <button type="reset" class="btn btn-outline-warning">Cancel</button>
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
</section>
<!-- account setting page end -->
@endsection

@section('vendor-script')
<!-- vendor files -->
<script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/forms/validation/jqBootstrapValidation.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/pickers/pickadate/picker.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/pickers/pickadate/picker.date.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/extensions/dropzone.min.js')) }}"></script>
@endsection
@section('page-script')
<!-- Page js files -->
<script src="{{ asset(mix('js/scripts/pages/account-setting.js')) }}"></script>
@endsection
