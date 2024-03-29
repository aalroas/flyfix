<body
  class="vertical-layout vertical-menu-modern 2-columns {{ $configData['blankPageClass'] }} {{ $configData['bodyClass']}} {{($configData['theme'] === 'light') ? '' : $configData['layoutTheme'] }}  {{ $configData['verticalMenuNavbarType'] }} {{ $configData['sidebarClass'] }} {{ $configData['footerType'] }}"
  data-menu="vertical-menu-modern" data-col="2-columns" data-layout="{{ $configData['theme'] }}">
  {{-- Include Sidebar --}}
  @include('backend.panels.sidebar')

  <!-- BEGIN: Content-->
  <div class="app-content content">
    <!-- BEGIN: Header-->
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>

    {{-- Include Navbar --}}
    @include('backend.panels.navbar')

    @if(($configData['contentLayout']!=='default') && isset($configData['contentLayout']))
    <div class="content-area-wrapper">
      <div class="{{ $configData['sidebarPositionClass'] }}">
        <div class="sidebar">
          {{-- Include Sidebar Content --}}
          @yield('content-sidebar')
        </div>
      </div>


      <div class="{{ $configData['contentsidebarClass'] }}">
        <div class="content-wrapper">
          <div class="content-body">

            {{-- Include Page Content --}}
            @yield('content')
          </div>
        </div>
      </div>
    </div>
    @else
    <div class="content-wrapper">
      {{-- Include Breadcrumb --}}
      @if($configData['pageHeader'] === true && isset($configData['pageHeader']))
      @include('backend.panels.breadcrumb')
      @endif

      <div class="content-body">
        {{-- Include Page Content --}}
        @yield('content')
      </div>
    </div>
    @endif

  </div>
  <!-- End: Content-->



  <div class="sidenav-overlay"></div>
  <div class="drag-target"></div>

  {{-- include footer --}}
  @include('backend.panels.footer')

  {{-- include default scripts --}}
  @include('backend.panels.scripts')

</body>

</html>
