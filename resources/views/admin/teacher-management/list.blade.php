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
<h3>All Teachers</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Dashboard</li>
<li class="breadcrumb-item active">Teachers</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header align-items-center card-header d-flex justify-content-between">
                    <h5>Teachers</h5>
                    <a href="{{ route('teachers_add') }}" class="btn btn-primary">Add Teacher</a>
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
                                <th scope="col">Email</th>
                                <th scope="col">User Name</th>
                                <th scope="col">Designation</th>
                                <th scope="col">Contact</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($teachers as $key => $teacher)
                            <tr>
                                <td>{{ $key}}</td>
                                <td>

                                    <img src="{{ ( empty($teacher->getFirstMediaUrl('thumbnail')) )  ?  asset('user-image.webp') : $teacher->getMedia('thumbnail')->last()->getUrl()  }}" width="50" />

                                </td>
                                <td>{{ ($teacher->email != null) ? $teacher->email : '--' }}</td>
                                <td>{{ ($teacher->name != null) ? $teacher->name : '--' }}</td>
                                <td>{{ ($teacher->full_name != null) ? $teacher->full_name : '--' }}</td>
                                <td>{{ ($teacher->contact != null) ? $teacher->contact : '--' }}</td>

                                <td>
                                    <a class="btn btn-primary btn-sm" href="{{ route('teachers_edit', $teacher->id) }}" title=""><i class="fa fa-pencil"></i> Edit</a>

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