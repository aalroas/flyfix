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
        <label for="site_meta_description">{{ trans('backend.site_meta_description') }}</label>
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
