@extends('AdminPages.AdminMaster')
@section('content')



<div> <h1>All Repair</h1>
    <div class="card" >
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">


                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Category Name</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($Allcategorys as $Allcategory)
                        <tr>
                            <td> {{$Allcategory->id}} </td>

                            <td>{{ $Allcategory->name }}</td>

                            <td>
                                <a href="{{ route('EditCategory', $Allcategory->id) }}" class="btn btn-primary btn-circle">
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
