@extends('backend.layouts.contentLayoutMaster')

@section('title', __('Dashboard'))

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
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <x-frontend.card>
                    <x-slot name="header">
                        @lang('Dashboard')
                    </x-slot>

                    <x-slot name="body">
                        @lang('You are logged in!')
                    </x-slot>
                </x-frontend.card>
            </div><!--col-md-10-->
        </div><!--row-->
    </div><!--container-->
@endsection
