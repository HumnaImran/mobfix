@extends('AdminPages.AdminMaster')
@section('content')
<div> <h1>All Testimonials</h1>
                        <div class="card" >
                            <div class="card-body">

                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">


                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Testimonial Name</th>
                                            <th>Testimonial Email</th>
                                            <th>Testimonial Message</th>
                                            <th>Testimonial Image</th>
                                                <th>Rating</th>
                                                <th>Action</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($AllTestimonials as $AllTestimonial)
                                            <tr>
                                                <td> {{$AllTestimonial->id}} </td>

                                                <td>{{ $AllTestimonial->name }}</td>
                                                <td>{{ $AllTestimonial->email }}</td>
                                                <td>{{ $AllTestimonial->message}}</td>
                                                <td>
                                                    @if($AllTestimonial->image)
                                                        <img src="{{ asset('storage/' . $AllTestimonial->image) }}" alt="Testimonial Image" style="max-width: 100px; max-height: 100px;">
                                                    @else
                                                        No Image Available
                                                    @endif
                                                </td>
                                                <td>
                                                    @for($i = 0; $i < $AllTestimonial->rating; $i++)
                                                        <i class="fas fa-star" style="color:rgba(211, 211, 40, 0.856) !important"></i>
                                                    @endfor
                                                </td>

                                                <td>
                                                    <a href="{{ route('EditTestimonial', $AllTestimonial->id) }}" class="btn btn-primary btn-circle">
                                                        <i class="fas fa-cog"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
    </div>


@endsection
