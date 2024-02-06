@extends('layouts.main')
@section('content')

<style>
.profile-card-item,
.profile-author-main{
    position: relative;
}
.profile-post-mark {
    position: absolute;
    top: 17px;
    right: 17px;
    background-color: #fff;
    color: #000;
    padding: 2px 12px;
    border-radius: 50px;
}
.profile-author-img img {
    width: 100%;
}
.profile-author-img {
    position: absolute;
    top: 0;
    left: 0;
    width: 40%;
    border-radius: 50%;
    overflow: hidden;
}    
    
</style>

<main>


    <!--==============================
    Breadcumb
============================== -->
    <div class="breadcumb-wrapper " data-bg-src="assets/img/bg/breadcumb-bg.png" data-overlay="title" data-opacity="8">
        <div class="breadcumb-shape" data-bg-src="assets/img/bg/breadcumb_shape_1_1.png">
        </div>
        <div class="shape-mockup breadcumb-shape2 jump d-lg-block d-none" data-right="30px" data-bottom="30px">
            <img src="assets/img/bg/breadcumb_shape_1_2.png" alt="shape">
        </div>
        <div class="shape-mockup breadcumb-shape3 jump-reverse d-lg-block d-none" data-left="50px" data-bottom="80px">
            <img src="assets/img/bg/breadcumb_shape_1_3.png" alt="shape">
        </div>
        <div class="container">
            <div class="breadcumb-content text-center">
                <h1 class="breadcumb-title">Profile</h1>
                <ul class="breadcumb-menu">
                    <li><a href="{{route('home')}}">Home</a></li>
                    <li>Profile</li>
                </ul>
            </div>
        </div>
    </div>


    <div class="container py-5 basic-pkg user-profile-page">

        <div class="main-body">

            <div class="row gutters-sm">

                <div class="col-md-8">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <h4>
                                        Personal Information

                                    </h4>
                                </div>
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Full Name</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{$user->full_name}}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Guardian Name</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{$user->guardian_name}}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Guardian Contact</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{$user->guardian_number}}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">CNIC Number</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{$user->cnic_number}}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Address</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{$user->address}}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-12">
                                    <a class="th-btn " href="{{route('profile_update')}}">Edit</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="card-body">

                            <div class="row">
                                <div class="col-12">
                                    <h4>
                                        Enroll Class Details

                                    </h4>
                                </div>
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Class</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{$user->batch->course->name}}
                                </div>

                            </div>
                            <hr>
                            <div class="row">


                                <div class="col-sm-3">
                                    <h6 class="mb-0">Batch</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{$user->batch->name}}-({{$user->batch->batch_id}})
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-3">
                        <div class="card-body">

                            <div class="row">
                                <div class="col-12">
                                    <h4>
                                        Test

                                    </h4>
                                </div>
                                <div class="col-sm-4">
                                    <h6 class="mb-2">Test Name</h6>
                                </div>
                                <div class="col-sm-4">
                                    <h6 class="mb-2">Test Date Duration</h6>
                                </div>
                                <div class="col-sm-2  ">
                                    <h6 class="mb-2">Status</h6>
                                </div>
                                <div class="col-sm-2  text-end">
                                    <h6 class="mb-2">Action</h6>
                                </div>
                                <div class="col-12">

                                </div>
                                @php
                                $attedned_quiz_id = $user->attended_quizzes->pluck('quiz_id')->toArray();

                                @endphp
                                @foreach($user->batch->quizes as $quiz)
                                @php
                                $enddate = Carbon\Carbon::createFromFormat('Y-m-d', $quiz->enddate);
                                $currentDate = Carbon\Carbon::now();

                                @endphp
                                <div class="col-sm-4 text-secondary">
                                    {{$quiz->name}}
                                </div>
                                <div class="col-sm-4 text-secondary">
                                    {{$quiz->startdate}}---{{$quiz->enddate}}
                                </div>
                                <div class="col-sm-2 text-secondary">
                                    @if(in_array($quiz->id, $attedned_quiz_id))
                                    Attended
                                    @else
                                    @if($currentDate->gt($enddate))
                                    Date Passed
                                    @else
                                    Not Attended
                                    @endif
                                    @endif
                                </div>
                                <div class="col-sm-2 text-secondary  text-end">
                                    <div class="dropdown">
                                        <button class="btn-simple dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </button>
                                       
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                            @if(in_array($quiz->id, $attedned_quiz_id))
                                            @php
                                            $attended_quiz = $user->attended_quizzes->where('quiz_id', $quiz->id)->first();
                                            @endphp
                                            <li><a class="dropdown-item" href="{{route('quiz-test-result', $attended_quiz->id)}}">View Result</a></li>
                                            @else
                                            @if($currentDate->lt($enddate))
                                            <li><a class="dropdown-item" href="javascript:;" data-bs-toggle="modal" data-bs-target="#testdetailModal" data-name="{{$quiz->name}}" data-level="{{$quiz->difficulty}}" data-sdate="{{$quiz->startdate}}" data-edate="{{$quiz->enddate}}" data-status="Not-Attended">View Details</a></li>
                                            <li><a class="dropdown-item" href="javascript:void(0);" onclick="confirmRedirect('{{route("attend-test", $quiz->slug)}}')">Attend</a></li>
                                            @endif
                                            @endif
                                        </ul>
                                        
                                    </div>
                                </div>

                                @endforeach

                            </div>


                        </div>
                    </div>

                    @if($user->pay_status == 1)
                    <div class="card ">
                        <div class="card-body">

                            <div class="row">
                                <div class="col-12">
                                    <h4>
                                        Your Fees Details

                                    </h4>
                                </div>
                                <div class="col-sm-3">
                                    <h6 class="mb-2">Month</h6>
                                </div>
                                <div class="col-sm-3">
                                    <h6 class="mb-2">Amount</h6>
                                </div>
                                <div class="col-sm-3">
                                    <h6 class="mb-2">Pay Date</h6>
                                </div>
                                <div class="col-sm-3 ">
                                    <h6 class="mb-2">Status</h6>
                                </div>

                                @foreach($user->fees as $fees)
                                <div class="col-sm-3 text-secondary">
                                    {{$fees->month.'-'.$fees->year}}
                                </div>
                                <div class="col-sm-3 text-secondary">
                                    {{$fees->fees_amount}}
                                </div>
                                <div class="col-sm-3 text-secondary">
                                    {{($fees->pay_date) ?? '--'}}
                                </div>
                                <div class="col-sm-3 text-secondary">
                                    {{($fees->pay_status == 1) ? 'Paid' : 'Un-Paid'}}
                                </div>

                                @endforeach

                            </div>


                        </div>
                    </div>
                    @endif





                </div>
                <div class="col-md-4 mb-3">
                    <div class="card position-sticky top-0">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img src="{{  ( empty($user->getFirstMediaUrl('profile_image')) )  ?  asset('user-image.webp') :  $user->getFirstMediaUrl('profile_image')   }}" alt="Admin" class="rounded-circle" width="150">
                                <div class="mt-3">
                                    <h4>{{$user->name}}</h4>
                                    <p class="text-secondary mb-1">{{$user->email}}</p>
                                    <p class="text-muted font-size-sm">{{$user->contact}}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>




    </div>
    
    <!--Section-Profile-Tab-->
    
    <section class="profile-tab">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="profile-card-item">
                        <div class="profile-card-bg">
                            <img src="assets/img/profile-bg.jpg">
                            <div class="profile-post-mark">
                                Beginner
                            </div>
                        </div>
                        <div class="profile-author-main">
                            <div class="profile-author-img">
                                <img src="assets/img/user11.jpg">
                            </div>
                            <div class="profile-author-name">
                                <h4><a href="javascript:;">Rolands R</a></h4>
                                <span>Student</span>
                                <a href="javascript:;" class="th-btn">Go to Dashboard</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8"></div>
            </div>
        </div>
    </section>
    
</main>


<div class="modal fade" id="testdetailModal" tabindex="-1" aria-labelledby="testdetailModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="testdetailModalLabel">Test Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table">

                    <tbody>
                        <tr>
                            <td><b>Test Name</b></td>
                            <td><span class="modal--test-name">aa</span></td>
                        </tr>
                        <tr>
                            <td><b>Test Level</b></td>
                            <td><span class="modal--test-level">aa</span></td>
                        </tr>
                        <tr>
                            <td><b>Start Date</b></td>
                            <td><span class="modal--test-sdate">aa</span></td>
                        </tr>
                        <tr>
                            <td><b>End Date</b></td>
                            <td><span class="modal--test-edate">aa</span></td>
                        </tr>

                        <tr>
                            <td><b>Result</b></td>
                            <td><span class="modal--test-status">aa</span></td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


@endsection

@section('css')

@endsection

@section('script')
<script>
    var exampleModal = document.getElementById('testdetailModal')
    exampleModal.addEventListener('show.bs.modal', function(event) {
        // Button that triggered the modal
        var button = event.relatedTarget
        // Extract info from data-bs-* attributes
        var name = button.getAttribute('data-name')
        var level = button.getAttribute('data-level')
        var sdate = button.getAttribute('data-sdate')
        var edate = button.getAttribute('data-edate')
        var status = button.getAttribute('data-status')

        var modalname = exampleModal.querySelector('.modal--test-name')
        var modallevel = exampleModal.querySelector('.modal--test-level')
        var modalsdate = exampleModal.querySelector('.modal--test-sdate')
        var modaledate = exampleModal.querySelector('.modal--test-edate')
        var modalstatus = exampleModal.querySelector('.modal--test-status')

        modalname.textContent = name
        modallevel.textContent = level
        modalsdate.textContent = sdate
        modaledate.textContent = edate
        modalstatus.textContent = status

    })

    function confirmRedirect(redirectUrl) {
        var userResponse = confirm("Once you have Entered the Test you cannot exit it else it will be auto submited?");
        if (userResponse) {
            window.location.href = redirectUrl;
        }
    }
</script>
@endsection