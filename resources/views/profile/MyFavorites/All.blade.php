@extends('profile.master')
@section('content')
    <link href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('./assets/css/admin.css') }}" />
    <link href="{{ asset('./assets/css/style.css') }}" rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('./assets/css/table.css') }}" />

    <link rel="stylesheet" href="{{ asset('./assets/css/drive.css') }}" />

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet" />


    <!-- Begin Page Content -->
    @if (session('success'))
        <div class="alert alert-success mt-4">
            {{ session('success') }}
        </div>
    @endif
    <div>
        <div class="row">
            <div class="col">
              <nav aria-label="breadcrumb" class=" rounded-3 p-3 mb-4" style="background-color: #f1af7d">
                <ol class="breadcrumb mb-0">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item"><a href="#">User</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Your Favorites</li>
                </ol>
              </nav>
            </div>
          </div>
        <div class="card">
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">


                        <thead>
                            <tr>
                                {{-- <th>Favorite ID</th> --}}
                                <th>Product Name</th>
                                <th>Product Price</th>
                                <th>Product Image</th>
                                <th>Category</th>


                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($MyFavorites as $MyFavorite)
                                <tr>

                                    {{-- <td>{{ $MyFavorite->id }} </td> --}}

                                    <td>{{ $MyFavorite->name }}  </td>
                                    <td>{{ $MyFavorite->price }}</td>
<td> <img src="{{ url('storage/' . $MyFavorite->images->first()->image) }}"
    class="img-fluid me-4" alt="Card Image"
    style="width:50px;height:70px"></td>
    <td>{{ $MyFavorite->category->name }}</td>



                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- resources/views/delivery_service_selection.blade.php -->



                    <script>
                        function showDeliveryServiceForm() {
                            // Show the delivery service selection form
                            document.getElementById('deliveryServiceForm').style.display = 'block';
                        }
                    </script>
                    <script>
                        // Optional: You can add JavaScript code to handle form submission, validation, etc.
                    </script>

                </div>
            </div>
        </div>
    </div>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    </div>










    <script src="https://techrepublica.com/playground/dashboard/vendor/jquery/jquery.min.js"></script>
    <script src="https://techrepublica.com/playground/dashboard/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="https://techrepublica.com/playground/dashboard/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="https://techrepublica.com/playground/dashboard/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="https://techrepublica.com/playground/dashboard/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="https://techrepublica.com/playground/dashboard/js/demo/chart-area-demo.js"></script>
    <script src="https://techrepublica.com/playground/dashboard/js/demo/chart-pie-demo.js"></script>

    <!-- Page level plugins -->
    <script src="https://techrepublica.com/playground/dashboard/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="https://techrepublica.com/playground/dashboard/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="https://techrepublica.com/playground/dashboard/js/demo/datatables-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>
    <!-- datatable script -->
    <script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
@endsection
