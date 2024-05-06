@extends('AdminPages.AdminMaster')
@section('content')
    <div>
        <h1>All Products</h1>
        <div class="card">
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            {{-- @foreach ($products as $product) --}}
                            
                            <tr>
                                <th>ID</th>
                                <th>Product Name</th>

                                    @foreach ($product->ProductSpecs as $productSpec)
                                        <th>{{ $productSpec->pspecs->name }}</th>
                                    @endforeach



                                <!-- Add more columns as needed for other relationships -->
                            </tr>
                            {{-- @endforeach --}}


                        </thead>
                        <tbody>

                                <tr>
                                    <td>{{ $product->id }}</td>
                                    <td>{{ $product->name }}</td>
                                    @foreach ($product->ProductSpecs as $productSpec)
                                        {{-- <td>label : {{ $productSpec?->pspecs?->name }}<br/> --}}
                                        <td> {{ $productSpec->value }}</td>
                                    @endforeach


                                    {{-- @foreach ($product->ProductSpecs as $productSpec)

                                                <td>label : {{ $productSpec?->pspecs?->name }}<br/>
                                                {{ $productSpec->value }}</td>
                                            @endforeach --}}

                                    <!-- Add more columns as needed for other relationships -->
                                </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
