@include('dashboard.header')
<body class="vertical-layout vertical-menu-modern 2-columns   menu-expanded fixed-navbar"
data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">
  <!-- fixed-top-->
  @include('dashboard.nav')
  <!-- ////////////////////////////////////////////////////////////////////////////-->
  @include('dashboard.menu')
  <div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
      </div>
     @yield('content')
    </div>
  </div>
  <!-- ////////////////////////////////////////////////////////////////////////////-->
  @include('dashboard.footer')