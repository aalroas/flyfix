<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600">

@langrtl
<link rel="stylesheet" href="{{ asset(mix('rtl-vendors/rtl-css/vendors.min.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('rtl-vendors/rtl-css/ui/prism.min.css')) }}">

@else
<link rel="stylesheet" href="{{ asset(mix('vendors/css/vendors.min.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/ui/prism.min.css')) }}">
@endlangrtl

{{-- Vendor Styles --}}
@yield('vendor-style')

@langrtl
{{-- Theme Styles --}}
<link rel="stylesheet" href="{{ asset(mix('rtl-css/bootstrap.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('rtl-css/bootstrap-extended.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('rtl-css/colors.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('rtl-css/components.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('rtl-css/themes/dark-layout.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('rtl-css/themes/semi-dark-layout.css')) }}">
{{-- {!! Helper::applClasses() !!} --}}
@else
{{-- Theme Styles --}}
<link rel="stylesheet" href="{{ asset(mix('css/bootstrap.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('css/bootstrap-extended.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('css/colors.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('css/components.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('css/themes/dark-layout.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('css/themes/semi-dark-layout.css')) }}">
{{-- {!! Helper::applClasses() !!} --}}
@endlangrtl

@php
$configData = Helper::applClasses();
@endphp

{{-- Layout Styles works when don't use customizer --}}

{{-- @if($configData['theme'] == 'dark-layout')
        <link rel="stylesheet" href="{{ asset(mix('css/themes/dark-layout.css')) }}">
@endif
@if($configData['theme'] == 'semi-dark-layout')
<link rel="stylesheet" href="{{ asset(mix('css/themes/semi-dark-layout.css')) }}">
@endif --}}
{{-- Page Styles --}}

@langrtl
@if($configData['mainLayoutType'] === 'horizontal')
<link rel="stylesheet" href="{{ asset(mix('rtl-css/core/menu/menu-types/horizontal-menu.css')) }}">
@endif
<link rel="stylesheet" href="{{ asset(mix('rtl-css/core/menu/menu-types/vertical-menu.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('rtl-css/core/colors/palette-gradient.css')) }}">
{{-- Page Styles --}}
@else

@if($configData['mainLayoutType'] === 'horizontal')
<link rel="stylesheet" href="{{ asset(mix('css/core/menu/menu-types/horizontal-menu.css')) }}">
@endif
<link rel="stylesheet" href="{{ asset(mix('css/core/menu/menu-types/vertical-menu.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('css/core/colors/palette-gradient.css')) }}">
{{-- Page Styles --}}
@endlangrtl

@yield('page-style')

@langrtl
{{-- Laravel Style --}}
<link rel="stylesheet" href="{{ asset(mix('rtl-css/custom-laravel.css')) }}">
{{-- Custom RTL Styles --}}
@if($configData['direction'] === 'rtl' && isset($configData['direction']))
<link rel="stylesheet" href="{{ asset(mix('rtl-css/custom-rtl.css')) }}">
@endif

@else
{{-- Laravel Style --}}
<link rel="stylesheet" href="{{ asset(mix('css/custom-laravel.css')) }}">
{{-- Custom RTL Styles --}}
@if($configData['direction'] === 'rtl' && isset($configData['direction']))
<link rel="stylesheet" href="{{ asset(mix('css/custom-rtl.css')) }}">
@endif
@endlangrtl
