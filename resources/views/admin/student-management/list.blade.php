@extends('admin.layouts.simple.master')
@section('title', 'Students')

@section('css')
@endsection

@section('style')
<style>
    div .action {
        display: flex;
    }

    div .action i {
        font-size: 16px;
    }

    div .action .pdf i {
        font-size: 20px;
        color: #FC4438;
    }

    div .action .edit {
        margin-right: 5px;
    }

    div .action .edit i {
        color: #54BA4A;
    }

    [dir=rtl] div .action .edit {
        margin-left: 5px;
    }

    div .action .delete i {
        color: #FC4438;
    }
</style>
@endsection

@section('breadcrumb-title')
<h3>All Students</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Dashboard</li>
<li class="breadcrumb-item active">Students</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header align-items-center card-header d-flex justify-content-between">
                    <h5>Students</h5>
                    <a href="{{ route('students_add') }}" class="btn btn-primary">Add Student</a>
                </div>
                @if(Session::has('message'))
                <div class="alert alert-success dark alert-dismissible fade show" role="alert">
                    <strong>Updates ! </strong> {{ Session::get('message') }}.
                    <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close" data-bs-original-title="" title=""></button>
                </div>
                @endif
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Image</th>
                                <th scope="col">User Name/ID</th>
                                <th scope="col">Batch</th>
                                <th scope="col">Contact</th>
                                <th scope="col">Email</th>
                                <th scope="col">Father/Guardian Name</th>
                                <th scope="col">Pay Status/Fees</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($students as $key => $student)
                            <tr>
                                <td>{{ $key}}</td>
                                <td>

                                    <img src="{{ ( empty($student->getFirstMediaUrl('profile_image')) )  ?  asset('user-image.webp') : $student->getMedia('profile_image')->last()->getUrl()  }}" width="50" />

                                </td>
                                <td>{{ ($student->name != null) ? $student->name : '--' }} ({{$student->id}})</td>
                                <td>{{ ($student->batch_id != null) ? $student->batch->name.'-'.$student->batch->batch_id : '--' }}</td>
                                <td>{{ ($student->contact != null) ? $student->contact : '--' }}</td>
                                <td>{{ ($student->email != null) ? $student->email : '--' }}</td>
                                <td>{{ ($student->guardian_name != null) ? $student->guardian_name : '--' }}</td>

                                <td>{{ ($student->pay_status == 1) ? 'Paid ('.$student->fees_amount.')' : 'Un-Paid' }}</td>
                                <td>{{ ($student->status == 1) ? 'Active' : 'In Active' }}</td>
                                <td>

                                    <div class="btn-group">
                                        <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Actions </button>
                                        <ul class="dropdown-menu dropdown-block text-start">
                                            <li><a class="dropdown-item" href="{{ route('students_edit', $student->id) }}"><i class="fa fa-pencil"></i> Edit</a></li>
                                            <li><a class="dropdown-item" href="{{ route('students_status', $student->id) }}" title=""><i class="fa fa-pencil"></i> {{ ($student->status == 1) ? 'In Active' : 'Active' }}</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
@endsection