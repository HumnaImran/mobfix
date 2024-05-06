

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
                        <th>Contact ID</th>
                        <th>Contact Name</th>
                        <th>Contact Email</th>
                        <th>Contact subject</th>
                        <th>Contact Message</th>


                    </tr>
                </thead>
                <tbody>
                    @foreach ($contacts as $contact)
                        <tr>
                            <td>{{ $contact->id }} </td>
                            <td>{{ $contact->name }} </td>
                            <td>{{ $contact->email }} </td>

                            <td>{{ $contact->subject }}</td>
                            <td>{{ $contact->message }}</td>




                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
