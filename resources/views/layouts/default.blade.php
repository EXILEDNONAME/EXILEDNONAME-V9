<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('pages.backend.__includes.head')

@if ( !empty($page) && $page == 'message' || !empty($page) && $page == 'file-manager' || !empty($page) && $page == 'profile' )
<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading aside-minimize">
@else
<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
@endif
  @include('pages.backend.__includes.mobile-header')

  <div class="d-flex flex-column flex-root">
    <div class="d-flex flex-row flex-column-fluid page">
      @include('pages.backend.__includes.sidebar')
      <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
        <div id="kt_header" class="header header-fixed">
          <div class="container-fluid d-flex align-items-stretch justify-content-between">
            @include('pages.backend.__includes.topbar-left')
            <div class="topbar">
              @include('pages.backend.__includes.topbar-search')
              @include('pages.backend.__includes.topbar-notification')
              @include('pages.backend.__includes.topbar-quickaction')
              @include('pages.backend.__includes.topbar-cart')
              @include('pages.backend.__includes.topbar-quickpanel')
              @include('pages.backend.__includes.topbar-chat')
              @include('pages.backend.__includes.topbar-language')
              @include('pages.backend.__includes.topbar-user')
            </div>
          </div>
        </div>

        <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
          @include('pages.backend.__includes.subheader')
          <div class="d-flex flex-column-fluid">
            <div class="container-fluid">
              @if ( !empty($page) && $page == 'blank')
              @stack('body')
              @else
              @stack('body')
              @endif
            </div>
          </div>
        </div>

        @include('pages.backend.__includes.footer')
      </div>
    </div>
  </div>

  @include('pages.backend.__includes.scrolltop')
  @include('pages.backend.__includes.sticky-toolbar')
  @include('pages.backend.__includes.js')

</body>
</html>
