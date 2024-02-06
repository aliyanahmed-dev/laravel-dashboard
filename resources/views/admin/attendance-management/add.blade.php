@extends('admin.layouts.simple.master')

@section('title', 'Default')

@section('css')

@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3>Service</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Dashboard</li>
<li class="breadcrumb-item active">Attendance</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row second-chart-list third-news-update">
        <div class="col-xl-12 xl-100 dashboard-sec box-col-12">
            <div class="card">
                <div class="card-header">
                    <h5>Add Attendance</h5>
                </div>
                <form class="form theme-form bold-labels" action="{{ route('attendance.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="attendance_status" value="1">
                    <div class="card-body">
                        @if($errors->any())

                        <div class="alert alert-danger dark alert-dismissible fade show" role="alert">
                            {!! implode('', $errors->all('<div>:message</div>')) !!}
                            <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close" data-bs-original-title="" title=""></button>
                        </div>
                        @endif
                        @if(Session::has('message'))
                        <div class="alert alert-success dark alert-dismissible fade show" role="alert">
                            <strong>Updates ! </strong> {{ Session::get('message') }}.
                            <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close" data-bs-original-title="" title=""></button>
                        </div>
                        @endif


                        <div class="row">
                            <div class="col">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label class=" col-form-label">Select Date </label>
                                            <div class="">
                                                <input class="form-control" type="date" required name="date" value="" placeholder="" data-bs-original-title="" title="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label class=" col-form-label">Batch </label>
                                            <div class="">

                                                <select name="batch" id="student-batch" class="form-control">
                                                    <option value="" selected disabled>-- Select a Batch --</option>
                                                    @foreach($batches as $batch)
                                                    <option value="{{$batch->id}}" {{ (old('batch') == $batch->id) ? 'selected' : '' }}>{{$batch->name}} - {{$batch->batch_id}}</option>
                                                    @endforeach


                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <!--   <div class="col-4">
                                       
                                      <div class="mb-3">
                                            <label class=" col-form-label">Attendance Status </label>
                                            <div class="">

                                                <select name="attendance_status" id="" class="form-control" required>
                                                    <option value="" selected disabled>-- Select a Status --</option>
                                                    <option value="1" {{ (old('attendance_status') == '1') ? 'selected' : '' }}>Mark Present</option>
                                                    <option value="0" {{ (old('attendance_status') == '0') ? 'selected' : '' }}>Mark Absent</option>



                                                </select>
                                            </div>
                                        </div> 
                                    </div>-->
                                    <div class="col-12">
                                        <div class="student-checkboxes-main">
                                            <div class="student-checkboxes-title d-flex justify-content-between ">
                                                <h3>Students List</h3>
                                                <div class="student-checkboxes-item">
                                                    <div class="form-check">
                                                        <input class="form-check-input" id="checkall-checkbox" type="checkbox" value="">
                                                        <label class="form-check-label" for="checkall-checkbox">Check All</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="student-checkboxes-inner">


                                            </div>
                                        </div>
                                    </div>
                                </div>





                            </div>





                        </div>
                    </div>
            </div>
            <div class="card-footer text-end">
                <div class="col-sm-9 offset-sm-3">
                    <button class="btn btn-primary" type="submit" data-bs-original-title="" title="">Add Attendance</button>
                    <a href="{{ route('attendance.index') }}" class="btn btn-light">Cancel</a>
                </div>
            </div>
            </form>
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
    $(document).on('change', '#student-batch', function() {
        var batch = $('#student-batch').val();
        var csrfToken = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            type: 'POST',
            url: '{{ route("attendance.search_student") }}',
            data: {
                batch: batch,
            },
            headers: {
                'X-CSRF-TOKEN': csrfToken // Include the CSRF token in the headers
            },
            success: function(response) {
                // alert(121);
                $('.student-checkboxes-inner').html(response.html);
                console.log(response.html);
            },
            error: function(xhr, status, error) {
                // Handle errors, if any
                console.log(error);
            }
        });

    });

    $("#checkall-checkbox").click(function() {
        $('.student-checkboxes-item input:checkbox').not(this).prop('checked', this.checked);
    });
</script>
@endsection