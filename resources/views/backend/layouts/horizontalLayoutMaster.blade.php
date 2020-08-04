<body
    class="horizontal-layout horizontal-menu {{$configData['horizontalMenuType']}} {{ $configData['blankPageClass'] }} {{ $configData['bodyClass'] }}  {{($configData['theme'] === 'dark') ? 'dark-layout' : 'light' }} {{ $configData['footerType'] }}  footer-light"
    data-menu="horizontal-menu" data-col="2-columns" data-open="hover" data-layout="{{ $configData['theme'] }}">

    {{-- Include Sidebar --}}
    @include('backend.panels.sidebar')

    <!-- BEGIN: Header-->
    {{-- Include Navbar --}}
    @include('backend.panels.navbar')

    {{-- Include Sidebar --}}
    @include('panels.horizontalMenu')

    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
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
            @include('includes.partials.read-only')
            @include('includes.partials.logged-in-as')
            @include('includes.partials.announcements')
            {{-- Include Breadcrumb --}}
            @if($configData['pageHeader'] == true)
            @include('panels.breadcrumb')
            @endif

            <div class="content-body">
@include('includes.partials.messages')
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
