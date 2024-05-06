@extends('AdminPages.AdminMaster')
@section('content')
       @if(session('success'))
        <div class="alert alert-success mt-4">
            {{ session('success') }}
        </div>
    @endif
<div  >

<h1>Edit Testimonial</h1>
                    <div class="card" >
                        <div class="card-body">

                            <form action="{{route('updateTestimonial', $Testimonial->id)}}" method="POST" enctype="multipart/form-data" style="margin-top: 5rem">
                                @csrf
                                <div class="form-group">
                                    <label>Testimonial Name</label>
                                    <input  name="name" class="form-control" type="text"  value="{{$Testimonial->name}}">
                                </div>
                                <div class="form-group">
                                    <label>Testimonial Email</label>
                                    <input  name="email" class="form-control" type="text"  value="{{$Testimonial->email}}">
                                </div>
                                <div class="form-group">
                                    <label>Testimonial Message</label>
                                    <input  name="message" class="form-control" type="text"  value="{{$Testimonial->message}}">
                                </div>
                                <div class="form-group">
                                    <label>Testimonial Rating</label>
                                    <input  name="rating" class="form-control" type="text"  value="{{$Testimonial->rating}}">
                                </div>
                                <div class="form-group">
                                    <label>Testimonial Image</label>
                                    <input class="form-control" name="image" type="file">
                                </div>
                                {{-- <div class="form-group">
                                    <label>Testimonial Image</label>
                                    <input class="form-control"  name= "image" type="file">
                                </div> --}}
                                <div class="mt-4">
                                    <button class="btn btn-primary" type="submit">Edit Testimonial</button>
                                    <a href="categories.html" class="btn btn-link">Cancel</a>
                                </div>
                            </form>

                        </div>
                    </div>
</div>


@endsection
