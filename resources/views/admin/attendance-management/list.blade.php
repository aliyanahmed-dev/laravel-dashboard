@extends('admin.layouts.simple.master')
@section('title', 'Attendance')

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
<h3>All Students Attendance</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Dashboard</li>
<li class="breadcrumb-item active">Attendance</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            @if(isset($attendance))
            <div class="card">
                <div class="card-header py-3">
                    <h5>Search Date</h5>
                </div>
                <form class="form theme-form bold-labels" action="" method="GET" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body py-3">

                        <div class="row">
                            <div class="col">
                                <div class="row align-items-end">


                                    <div class="col-lg-2 col-md-4">
                                        <div class="">
                                            <label class=" col-form-label">Date</label>
                                            <div class="">
                                                <input class="form-control" type="date" name="date" value="{{isset($search['date']) ? $search['date'] : '' }}" placeholder="Date" data-bs-original-title="" title="">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-6">
                                        <button class="btn btn-primary" type="submit" data-bs-original-title="" title="">Search</button>
                                    </div>
                                </div>






                            </div>
                        </div>
                    </div>
                </form>
            </div> @endif
            <div class="card">
                <div class="card-header align-items-center card-header d-flex justify-content-between">
                    <h5>Attendance</h5>
                    <div class="d-flex align-items-center">
                        <div class="todayattendace_stats d-flex align-items-center">
                            <div class="attendace_stats_item mx-3">
                                <h6 class="m-0">Date <b>{{$date}}</b></h6>
                            </div>
                            <div class="attendace_stats_item mx-3">
                                <h6 class="m-0">Total Presents <b>{{$attendance->where('status', 1)->count()}}</b></h6>
                            </div>
                            <div class="attendace_stats_item mx-3">
                                <h6 class="m-0">Total Absents <b>{{$attendance->where('status', 0)->count()}}</b></h6>
                            </div>
                            <div class="attendace_stats_item mx-3">
                                <h6 class="m-0">Total Leave <b>{{$attendance->where('status', 2)->count()}}</b></h6>
                            </div>

                        </div>
                        <a href="{{ route('attendance.create') }}" class="btn btn-primary">Mark Attendance</a>
                    </div>
                </div>
                @if(Session::has('message'))
                <div class="alert alert-success dark alert-dismissible fade show" role="alert">
                    <strong>Updates ! </strong> {{ Session::get('message') }}.
                    <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close" data-bs-original-title="" title=""></button>
                </div>
                @endif
                <div class="table-responsive">
                    @if(isset($attendance))
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Student</th>
                                <th scope="col">Email</th>
                                <th scope="col">Status</th>
                                <th scope="col">Date</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($attendance as $key => $item)
                            <tr>
                                <td>{{ $key}}</td>
                                <td>{{ ($item->student->full_name) ?? $item->student->name }} ({{$item->student->id}})</td>
                                <td>{{ ($item->student->email) ?? '--' }}</td>
                                <td>
                                    @if($item->status ==1)
                                    Present {{($item->is_late == 1) ? '(Late)' : ''}}
                                    @elseif($item->status == 2)
                                    Leave
                                    @else
                                    Absent
                                    @endif
                                </td>
                                <td>{{ ($item->date) ?? '--' }}</td>

                                <td>
                                    <div class="btn-group">
                                        <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Actions </button>
                                        <ul class="dropdown-menu dropdown-block text-start">
                                            <li><a class="dropdown-item" href="{{ route('attendance.status', $item->id) }}" title=""><i class="fa fa-pencil"></i> {{ ($item->status == 1) ? 'Absent' : 'Present' }}</a></li>
                                            <li><a class="dropdown-item" href="{{ route('attendance.leave', $item->id) }}" title=""><i class="fa fa-pencil"></i> {{ ($item->status == 2) ? 'Remove Leave' : 'Mark Leave' }}</a></li>
                                        </ul>
                                    </div>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @endif
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