@extends('AdminPages.AdminMaster')
@section('content')
    <div>
        <h1>Stores' Feedbacks</h1>
        <div class="card">
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Feedbacker Name</th>
                                <th>Feedbacker Email</th>
                                <th>Feedbacker phone</th>
                                <th>Comment</th>
                                <th>Store Name</th>
                                <th>Rating</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($feedbacks as $feedback)
                                <tr>
                                    <td> {{ $feedback->id }} </td>

                                    <td>{{ $feedback->full_name }}</td>
                                    <td>{{ $feedback->email }}</td>
                                    <td>{{ $feedback->phone_number }}</td>
                                    <td>{{ $feedback->comment }}</td>

                                    <td>{{ $feedback->store->name }}</td>
                                    {{-- <td>
                                        @if (!empty($feedback->experience))
                                            @foreach ($feedback->experience as $exp)
                                                <div>
                                                    <strong>{{ $exp['question'] }}:</strong><br> --}}
                                                    {{-- @dd($exp); --}}
                                                    {{-- @dd($exp['rating']) --}}
                                                    {{-- @dd($exp['question'] ) --}}


                                                        {{-- // if (isset($exp['rating']) ) {
                                                            // Loop through each rating

                                                            // foreach ($exp['rating'] as $rating) {
                                                                // Display a star for each rating
                                                        //         for ($i = 1; $i <= $exp['rating']; $i++) {
                                                        //             echo '<i class="fas fa-star" style="color:rgba(255, 255, 0, 0.74)"></i>';
                                                        //         }
                                                        //     }
                                                        //  else {
                                                            // Display a default star (or no star) if rating is not an array or not set
                                    //                         echo '<i class="far fa-star" style="color:rgba(255, 255, 0, 0.74)"></i>';
                                    //                     }
                                    //                 @endphp
                                    //             </div>
                                    //         @endforeach
                                    //     @endif
                                    // </td>
                                    <td> --}}
                                       <td> @if (!empty($feedback->experience))
                                            @foreach ($feedback->experience as $exp)
                                                <div>
                                                    @if (is_array($exp) && isset($exp['question']))
                                                        <strong>{{ $exp['question'] }}:</strong><br>
                                                        @php
                                                            if (isset($exp['rating'])) {
                                                                for ($i = 1; $i <= $exp['rating']; $i++) {
                                                                    echo '<i class="fas fa-star" style="color:rgba(255, 255, 0, 0.74)"></i>';
                                                                }
                                                            } else {
                                                                echo '<i class="far fa-star" style="color:rgba(255, 255, 0, 0.74)"></i>';
                                                            }
                                                        @endphp
                                                    @endif
                                                </div>
                                            @endforeach
                                        @endif
                                    </td>


                                    <td>
                                        <form action="{{ route('DeleteFeedback', $feedback->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-circle">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
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
