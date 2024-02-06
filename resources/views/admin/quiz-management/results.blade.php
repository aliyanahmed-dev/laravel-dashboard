@extends('admin.layouts.simple.master')
@section('title', 'Quizzes Results')

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
<h3>All Quizzes Results</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Dashboard</li>
<li class="breadcrumb-item active">Quizzes Results</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header align-items-center card-header d-flex justify-content-between">
                    <h5>Quiz '{{$quiz->name}}'</h5>
                    {{-- <a href="{{ route('quiz.create') }}" class="btn btn-primary">Add Quiz</a> --}}
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
                                <th scope="col">Student Name</th>
                                <th scope="col">Student Email</th>
                                <th scope="col">Batch and Class</th>
                                <th scope="col">Total Marks</th>
                                <th scope="col">Taken Marks</th>
                                <th scope="col">Taken Date</th>
                                <th scope="col">Grade</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($attedded_quizzes as $key => $attedded_quiz)
                            <tr>
                                <td>{{$key}}</td>

                                <td>{{ $attedded_quiz->user->name }}</td>
                                <td>{{ $attedded_quiz->user->email }}</td>
                                <td>{{ $attedded_quiz->quiz->batch->name }}-({{ $attedded_quiz->quiz->batch->batch_id }}) <br>{{ $attedded_quiz->quiz->batch->course->name }}</td>
                                <td>{{ $attedded_quiz->total_marks }}</td>
                                <td>{{ $attedded_quiz->taken_marks }}</td>
                                <td>{{ $attedded_quiz->created_at }}</td>
                                <td>{{ $attedded_quiz->grade }}</td>
                                <td>
                                    <div class="btn-group">
                                        <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Actions </button>
                                        <ul class="dropdown-menu dropdown-block text-start">
                                            <li><a class="dropdown-item" href="{{ route('quiz.result_detail', $attedded_quiz->id) }}" title=""><i class="fa fa-pencil"></i> View Result</a></li>
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