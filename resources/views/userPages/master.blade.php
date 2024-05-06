<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
   @include('layouts.userpageCSS')
  </head>
  <body style="max-width: 100vw;overflow-x:clip">



        <!-- partial:partials/_navbar.html -->
@include('userPages.header')
        <!-- partial -->
      {{-- @include('admin.body') --}}
        <!-- main-panel ends -->
        @yield('content')

@include('userPages.footer')

    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('layouts.userpageJS')
    <!-- End custom js for this page -->
  </body>
</html>
