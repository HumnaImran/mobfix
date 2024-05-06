@extends('AdminPages.AdminMaster')
@section('content')
<div> <h1>All Repair request</h1>
                        <div class="card" >
                            <div class="card-body">

                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">


                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Customer Name</th>
                                            <th>Email</th>
                                            <th>Post Code</th>
                                            <th>Phone Number</th>
                                            <th>device Code</th>
                                            <th>Additional Information</th>

                                            <th>Requested At</th>
                                            <th>View Details</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($repairDetails as $repairDetail)
                                            <tr>
                                                <td> {{$repairDetail->id}} </td>

                                                <td>{{ $repairDetail->first_name }} {{ $repairDetail->last_name }}</td>

                                                <td>{{ $repairDetail->email }}</td>
                                                <td>{{ $repairDetail->post_code}}</td>
                                                <td>{{ $repairDetail->phone_no}}</td>
                                                <td>{{ $repairDetail->device_code}}</td>
                                                <td>{{ $repairDetail->info}}</td>
                                                <td>{{ $repairDetail->created_at}}</td>

                                                <td>
                                                    <a href="{{ route('ViewDetails', $repairDetail->id) }}" class="btn btn-primary btn-circle">
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
