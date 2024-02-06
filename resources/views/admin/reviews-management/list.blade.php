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
<li class="breadcrumb-item active">Reviews Management</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">



            <div class="card">
                <div class="card-header align-items-center card-header d-flex justify-content-between">
                    <h5>Reviews</h5>
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
                                <th scope="col">Course</th>
                                <th scope="col">User Email</th>
                                <th scope="col">Name</th>
                                <th scope="col">Comment</th>
                                <th scope="col">Rating</th>
                                <th scope="col">Status</th>
                                <th scope="col">Date</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($reviews as $key => $review)
                            <tr>
                                <td>{{ $key}}</td>
                                <td>{{ ($review->course->name) ?? '--' }}</td>
                                <td>{{ ($review->user->email) ?? '--' }}</td>
                                <td>{{ ($review->name) ?? '--' }}</td>
                                <td>{{ ($review->comment) ?? '--' }}</td>
                                <td>{{ ($review->rating) ?? '--' }}</td>
                                <td>{{ ($review->status == 0) ? 'Un Approved' : 'Approved' }}</td>

                                <td>{{ $review->created_at->format('Y-m-d H:i:s')}}</td>
                                <td>
                                    <div class="btn-group">
                                        <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Actions </button>
                                        <ul class="dropdown-menu dropdown-block text-start">
                                            <li><a class="dropdown-item" href="{{ route('reviews.suspend', $review->id) }}" title=""><i class="fa fa-pencil"></i> {{ ($review->status == 1) ? 'Un Approved' : 'Approved' }}</a></li>
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