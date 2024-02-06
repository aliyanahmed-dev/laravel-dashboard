@extends('admin.layouts.simple.master')

@section('title', 'Default')

@section('css')

@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3>Result Detail</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Dashboard</li>
<li class="breadcrumb-item active">Result Detail</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row second-chart-list third-news-update">
        <div class="col-xl-12 xl-100 dashboard-sec box-col-12">

            <div class="card p-25">
                <div class="mb-3">
                    <h4>User Details</h4>
                </div>
                <div class="">
                    <div class="card-block row">
                        <div class="col-sm-12 col-lg-12 col-xl-12">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <td class="w-25"><b>User Name</b></td>
                                            <td class="w-25">
                                                {{$attedded_quizz->user->name}}
                                            </td>
                                            <td class="w-25"><b>User Email</b></td>
                                            <td class="w-25">
                                                {{$attedded_quizz->user->email}}
                                            </td>

                                        </tr>

                                        <tr>
                                            <td class="w-25"><b>Guardian Name</b></td>
                                            <td class="w-25">
                                                {{$attedded_quizz->user->guardian_name}}
                                            </td>
                                            <td class="w-25"><b>Guardian Contact</b></td>
                                            <td class="w-25">
                                                {{$attedded_quizz->user->guardian_number}}
                                            </td>

                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card p-25">
                <div class="card-">
                    <h4>Quiz Details</h4>
                </div>
                <div class="mb-3">
                    <div class="card-block row">
                        <div class="col-sm-12 col-lg-12 col-xl-12">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <td class="w-25"><b>Quiz Name</b></td>
                                            <td class="w-25">
                                                {{$attedded_quizz->quiz->name}}
                                            </td>
                                            <td class="w-25"><b>Taken Date</b></td>
                                            <td class="w-25">
                                                {{$attedded_quizz->created_at}}
                                            </td>

                                        </tr>

                                        <tr>
                                            <td class="w-25"><b>Batch</b></td>
                                            <td class="w-25">
                                                {{ $attedded_quizz->quiz->batch->name }}-({{ $attedded_quizz->quiz->batch->batch_id }})
                                            </td>
                                            <td class="w-25"><b>Course</b></td>
                                            <td class="w-25">
                                                {{$attedded_quizz->quiz->batch->course->name}}
                                            </td>

                                        </tr>

                                        <tr>
                                            <td class="w-25"><b>Total Marks</b></td>
                                            <td class="w-25">
                                                {{$attedded_quizz->total_marks}}
                                            </td>
                                            <td class="w-25"> <b>Taken Marks</b></td>
                                            <td class="w-25">
                                                {{$attedded_quizz->taken_marks}}
                                            </td>

                                        </tr>
                                        @php
                                        $percentage = ($attedded_quizz->taken_marks / $attedded_quizz->total_marks) * 100;
                                        @endphp
                                        <tr>
                                            <td class="w-25"><b>Percentage</b></td>
                                            <td class="w-25">
                                                {{$percentage}}%
                                            </td>
                                            <td class="w-25"><b>Grade</b></td>
                                            <td class="w-25">
                                                {{$attedded_quizz->grade}}
                                            </td>

                                        </tr>

                                        <tr>
                                            <td class="w-25"><b>Total Questions</b></td>
                                            <td class="w-25">
                                                {{$attedded_quizz->quiz->questions->count()}}
                                            </td>
                                            <td class="w-25"><b>Correct Answers</b></td>
                                            <td class="w-25">
                                                {{$attedded_quizz->answers->where('status', 1)->count()}}
                                            </td>

                                        </tr>

                                        <tr>
                                            <td>
                                                <b>Question</b>
                                            </td>
                                            <td><b>Correct Answer/s</b></td>
                                            <td><b>Given Answer</b></td>
                                            <td><b>Is Correct</b></td>
                                        </tr>
                                        @php
                                        $correct_answers = $attedded_quizz->answers->where('status', 1)->pluck('question_id')->toArray();

                                        @endphp
                                        @foreach($attedded_quizz->quiz->questions as $question)
                                        @php
                                        $correctoptions = $question->quizoptions->where('is_correct', 1);

                                        $given_answer = $attedded_quizz->answers->where('question_id', $question->id)->first();
                                        @endphp
                                        <tr>
                                            <td>{{$question->question}}</td>
                                            <td>
                                                @foreach($correctoptions as $key => $option)
                                                {{$option->option}}{{ $loop->last ? '' : ',' }}
                                                @endforeach
                                            </td>
                                            <td>
                                                @if($given_answer->answer_type == 'one')
                                                @php
                                                $given_option = $question->quizoptions->where('id', $given_answer->answer)->first();
                                                @endphp
                                                {{$given_option->option}}
                                                @else
                                                @php
                                                $correct_option_ids = explode(',',$given_answer->answer);
                                                $correct_options = $question->quizoptions->whereIn('id', $correct_option_ids)
                                                @endphp
                                                @foreach($correct_options as $key => $option)
                                                {{$option->option}}{{ $loop->last ? '' : ',' }}
                                                @endforeach
                                                @endif
                                            </td>
                                            <td>
                                                {{ (in_array($question->id, $correct_answers)) ? 'Correct' : 'Wrong'}}
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

        </div>

    </div>
</div>
<script type="text/javascript">
    var session_layout = "{{ session()->get('layout ') }}";
</script>
@endsection

@section('script')
<script>




</script>
@endsection