@extends('AdminPages.AdminMaster')
@section('content')



        @if(session('success'))
        <div class="alert alert-success mt-4">
            {{ session('success') }}
        </div>
    @endif
<div  >

<h1>Add Category</h1>
                    <div class="card" >
                        <div class="card-body">

                            <form action="{{route('storeCategory')}}" method="POST" enctype="multipart/form-data" style="margin-top: 5rem">
                                @csrf
                                <div class="form-group">
                                    <label>Category Name</label>
                                    <input  name="name" class="form-control" type="text">
                                </div>

                                <div class="form-group">
                                    <label>Category Image</label>
                                    <input class="form-control" name="image" type="file">
                                </div>
                                {{-- <div class="form-group">
                                    <label>Category Image</label>
                                    <input class="form-control"  name= "image" type="file">
                                </div> --}}
                                <div class="mt-4">
                                    <button class="btn btn-primary" type="submit">Add Category</button>
                                    <a href="categories.html" class="btn btn-link">Cancel</a>
                                </div>
                            </form>

                        </div>
                    </div>
</div>


@endsection
