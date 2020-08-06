@extends('backend.layouts.contentLayoutMaster')

@section('title', __('Site Settings'))
@section('page-style')
@langrtl
<link rel="stylesheet"
      href="{{ asset(mix('css/plugins/forms/validation/form-validation.css')) }}">
@else
<link rel="stylesheet"
      href="{{ asset(mix('rtl-css/plugins/forms/validation/form-validation.css')) }}">
@endlangrtl
<link rel="stylesheet"
      href="{{asset('common/dropify/css/dropify.min.css') }}">

@endsection
@section('content')

<section id="basic-input">

  <div class="row">
    <div class="col-md-12">
      @include('includes.partials.messages')
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">{{ trans('backend.site_settings') }}
          </h4>

        </div>
        <div class="card-content">
          <div class="card-body">
            <form role="form"
                  action="{{ route('admin.setting.UpdateSiteInfo') }}"
                  method="post"
                  enctype="multipart/form-data">
              {{ csrf_field() }}

              <div class="divider">
                <div class="divider-text">Site Logo</div>
              </div>
              <div class="row clealfix">
                <div class="col-sm-6">
                  <div class="card">
                    <div class="header">
                      <h2>{{ trans('backend.logo') }}</h2>
                    </div>
                    <div class="body">
                      <div class="form-group">
                        <div class="controls">
                          <input type="file"
                                 class="dropify"
                                 data-default-file="{{ asset($Setting->site_logo) }}"
                                 data-allowed-file-extensions="png jpg jpeg"
                                 name="site_logo">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="card">
                    <div class="header">
                      <h2>{{ trans('backend.icon') }}</h2>
                    </div>
                    <div class="body">
                      <div class="form-group">
                        <div class="controls">
                          <input type="file"
                                 class="dropify"
                                 data-default-file="{{ asset($Setting->site_icon) }}"
                                 data-allowed-file-extensions="png jpg jpeg"
                                 name="site_icon">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="divider">
                <div class="divider-text">Site info</div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <div class="card overflow-hidden">
                    <div class="card-content">
                      <div class="card-body">

                        <ul class="nav nav-tabs nav-justified"
                            id="myTabactivity"
                            role="tablist">
                          <li class="nav-item">
                            <a class="nav-link active"
                               id="settings-tr-tab"
                               data-toggle="tab"
                               href="#settings-tr"
                               role="tab"
                               aria-controls="settings-tr"
                               aria-selected="true">[ <i class="flag-icon flag-icon-tr"></i>
                              {{trans('languages.turkish')}} ]</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link"
                               id="settings-en-tab"
                               data-toggle="tab"
                               href="#settings-en"
                               role="tab"
                               aria-controls="settings-en"
                               aria-selected="true">[ <i class="flag-icon flag-icon-us"></i>
                              {{trans('languages.english') }} ] </a>
                          </li>

                          <li class="nav-item">
                            <a class="nav-link"
                               id="settings-ar-tab"
                               data-toggle="tab"
                               href="#settings-ar"
                               role="tab"
                               aria-controls="settings-ar"
                               aria-selected="true">[ <i class="flag-icon flag-icon-sa"></i>
                              {{trans('languages.arabic') }} ]</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link"
                               id="settings-fr-tab"
                               data-toggle="tab"
                               href="#settings-fr"
                               role="tab"
                               aria-controls="settings-fr"
                               aria-selected="true">[ <i class="flag-icon flag-icon-fr"></i>
                              {{trans('languages.french')}} ]</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link"
                               id="settings-fa-tab"
                               data-toggle="tab"
                               href="#settings-fa"
                               role="tab"
                               aria-controls="settings-fa"
                               aria-selected="true">[ <i class="flag-icon flag-icon-ir"></i>
                              {{trans('languages.persian')}} ]</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link"
                               id="settings-ru-tab"
                               data-toggle="tab"
                               href="#settings-ru"
                               role="tab"
                               aria-controls="settings-ru"
                               aria-selected="true">[ <i class="flag-icon flag-icon-ru"></i>
                              {{trans('languages.russian')}} ]</a>
                          </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content pt-1">
                          <div class="tab-pane active"
                               id="settings-tr"
                               role="tabpanel"
                               aria-labelledby="settings-tr">

                            <div class="col-12">
                              <div class="form-group">
                                <div class="controls">
                                  <label for="site_title">{{ trans('backend.site_title') }}</label>
                                  <div class="form-group">
                                    <input type="text"
                                           class="form-control"
                                           required
                                           minlength="2"
                                           name="tr[site_title]"
                                           value="@if (old('site_title')){{ old('site_title') }}@else{{ $Setting->hasTranslation('tr') == true ? $Setting->translate('tr')->site_title : '' }}@endif"
                                           aria-required="true">
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-12">
                              <div class="form-group">
                                <div class="controls">
                                  <label for="site_address">{{ trans('backend.site_address') }}</label>
                                  <div class="form-group">
                                    <textarea data-length="2000"
                                              class="form-control char-textarea"
                                              rows="3"
                                              name="tr[site_address]"
                                              required
                                              placeholder="{{ trans('backend.site_address') }}">@if (old('site_address')){{ old('site_address') }}@else{{ $Setting->hasTranslation('tr') == true ? $Setting->translate('tr')->site_address : '' }}@endif</textarea>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-12">
                              <div class="form-group">
                                <div class="controls">
                                  <label for="copy_right">{{ trans('backend.copy_right') }}</label>
                                  <div class="form-group">
                                    <textarea data-length="2000"
                                              class="form-control char-textarea"
                                              rows="3"
                                              name="tr[copy_right]"
                                              required
                                              placeholder="{{ trans('backend.copy_right') }}">@if (old('copy_right')){{ old('copy_right') }}@else{{ $Setting->hasTranslation('tr') == true ? $Setting->translate('tr')->copy_right : '' }}@endif</textarea>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-12">
                              <div class="form-group">
                                <div class="controls">
                                  <label
                                         for="site_meta_description">{{ trans('backend.site_meta_description') }}</label>
                                  <div class="form-group">
                                    <textarea data-length="2000"
                                              class="form-control char-textarea"
                                              rows="3"
                                              name="tr[site_meta_description]"
                                              required
                                              placeholder="{{ trans('backend.site_meta_description') }}">@if (old('site_meta_description')){{ old('site_meta_description') }}@else{{ $Setting->hasTranslation('tr') == true ? $Setting->translate('tr')->site_meta_description : '' }}@endif</textarea>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-12">
                              <div class="form-group">
                                <div class="controls">
                                  <label for="site_meta_keywords">{{ trans('backend.site_meta_keywords') }}</label>
                                  <div class="form-group">
                                    <textarea data-length="2000"
                                              class="form-control char-textarea"
                                              rows="3"
                                              name="tr[site_meta_keywords]"
                                              required
                                              placeholder="{{ trans('backend.site_meta_keywords') }}">@if (old('site_meta_keywords')){{ old('site_meta_keywords') }}@else{{ $Setting->hasTranslation('tr') == true ? $Setting->translate('tr')->site_meta_keywords : '' }}@endif</textarea>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="tab-pane"
                               id="settings-en"
                               role="tabpanel"
                               aria-labelledby="settings-en">

                            <div class="col-12">
                              <div class="form-group">
                                <div class="controls">
                                  <label for="site_title">{{ trans('backend.site_title') }}</label>
                                  <div class="form-group">
                                    <input type="text"
                                           class="form-control"
                                           required
                                           minlength="2"
                                           name="en[site_title]"
                                           value="@if (old('site_title')){{ old('site_title') }}@else{{ $Setting->hasTranslation('en') == true ? $Setting->translate('en')->site_title : '' }}@endif"
                                           aria-required="true">
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-12">
                              <div class="form-group">
                                <div class="controls">
                                  <label for="site_address">{{ trans('backend.site_address') }}</label>
                                  <div class="form-group">
                                    <textarea data-length="2000"
                                              class="form-control char-textarea"
                                              rows="3"
                                              name="en[site_address]"
                                              required
                                              placeholder="{{ trans('backend.site_address') }}">@if (old('site_address')){{ old('site_address') }}@else{{ $Setting->hasTranslation('en') == true ? $Setting->translate('en')->site_address : '' }}@endif</textarea>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-12">
                              <div class="form-group">
                                <div class="controls">
                                  <label for="copy_right">{{ trans('backend.copy_right') }}</label>
                                  <div class="form-group">
                                    <textarea data-length="2000"
                                              class="form-control char-textarea"
                                              rows="3"
                                              name="en[copy_right]"
                                              required
                                              placeholder="{{ trans('backend.copy_right') }}">@if (old('copy_right')){{ old('copy_right') }}@else{{ $Setting->hasTranslation('en') == true ? $Setting->translate('en')->copy_right : '' }}@endif</textarea>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-12">
                              <div class="form-group">
                                <div class="controls">
                                  <label
                                         for="site_meta_description">{{ trans('backend.site_meta_description') }}</label>
                                  <div class="form-group">
                                    <textarea data-length="2000"
                                              class="form-control char-textarea"
                                              rows="3"
                                              name="en[site_meta_description]"
                                              required
                                              placeholder="{{ trans('backend.site_meta_description') }}">@if (old('site_meta_description')){{ old('site_meta_description') }}@else{{ $Setting->hasTranslation('en') == true ? $Setting->translate('en')->site_meta_description : '' }}@endif</textarea>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-12">
                              <div class="form-group">
                                <div class="controls">
                                  <label for="site_meta_keywords">{{ trans('backend.site_meta_keywords') }}</label>
                                  <div class="form-group">
                                    <textarea data-length="2000"
                                              class="form-control char-textarea"
                                              rows="3"
                                              name="en[site_meta_keywords]"
                                              required
                                              placeholder="{{ trans('backend.site_meta_keywords') }}">@if (old('site_meta_keywords')){{ old('site_meta_keywords') }}@else{{ $Setting->hasTranslation('en') == true ? $Setting->translate('en')->site_meta_keywords : '' }}@endif</textarea>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="tab-pane"
                               id="settings-ar"
                               role="tabpanel"
                               aria-labelledby="settings-ar">

                            <div class="col-12">
                              <div class="form-group">
                                <div class="controls">
                                  <label for="site_title">{{ trans('backend.site_title') }}</label>
                                  <div class="form-group">
                                    <input type="text"
                                           class="form-control"
                                           required
                                           minlength="2"
                                           name="ar[site_title]"
                                           value="@if (old('site_title')){{ old('site_title') }}@else{{ $Setting->hasTranslation('ar') == true ? $Setting->translate('ar')->site_title : '' }}@endif"
                                           aria-required="true">
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-12">
                              <div class="form-group">
                                <div class="controls">
                                  <label for="site_address">{{ trans('backend.site_address') }}</label>
                                  <div class="form-group">
                                    <textarea data-length="2000"
                                              class="form-control char-textarea"
                                              rows="3"
                                              name="ar[site_address]"
                                              required
                                              placeholder="{{ trans('backend.site_address') }}">@if (old('site_address')){{ old('site_address') }}@else{{ $Setting->hasTranslation('ar') == true ? $Setting->translate('ar')->site_address : '' }}@endif</textarea>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-12">
                              <div class="form-group">
                                <div class="controls">
                                  <label for="copy_right">{{ trans('backend.copy_right') }}</label>
                                  <div class="form-group">
                                    <textarea data-length="2000"
                                              class="form-control char-textarea"
                                              rows="3"
                                              name="ar[copy_right]"
                                              required
                                              placeholder="{{ trans('backend.copy_right') }}">@if (old('copy_right')){{ old('copy_right') }}@else{{ $Setting->hasTranslation('ar') == true ? $Setting->translate('ar')->copy_right : '' }}@endif</textarea>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-12">
                              <div class="form-group">
                                <div class="controls">
                                  <label
                                         for="site_meta_description">{{ trans('backend.site_meta_description') }}</label>
                                  <div class="form-group">
                                    <textarea data-length="2000"
                                              class="form-control char-textarea"
                                              rows="3"
                                              name="ar[site_meta_description]"
                                              required
                                              placeholder="{{ trans('backend.site_meta_description') }}">@if (old('site_meta_description')){{ old('site_meta_description') }}@else{{ $Setting->hasTranslation('ar') == true ? $Setting->translate('ar')->site_meta_description : '' }}@endif</textarea>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-12">
                              <div class="form-group">
                                <div class="controls">
                                  <label for="site_meta_keywords">{{ trans('backend.site_meta_keywords') }}</label>
                                  <div class="form-group">
                                    <textarea data-length="2000"
                                              class="form-control char-textarea"
                                              rows="3"
                                              name="ar[site_meta_keywords]"
                                              required
                                              placeholder="{{ trans('backend.site_meta_keywords') }}">@if (old('site_meta_keywords')){{ old('site_meta_keywords') }}@else{{ $Setting->hasTranslation('ar') == true ? $Setting->translate('ar')->site_meta_keywords : '' }}@endif</textarea>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="tab-pane"
                               id="settings-fr"
                               role="tabpanel"
                               aria-labelledby="settings-fr">

                            <div class="col-12">
                              <div class="form-group">
                                <div class="controls">
                                  <label for="site_title">{{ trans('backend.site_title') }}</label>
                                  <div class="form-group">
                                    <input type="text"
                                           class="form-control"
                                           required
                                           minlength="2"
                                           name="fr[site_title]"
                                           value="@if (old('site_title')){{ old('site_title') }}@else{{ $Setting->hasTranslation('fr') == true ? $Setting->translate('fr')->site_title : '' }}@endif"
                                           aria-required="true">
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-12">
                              <div class="form-group">
                                <div class="controls">
                                  <label for="site_address">{{ trans('backend.site_address') }}</label>
                                  <div class="form-group">
                                    <textarea data-length="2000"
                                              class="form-control char-textarea"
                                              rows="3"
                                              name="fr[site_address]"
                                              required
                                              placeholder="{{ trans('backend.site_address') }}">@if (old('site_address')){{ old('site_address') }}@else{{ $Setting->hasTranslation('fr') == true ? $Setting->translate('fr')->site_address : '' }}@endif</textarea>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-12">
                              <div class="form-group">
                                <div class="controls">
                                  <label for="copy_right">{{ trans('backend.copy_right') }}</label>
                                  <div class="form-group">
                                    <textarea data-length="2000"
                                              class="form-control char-textarea"
                                              rows="3"
                                              name="fr[copy_right]"
                                              required
                                              placeholder="{{ trans('backend.copy_right') }}">@if (old('copy_right')){{ old('copy_right') }}@else{{ $Setting->hasTranslation('fr') == true ? $Setting->translate('fr')->copy_right : '' }}@endif</textarea>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-12">
                              <div class="form-group">
                                <div class="controls">
                                  <label
                                         for="site_meta_description">{{ trans('backend.site_meta_description') }}</label>
                                  <div class="form-group">
                                    <textarea data-length="2000"
                                              class="form-control char-textarea"
                                              rows="3"
                                              name="fr[site_meta_description]"
                                              required
                                              placeholder="{{ trans('backend.site_meta_description') }}">@if (old('site_meta_description')){{ old('site_meta_description') }}@else{{ $Setting->hasTranslation('fr') == true ? $Setting->translate('fr')->site_meta_description : '' }}@endif</textarea>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-12">
                              <div class="form-group">
                                <div class="controls">
                                  <label for="site_meta_keywords">{{ trans('backend.site_meta_keywords') }}</label>
                                  <div class="form-group">
                                    <textarea data-length="2000"
                                              class="form-control char-textarea"
                                              rows="3"
                                              name="fr[site_meta_keywords]"
                                              required
                                              placeholder="{{ trans('backend.site_meta_keywords') }}">@if (old('site_meta_keywords')){{ old('site_meta_keywords') }}@else{{ $Setting->hasTranslation('fr') == true ? $Setting->translate('fr')->site_meta_keywords : '' }}@endif</textarea>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="tab-pane"
                               id="settings-fa"
                               role="tabpanel"
                               aria-labelledby="settings-fa">

                            <div class="col-12">
                              <div class="form-group">
                                <div class="controls">
                                  <label for="site_title">{{ trans('backend.site_title') }}</label>
                                  <div class="form-group">
                                    <input type="text"
                                           class="form-control"
                                           required
                                           minlength="2"
                                           name="fa[site_title]"
                                           value="@if (old('site_title')){{ old('site_title') }}@else{{ $Setting->hasTranslation('fa') == true ? $Setting->translate('fa')->site_title : '' }}@endif"
                                           aria-required="true">
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-12">
                              <div class="form-group">
                                <div class="controls">
                                  <label for="site_address">{{ trans('backend.site_address') }}</label>
                                  <div class="form-group">
                                    <textarea data-length="2000"
                                              class="form-control char-textarea"
                                              rows="3"
                                              name="fa[site_address]"
                                              required
                                              placeholder="{{ trans('backend.site_address') }}">@if (old('site_address')){{ old('site_address') }}@else{{ $Setting->hasTranslation('fa') == true ? $Setting->translate('fa')->site_address : '' }}@endif</textarea>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-12">
                              <div class="form-group">
                                <div class="controls">
                                  <label for="copy_right">{{ trans('backend.copy_right') }}</label>
                                  <div class="form-group">
                                    <textarea data-length="2000"
                                              class="form-control char-textarea"
                                              rows="3"
                                              name="fa[copy_right]"
                                              required
                                              placeholder="{{ trans('backend.copy_right') }}">@if (old('copy_right')){{ old('copy_right') }}@else{{ $Setting->hasTranslation('fa') == true ? $Setting->translate('fa')->copy_right : '' }}@endif</textarea>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-12">
                              <div class="form-group">
                                <div class="controls">
                                  <label
                                         for="site_meta_description">{{ trans('backend.site_meta_description') }}</label>
                                  <div class="form-group">
                                    <textarea data-length="2000"
                                              class="form-control char-textarea"
                                              rows="3"
                                              name="fa[site_meta_description]"
                                              required
                                              placeholder="{{ trans('backend.site_meta_description') }}">@if (old('site_meta_description')){{ old('site_meta_description') }}@else{{ $Setting->hasTranslation('fa') == true ? $Setting->translate('fa')->site_meta_description : '' }}@endif</textarea>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-12">
                              <div class="form-group">
                                <div class="controls">
                                  <label for="site_meta_keywords">{{ trans('backend.site_meta_keywords') }}</label>
                                  <div class="form-group">
                                    <textarea data-length="2000"
                                              class="form-control char-textarea"
                                              rows="3"
                                              name="fa[site_meta_keywords]"
                                              required
                                              placeholder="{{ trans('backend.site_meta_keywords') }}">@if (old('site_meta_keywords')){{ old('site_meta_keywords') }}@else{{ $Setting->hasTranslation('fa') == true ? $Setting->translate('fa')->site_meta_keywords : '' }}@endif</textarea>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="tab-pane"
                               id="settings-ru"
                               role="tabpanel"
                               aria-labelledby="settings-ru">

                            <div class="col-12">
                              <div class="form-group">
                                <div class="controls">
                                  <label for="site_title">{{ trans('backend.site_title') }}</label>
                                  <div class="form-group">
                                    <input type="text"
                                           class="form-control"
                                           required
                                           minlength="2"
                                           name="ru[site_title]"
                                           value="@if (old('site_title')){{ old('site_title') }}@else{{ $Setting->hasTranslation('ru') == true ? $Setting->translate('ru')->site_title : '' }}@endif"
                                           aria-required="true">
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-12">
                              <div class="form-group">
                                <div class="controls">
                                  <label for="site_address">{{ trans('backend.site_address') }}</label>
                                  <div class="form-group">
                                    <textarea data-length="2000"
                                              class="form-control char-textarea"
                                              rows="3"
                                              name="ru[site_address]"
                                              required
                                              placeholder="{{ trans('backend.site_address') }}">@if (old('site_address')){{ old('site_address') }}@else{{ $Setting->hasTranslation('ru') == true ? $Setting->translate('ru')->site_address : '' }}@endif</textarea>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-12">
                              <div class="form-group">
                                <div class="controls">
                                  <label for="copy_right">{{ trans('backend.copy_right') }}</label>
                                  <div class="form-group">
                                    <textarea data-length="2000"
                                              class="form-control char-textarea"
                                              rows="3"
                                              name="ru[copy_right]"
                                              required
                                              placeholder="{{ trans('backend.copy_right') }}">@if (old('copy_right')){{ old('copy_right') }}@else{{ $Setting->hasTranslation('ru') == true ? $Setting->translate('ru')->copy_right : '' }}@endif</textarea>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-12">
                              <div class="form-group">
                                <div class="controls">
                                  <label
                                         for="site_meta_description">{{ trans('backend.site_meta_description') }}</label>
                                  <div class="form-group">
                                    <textarea data-length="2000"
                                              class="form-control char-textarea"
                                              rows="3"
                                              name="ru[site_meta_description]"
                                              required
                                              placeholder="{{ trans('backend.site_meta_description') }}">@if (old('site_meta_description')){{ old('site_meta_description') }}@else{{ $Setting->hasTranslation('ru') == true ? $Setting->translate('ru')->site_meta_description : '' }}@endif</textarea>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-12">
                              <div class="form-group">
                                <div class="controls">
                                  <label for="site_meta_keywords">{{ trans('backend.site_meta_keywords') }}</label>
                                  <div class="form-group">
                                    <textarea data-length="2000"
                                              class="form-control char-textarea"
                                              rows="3"
                                              name="ru[site_meta_keywords]"
                                              required
                                              placeholder="{{ trans('backend.site_meta_keywords') }}">@if (old('site_meta_keywords')){{ old('site_meta_keywords') }}@else{{ $Setting->hasTranslation('ru') == true ? $Setting->translate('ru')->site_meta_keywords : '' }}@endif</textarea>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>

                        </div>

                      </div>
                    </div>

                  </div>

                </div>
              </div>
              <div class="divider">
                <div class="divider-text">Site Contact Info</div>
              </div>
              <div class="row clealfix">

                <div class="col-sm-4">
                  <div class="form-group">
                    <div class="controls">
                      <label for="site_url">{{ trans('backend.site_url') }}</label>
                      <div class="form-group">
                        <input type="text"
                               class="form-control"
                               required
                               minlength="2"
                               name="site_url"
                               value="@if (old('site_url')){{ old('site_url') }}@else{{ $Setting->site_url }}@endif"
                               aria-required="true">
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-sm-4">
                  <div class="form-group">
                    <div class="controls">
                      <label for="site_email">{{ trans('backend.site_email') }}</label>
                      <div class="form-group">
                        <input type="text"
                               class="form-control"
                               required
                               minlength="2"
                               name="site_email"
                               value="@if (old('site_email')){{ old('site_email') }}@else{{ $Setting->site_email }}@endif"
                               aria-required="true">
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-sm-4">
                  <div class="form-group">
                    <div class="controls">
                      <label for="site_mobile">{{ trans('backend.site_mobile') }}</label>
                      <div class="form-group">
                        <input type="text"
                               class="form-control"
                               required
                               minlength="2"
                               name="site_mobile"
                               value="@if (old('site_mobile')){{ old('site_mobile') }}@else{{ $Setting->site_mobile }}@endif"
                               aria-required="true">
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-sm-4">
                  <div class="form-group">
                    <div class="controls">
                      <label for="site_phone">{{ trans('backend.site_phone') }}</label>
                      <div class="form-group">
                        <input type="text"
                               class="form-control"
                               required
                               minlength="2"
                               name="site_phone"
                               value="@if (old('site_phone')){{ old('site_phone') }}@else{{ $Setting->site_phone }}@endif"
                               aria-required="true">
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-sm-4">
                  <div class="form-group">
                    <div class="controls">
                      <label for="site_fax">{{ trans('backend.site_fax') }}</label>
                      <div class="form-group">
                        <input type="text"
                               class="form-control"
                               required
                               minlength="2"
                               name="site_fax"
                               value="@if (old('site_fax')){{ old('site_fax') }}@else{{ $Setting->site_fax }}@endif"
                               aria-required="true">
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-sm-4">
                  <div class="form-group">
                    <div class="controls">
                      <label for="site_whatsapp_url">{{ trans('backend.whatsapp_url') }}</label>
                      <div class="form-group">
                        <input type="text"
                               class="form-control"
                               required
                               minlength="2"
                               name="site_whatsapp_url"
                               value="@if (old('site_whatsapp_url')){{ old('site_whatsapp_url') }}@else{{ $Setting->site_whatsapp_url }}@endif"
                               aria-required="true">
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-sm-4">
                  <div class="form-group">
                    <div class="controls">
                      <label for="site_instagram_url">{{ trans('backend.instagram_url') }}</label>
                      <div class="form-group">
                        <input type="text"
                               class="form-control"
                               required
                               minlength="2"
                               name="site_instagram_url"
                               value="@if (old('site_instagram_url')){{ old('site_instagram_url') }}@else{{ $Setting->site_instagram_url }}@endif"
                               aria-required="true">
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-sm-4">
                  <div class="form-group">
                    <div class="controls">
                      <label for="site_facebook_url">{{ trans('backend.facebook_url') }}</label>
                      <div class="form-group">
                        <input type="text"
                               class="form-control"
                               required
                               minlength="2"
                               name="site_facebook_url"
                               value="@if (old('site_facebook_url')){{ old('site_facebook_url') }}@else{{ $Setting->site_facebook_url }}@endif"
                               aria-required="true">
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-sm-4">
                  <div class="form-group">
                    <div class="controls">
                      <label for="site_twitter_url">{{ trans('backend.twitter_url') }}</label>
                      <div class="form-group">
                        <input type="text"
                               class="form-control"
                               required
                               minlength="2"
                               name="site_twitter_url"
                               value="@if (old('site_twitter_url')){{ old('site_twitter_url') }}@else{{ $Setting->site_twitter_url }}@endif"
                               aria-required="true">
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-sm-4">
                  <div class="form-group">
                    <div class="controls">
                      <label for="site_linkedin_url">{{ trans('backend.linkedin_url') }}</label>
                      <div class="form-group">
                        <input type="text"
                               class="form-control"
                               required
                               minlength="2"
                               name="site_linkedin_url"
                               value="@if (old('site_linkedin_url')){{ old('site_linkedin_url') }}@else{{ $Setting->site_linkedin_url }}@endif"
                               aria-required="true">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <div class="controls">
                      <label for="site_youtube_url">{{ trans('backend.youtube_url') }}</label>
                      <div class="form-group">
                        <input type="text"
                               class="form-control"
                               required
                               minlength="2"
                               name="site_youtube_url"
                               value="@if (old('site_youtube_url')){{ old('site_youtube_url') }}@else{{ $Setting->site_youtube_url }}@endif"
                               aria-required="true">
                      </div>
                    </div>
                  </div>
                </div>
              </div>


              <div class="box-footer">
                <button type="submit"
                        class="btn btn-success">{{ trans('backend.save') }}</button>
                <a type="button"
                   class="btn btn-warning"
                   href="{{   route('admin.dashboard')   }}">{{ trans('backend.back') }}</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection

@section('page-script')
<script src="{{asset('common/dropify/js/dropify.js') }}"></script>
<script src="{{asset('common/dropify/js/dropify.js') }}"></script>
<script src="{{asset('common/dropify/dropify.js') }}"></script>
@endsection
