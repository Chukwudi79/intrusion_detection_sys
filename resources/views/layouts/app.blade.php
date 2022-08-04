<!doctype html>
<html lang="en">
  <head>
    @include('layouts.includes.head-meta')

    @include('layouts.includes.head-css')

  </head>

  <body>
    
    <div id="page-container" class="sidebar-o sidebar-dark enable-page-overlay side-scroll page-header-fixed main-content-narrow">
      <!-- Side Overlay-->
      @include('layouts.includes.sidebar-nav')
      <!-- END Sidebar -->

      <!-- Header -->
      @include('layouts.includes.header-top-nav')
      <!-- END Header -->

      <!-- Main Container -->
      <main id="main-container">
        @include('layouts.message')
        @yield('content')
      </main>
      <!-- END Main Container -->

      <!-- Footer -->
      @include('layouts.includes.footer')
      <!-- END Footer -->
    </div>
    <!-- END Page Container -->

    @include('layouts.includes.footer-js')
  </body>
</html>
