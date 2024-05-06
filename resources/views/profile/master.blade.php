<!DOCTYPE html>
<html lang="en" style="height: 100%">
  <head>
    <!-- Required meta tags -->
   {{-- @include('layouts.AdminCSS') --}}
   <style>
    .min-h-screen {
    min-height: 0vh !important;
}
    </style>
  </head>

  <body style="height:100% !important">


    <div id="wrapper">
        <!-- Sidebar -->
        @include('profile.sidebar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <x-app-layout>
                    <x-slot name="header" >
                        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                            {{ __('Profile') }}
                        </h2>
                    </x-slot>




                </x-app-layout>
                <!-- End of Topbar -->

                <!-- Logout Modal-->
                <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">
                                    Ready to Leave?
                                </h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Select "Logout" below if you are ready to end your current
                                session.
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">
                                    Cancel
                                </button>
                                <form action="#" method="post">
                                    <input type="hidden" name="_token"
                                        value="LUEiBe8ZD9KPYNf3Iffsuxl3WaNSydPz6CnLLuBX" />
                                    <input type="submit" value="Logout" class="btn btn-primary" />
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Begin Page Content -->
                @yield('content')
            </div>
        </div>

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>
    </div>

        <!-- partial:partials/_navbar.html -->
{{-- @include('userPages.header') --}}
        <!-- partial -->
      {{-- @include('admin.body') --}}
        <!-- main-panel ends -->


{{-- @include('userPages.footer') --}}

    <!-- container-scroller -->
    <!-- plugins:js -->
    {{-- @include('layouts.AdminJS') --}}
    <!-- End custom js for this page -->
  </body>
</html>
