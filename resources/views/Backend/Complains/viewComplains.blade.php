

@extends('AdminPages.AdminMaster')
@section('content')
       @if(session('success'))
        <div class="alert alert-success mt-4">
            {{ session('success') }}
        </div>
    @endif
<div  >
<div class="card">
    <div class="card-body">

        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Complain ID</th>
                        <th>Complainer Name</th>
                        <th>Complainer Email</th>
                        <th>Complainer Phone</th>
                        <th>Subject</th>
                        <th>Complain Details</th>
                        <th>Complain of Store </th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($complains as $complain)
                        <tr>
                            <td>{{ $complain->id }} </td>
                            <td>{{ $complain->full_name }} </td>
                            <td>{{ $complain->email }} </td>
                            <td>{{ $complain->phone_number }} </td>
                            <td>{{ $complain->subject }}</td>
                            <td>{{ $complain->complaint_details }}</td>
                            <td>{{ $complain->store->name }}</td>



                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
