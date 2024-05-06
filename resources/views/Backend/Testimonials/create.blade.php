@extends('AdminPages.AdminMaster')
@section('content')



        @if(session('success'))
        <div class="alert alert-success mt-4">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div>

    <h1>Add Testominials</h1>
    <div class="card" >
        <div class="card-body">

            <form action="{{route('storeTestimonial')}}" method="POST" enctype="multipart/form-data" style="margin-top: 5rem">
                @csrf
                <div class="form-group">
                <label for="name">Name:</label><br>
                <input type="text" id="name" name="name" class="form-control"><br></div>

                <label for="email">Email:</label><br>
                <input type="email" id="email" name="email" class="form-control"><br>

                <label for="rating">Rating:</label><br>
                <input type="number" id="rating" name="rating" min="1" max="5" class="form-control"><br>

                <label for="message">Message:</label><br>
                <textarea id="message"  class="form-control" name="message"></textarea><br>

                <label for="image">Image:</label><br>
                <input type="file" id="image" name="image" class="form-control"><br>


                <div class="mt-4">
                    <button class="btn btn-primary" type="submit">Add Testimonial</button>
                    <a href="categories.html" class="btn btn-primary">Cancel</a>
                </div>
            </form>

        </div>
    </div>
</div>






    @endsection

