@extends('AdminPages.AdminMaster')
@section('content')



        @if(session('success'))
        <div class="alert alert-success mt-4">
            {{ session('success') }}
        </div>
    @endif
<div  style="margin-top: 2rem">

<h1>Add Product</h1>
                    <div class="card" >
                        <div class="card-body">

                            <form action="{{route('storeProduct')}}" method="POST" enctype="multipart/form-data" style="margin-top: 1rem">
@csrf
@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
                                <div class="form-group mb-3">
                                    <label  class="form-label" style="font-size: 1.1rem">Categories</label>
                                    <select style=" border-color: #c5c2c2;" name="cat_id" id="category_id" class="form-control">
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    </div>
                                <div class="form-group  mb-3">
                                    <label  class="form-label" style="font-size: 1.1rem">Product Name</label>
                                    <input style=" border-color: #c5c2c2;"  name="name" class="form-control" type="text">
                                </div>
                                <div class="form-group mb-3">
                                    <label  style="font-size: 1.1rem" for="price" class="form-label">Price</label>
                                    <input style=" border-color: #c5c2c2;" type="number" name="price" class="form-control" required>
                                </div>

                                <!-- Product Image Field -->
                                <div class=" form-group mb-3">
                                    <label style="font-size: 1.1rem"  for="image" class="form-label">Product Image</label>
                                    <input style=" border-color: #c5c2c2;" type="file" name="images[]" class="form-control" accept="image/*"  multiple required>

                                </div>
                                {{-- <div class=" form-group mb-3">
                                    <label style="font-size: 1.1rem" for="image" class="form-label">Expected Release</label>
                                    <input style=" border-color: #c5c2c2;" type="text" name="image" class="form-control" accept="image/*" required>
                                </div> --}}
@php
$specs = \App\Models\PSpecs::all();
$types = array_unique($specs->pluck('type')->toArray());


@endphp
                                @foreach($types as $t)
                                <label style="font-size: 1.1rem" for="image" class="form-label">{{$t}}</label>
                                @foreach($specs->where('type',$t) as $s)

                                <div class="form-group row mb-3">
                                    <label  for="image" style="padding-right:0 !important; font-weight:600; font-size:0.9rem"class="col-sm-1 col-form-label ">{{$s->name}}</label>
                                    <div class="col-sm-11">
                                        <input  type="text" style=" border-color: #c5c2c2;" name="spcs[{{$s->id}}]" value="123" id="image" class="form-control" accept="image/*" required>


                                    </div>
                                </div>

                                @endforeach
                                @endforeach

{{--

                                <div class="form-group row mb-3">
                                    <label  for="image" style="font-weight:600; font-size:0.9rem" class="col-sm-1 col-form-label">Weight</label>
                                    <div class="col-sm-11">
                                        <input style=" border-color: #c5c2c2;" type="text" name="value" id="image" class="form-control" accept="image/*" required>
                                    </div>
                                </div>


                                <div class="form-group row mb-3">
                                    <label  for="image" style="font-weight:600;font-size:0.9rem" class="col-sm-1 col-form-label">Sim</label>
                                    <div class="col-sm-11">
                                        <input style=" border-color: #c5c2c2;" type="text" name="value" id="image" class="form-control" accept="image/*" required>
                                    </div>
                                </div>

                                <div class="form-group row mb-3">
                                    <label  for="image"  style="font-weight:600; font-size:0.9rem" class="col-sm-1 col-form-label">Battery</label>
                                    <div class="col-sm-11">
                                        <input style=" border-color: #c5c2c2;" type="text" name="value" id="image" class="form-control" accept="image/*" required>
                                    </div>
                                </div>



                                <label style="font-size: 1.1rem" for="image" class="form-label">Platform</label>
                                <div class="form-group row mb-3">
                                    <label  for="image" style="padding-right:0 !important; font-weight:600; font-size:0.9rem"class="col-sm-1 col-form-label ">OS</label>
                                    <div class="col-sm-11">
                                        <input  type="text" style=" border-color: #c5c2c2;" name="value" id="image" class="form-control" accept="image/*" required>
                                    </div>
                                </div>

                                <div class="form-group row mb-3">
                                    <label  for="image" style="font-weight:600; font-size:0.9rem" class="col-sm-1 col-form-label">Chipsit</label>
                                    <div class="col-sm-11">
                                        <input style=" border-color: #c5c2c2;" type="text" name="value" id="image" class="form-control" accept="image/*" required>
                                    </div>
                                </div>


                                <div class="form-group row mb-3">
                                    <label  for="image" style="font-weight:600; font-size:0.9rem" class="col-sm-1 col-form-label">CPU</label>
                                    <div class="col-sm-11">
                                        <input style=" border-color: #c5c2c2;" type="text" name="value" id="image" class="form-control" accept="image/*" required>
                                    </div>
                                </div>

                                <div class="form-group row mb-3">
                                    <label  for="image"  style="font-weight:600; font-size:0.9rem" class="col-sm-1 col-form-label">GPU</label>
                                    <div class="col-sm-11">
                                        <input style=" border-color: #c5c2c2;" type="text" name="value" id="image" class="form-control" accept="image/*" required>
                                    </div>
                                </div>



                                <label style="font-size: 1.1rem" for="image" class="form-label">Memory</label>
                                <div class="form-group row mb-3">
                                    <label  for="image" style="padding-right:0 !important; font-weight:600; font-size:0.9rem"class="col-sm-1 col-form-label ">Storage</label>
                                    <div class="col-sm-11">
                                        <input  type="text" style=" border-color: #c5c2c2;" name="value" id="image" class="form-control" accept="image/*" required>
                                    </div>
                                </div>

                                <div class="form-group row mb-3">
                                    <label  for="image" style="font-weight:600; font-size:0.9rem" class="col-sm-1 col-form-label">RAM</label>
                                    <div class="col-sm-11">
                                        <input style=" border-color: #c5c2c2; " type="text" name="value" id="image" class="form-control" accept="image/*" required>
                                    </div>
                                </div>



                                <label style="font-size: 1.1rem" for="image" class="form-label">Camera</label>
                                <div class="form-group row mb-3">
                                    <label  for="image" style="padding-right:0 !important; font-weight:600; font-size:0.9rem"class="col-sm-1 col-form-label ">Primary Camera</label>
                                    <div class="col-sm-11">
                                        <input  type="text" style=" border-color: #c5c2c2;" name="value" id="image" class="form-control" accept="image/*" required>
                                    </div>
                                </div>

                                <div class="form-group row mb-3">
                                    <label  for="image" style="font-weight:600; font-size:0.9rem" class="col-sm-1 col-form-label">Secondry Camera</label>
                                    <div class="col-sm-11">
                                        <input style=" border-color: #c5c2c2; " type="text" name="value" id="image" class="form-control" accept="image/*" required>
                                    </div>
                                </div>


                                <div class="form-group row mb-3">
                                    <label  for="image" style="font-weight:600; font-size:0.9rem" class="col-sm-1 col-form-label">Video</label>
                                    <div class="col-sm-11">
                                        <input style=" border-color: #c5c2c2; " type="text" name="value" id="image" class="form-control" accept="image/*" required>
                                    </div>
                                </div>



                                <div class="form-group row mb-3">
                                    <label  for="image" style="font-weight:600; font-size:0.9rem" class="col-sm-1 col-form-label">Features</label>
                                    <div class="col-sm-11">
                                        <input style=" border-color: #c5c2c2; " type="text" name="image" id="image" class="form-control" accept="image/*" required>
                                    </div>
                                </div>



                                <label style="font-size: 1.1rem" for="image" class="form-label">Entertainment</label>
                                <div class="form-group row mb-3">
                                    <label  for="image" style="padding-right:0 !important; font-weight:500; font-size:0.9rem"class="col-sm-1 col-form-label ">Entertainment</label>
                                    <div class="col-sm-11">
                                        <input  type="text" style=" border-color: #c5c2c2;" name="value" id="image" class="form-control" accept="image/*" required>
                                    </div>
                                </div>


                                <label style="font-size: 1.1rem" for="image" class="form-label">Other Features</label>
                                <div class="form-group row mb-3">
                                    <label  for="image" style="padding-right:0 !important; font-weight:600; font-size:0.9rem"class="col-sm-1 col-form-label ">Hidden Features</label>
                                    <div class="col-sm-11">
                                        <input  type="text" style=" border-color: #c5c2c2;" name="value" id="image" class="form-control" accept="image/*" required>
                                    </div>
                                </div>

                                <div class="form-group row mb-3">
                                    <label  for="image" style="font-weight:500; font-size:0.9rem" class="col-sm-1 col-form-label">Connectivity</label>
                                    <div class="col-sm-11">
                                        <input style=" border-color: #c5c2c2; " type="text" name="value" id="image" class="form-control" accept="image/*" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <label  for="image" style="font-weight:600; font-size:0.9rem" class="col-sm-1 col-form-label">Operating Frequency</label>
                                    <div class="col-sm-11">
                                        <input style=" border-color: #c5c2c2; " type="text" name="value" id="image" class="form-control" accept="image/*" required>
                                    </div>
                                </div>


                                <div class="form-group row mb-3">
                                    <label  for="image" style="font-weight:600; font-size:0.9rem" class="col-sm-1 col-form-label">Colors</label>
                                    <div class="col-sm-11">
                                        <input style=" border-color: #c5c2c2; " type="text" name="value" id="image" class="form-control" accept="image/*" required>
                                    </div>
                                </div>


                                <div class="form-group row mb-3">
                                    <label  for="image" style="font-weight:600; font-size:0.9rem" class="col-sm-1 col-form-label">Sensors</label>
                                    <div class="col-sm-11">
                                        <input style=" border-color: #c5c2c2; " type="text" name="value" id="image" class="form-control" accept="image/*" required>
                                    </div>
                                </div>


                                <div class="form-group row mb-3">
                                    <label  for="image" style="font-weight:600; font-size:0.9rem" class="col-sm-1 col-form-label">Ringtones</label>
                                    <div class="col-sm-11">
                                        <input style=" border-color: #c5c2c2; " type="text" name="value" id="image" class="form-control" accept="image/*" required>
                                    </div>
                                </div>

                                <div class="form-group row mb-3">
                                    <label  for="image" style="font-weight:600; font-size:0.9rem" class="col-sm-1 col-form-label">Messaging</label>
                                    <div class="col-sm-11">
                                        <input style=" border-color: #c5c2c2; " type="text" name="value" id="image" class="form-control" accept="image/*" required>
                                    </div>
                                </div>
 --}}

                                {{-- <div class="mb-3">
                                    <label  for="spec_id" class="form-label">Specification</label>
                                    <select name="spec_id" class="form-control" required>
                                        @foreach($specs as $spec)
                                            <option value="{{ $spec->id }}">{{ $spec->name }}</option>
                                        @endforeach
                                    </select>
                                </div> --}}
                                {{-- <div class="form-group mb-3">
                                    <label  for="spec_id" class="form-label">Specification Type</label>
                                    <select name="spec_type" id="spec_type" class="form-control" required >
                                        <option value="" selected disabled>Select Specification Type</option>
                                        @foreach($spec_types as $spec_type)
                                        <option value="{{ $spec_type->type }}">{{ $spec_type->type }}</option>
                                    @endforeach
                                    </select>
                                    </div> --}}

                                    {{-- <div class="form-group mb-3">
                                        <label  for="spec_name" class="form-label">Specification Name</label>
                                        <select name="spec_id" id="spec_id" class="form-control" required> --}}

                                            {{-- @foreach($spec_names as $spec_name)
                                            <option value="{{ $spec_name->id }}">{{ $spec_name->name }}</option>
                                        @endforeach --}}
                                        {{-- </select>
                                        </div> --}}
                                {{-- <div class=" form-group mb-3">
                                    <label  for="value" class="form-label">Specification Value</label>
                                    <input style=" border-color: #c5c2c2;" type="text" name="value" class="form-control" required>
                                </div> --}}


                                {{-- <div class="form-group">
                                    <label >Category Image</label>
                                    <input style=" border-color: #c5c2c2;" class="form-control"  name= "image" type="file">
                                </div> --}}

                                <input type="hidden" name="product_id" >
                                <div class="mt-4">
                                    <button class="btn btn-primary" type="submit">Add Product</button>
                                    <a href="categories.html" class="btn btn-link">Cancel</a>
                                </div>
                            </form>

                        </div>
                    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('#spec_type').on('change', function () {
            var specTypeId = $('#spec_type').val();
            // alert(specTypeId);
            $('#spec_id').empty();
            $('#spec_id').append('<option value="" selected disabled>Select Specification Name</option>');
            $.ajax({
                url: '/getspecnames/' + specTypeId,
                type: 'GET',
                success: function (data) {
                    console.log(data);
                    $.each(data, function (key, value) {
                        $('#spec_id').append('<option value="' + value.id + '">' + value.name + '</option>');
                    });
                }
            });
        });
    });
</script>
@endsection
