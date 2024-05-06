@extends('AdminPages.AdminMaster')
@section('content')
<div> <h1>All Products</h1>
                        <div class="card" >
                            <div class="card-body">

                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>

                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>

                                                <th>Category</th>
                                                <th>Price</th>
                                                <th>Action</th>



                                                <!-- Add more columns as needed for other relationships -->
                                            </tr>


                                        </thead>
                                        <tbody>
                                            @foreach($products as $product)

                                            <tr>
                                                <td>{{ $product->id }}</td>
                                                <td>{{ $product->name }}</td>

                                                <td>{{ $product->category->name }}</td>
                                                <td>{{ $product->price }}</td>
                                                <td>
                                                    <a href="{{ route('ViewProductDetails', $product->id) }}" class="btn btn-primary btn-circle">
                                                        <i class="fas fa-cog"></i>
                                                    </a>
                                                </td>
                                                {{-- @foreach ($product->ProductSpecs as $productSpec)

                                                <td>label : {{ $productSpec?->pspecs?->name }}<br/>
                                                {{ $productSpec->value }}</td>
                                            @endforeach --}}


                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
    </div>


@endsection
