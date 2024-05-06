<!DOCTYPE html>
<html lang="en" style="height: 100%">

<head>
    <!-- Required meta tags -->
    @include('layouts.AdminCSS')
</head>

<body style="height:100% !important">


    <div class="container-fluid" style="height:100% !important; padding-left:0rem !important;">
        <div class="row" style="height:100% !important">

            <!-- offcanvas -->
            <div class="col-lg-2  sidebar d-none d-lg-flex justify-content-center   ">
                @include('AdminPages.sidebar')

            </div>



            <!--  -->
            <div class=" col-lg-10 ">
                {{-- @php
                    $messages = DB::table('ch_messages')->join('users', 'ch_messages.to_id', '=', 'users.id')->join('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')->join('roles', 'model_has_roles.role_id', '=', 'roles.id')->select('ch_messages.*', 'users.avatar')->where('roles.name', 'admin')->get();
                @endphp --}}
                @php
                $messages = DB::table('ch_messages')
                    ->join('users as from_users', 'ch_messages.from_id', '=', 'from_users.id')
                    ->join('users as to_users', 'ch_messages.to_id', '=', 'to_users.id')
                    ->join('model_has_roles', 'to_users.id', '=', 'model_has_roles.model_id')
                    ->join('roles', 'model_has_roles.role_id', '=', 'roles.id')
                    ->select('ch_messages.*', 'from_users.name as from_user_name', 'from_users.avatar as from_user_avatar', 'to_users.name as to_user_name')
                    ->where('roles.name', 'admin')
                    ->get();
            @endphp
  {{-- @php
$messages = DB::table('ch_messages')::with('fromUser', 'toUser')
->whereHas('toUser.roles', function ($query) {
    $query->where('name', 'admin');
})
->get();
@endphp --}}

                @include('AdminPages.header', ['messages' => $messages])
                @yield('content')

            </div>
        </div>
    </div>

    <!-- partial:partials/_navbar.html -->
    {{-- @include('userPages.header') --}}
    <!-- partial -->
    {{-- @include('admin.body') --}}
    <!-- main-panel ends -->


    {{-- @include('userPages.footer') --}}

    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('layouts.AdminJS')
    <!-- End custom js for this page -->
</body>

</html>
