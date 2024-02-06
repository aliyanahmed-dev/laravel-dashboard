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
<h3>All Students Fees</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Dashboard</li>
<li class="breadcrumb-item active">Fees Management</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header py-3">
                    <h5>Search Student</h5>
                </div>
                <form class="form theme-form bold-labels" action="" method="GET" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body py-3">

                        <div class="row">
                            <div class="col">
                                <div class="row align-items-end">
                                    <div class="col-4">
                                        <div class="">
                                            <label class=" col-form-label">Name </label>
                                            <div class="">
                                                <select name="student" id="" class="form-control student-select">
                                                    <option value="" selected disabled> -- Select a Student -- </option>
                                                    @foreach($students as $student)
                                                    <option value="{{$student->id}}" {{(isset($search['student']) &&  $search['student'] == $student->id) ? 'selected' : '' }}>{{$student->name}}-{{$student->id}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-3">
                                        <div class="">
                                            <label class=" col-form-label">Month </label>
                                            <div class="">

                                                <select name="month" id="" class="form-control">
                                                    <option value="" selected disabled>-- Select a Status --</option>
                                                    @foreach (range(1, 12) as $monthNumber)
                                                    @php
                                                    $monthName = date('F', mktime(0, 0, 0, $monthNumber, 1));
                                                    @endphp
                                                    <option value="{{ $monthName }}" {{ (isset($search['month']) && $search['month'] == $monthName) ? 'selected' : '' }}>
                                                        {{ $monthName }}
                                                    </option>
                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-1">
                                        <button class="btn btn-primary" type="submit" data-bs-original-title="" title="">Search</button>
                                    </div>
                                </div>






                            </div>
                        </div>
                    </div>
                </form>
            </div>


            <div class="card">
                <div class="card-header align-items-center card-header d-flex justify-content-between">
                    <h5>Fees</h5>
                    {{-- <a href="{{ route('fees.add') }}" class="btn btn-primary">Add Fees</a> --}}
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
                                <th scope="col">Student</th>
                                <th scope="col">Email</th>
                                <th scope="col">Batch</th>
                                <th scope="col">Fees Month-Year</th>
                                <th scope="col">Fees Amount</th>
                                <th scope="col">Pay Status</th>
                                <th scope="col">Pay Date</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($fees as $key => $fee)
                            <tr>
                                <td>{{ $key}}</td>
                                <td>{{ ($fee->student->full_name) ?? $fee->student->name }}</td>
                                <td>{{ ($fee->student->email) ?? '--' }}</td>
                                <td>{{ ($fee->student->batch_id != null) ? $fee->student->batch->name.'-'.$fee->student->batch->batch_id : '--' }}</td>
                                <td>{{ $fee->month.'-'.$fee->year }}</td>
                                <td>{{ ($fee->fees_amount) ?? '--' }}</td>
                                <td>{{ ($fee->pay_status == 0) ? 'Un-Paid' : 'Paid' }}</td>

                                <td>{{ ($fee->pay_date) ?? '--' }}</td>
                                <td>
                                    <div class="btn-group">
                                        <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Actions </button>
                                        <ul class="dropdown-menu dropdown-block text-start">
                                            <li><a class="dropdown-item" href="{{ route('fees.status', $fee->id) }}" title=""><i class="fa fa-pencil"></i> {{ ($fee->pay_status == 1) ? 'Un Paid' : 'Paid' }}</a></li>
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
<script>
    $(document).ready(function() {
        $('.student-select').select2();
    });
</script>
@endsection