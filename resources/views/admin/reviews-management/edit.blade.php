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
<li class="breadcrumb-item active">Student</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row second-chart-list third-news-update">
        <div class="col-xl-12 xl-100 dashboard-sec box-col-12">
            <div class="card">
                <div class="card-header">
                    <h5>Edit Student</h5>
                </div>
                <form class="form theme-form bold-labels" action="{{ route('students_update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" value="{{ $student->id }}" name="id">
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
                                            <label class=" col-form-label">Name </label>
                                            <div class="">
                                                <input class="form-control" type="text" required name="name" value="{{ $student->name }}" placeholder="Student Name" data-bs-original-title="" title="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label class=" col-form-label">Email</label>
                                            <div class="">
                                                <input class="form-control" type="email" required name="email" value="{{ $student->email }}" placeholder="Student Email" data-bs-original-title="" title="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label class=" col-form-label">Password</label>
                                            <div class="">
                                                <input class="form-control" type="text" name="password" value="" placeholder="Student Password" data-bs-original-title="" title="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label class=" col-form-label">Contact</label>
                                            <div class="">
                                                <input class="form-control" type="tel" required name="phone" value="{{ $student->contact }}" placeholder="Student Contact Number" data-bs-original-title="" title="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label class=" col-form-label">Batch </label>
                                            <div class="">

                                                <select name="batch" id="" class="form-control">
                                                    <option value="" selected disabled>-- Select a Batch --</option>
                                                    @foreach($batches as $batch)
                                                    <option value="{{$batch->id}}" {{ ($student->batch_id == $batch->id) ? 'selected' : '' }}>{{$batch->name}} - {{$batch->batch_id}}</option>
                                                    @endforeach


                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label class=" col-form-label">Pay Status </label>
                                            <div class="">

                                                <select name="pay_status" id="" class="form-control">
                                                    <option value="" selected disabled>-- Select a Status --</option>
                                                    <option value="paid" {{ ($student->pay_status == '1') ? 'selected' : '' }}>Paid</option>
                                                    <option value="unpaid" {{ ($student->pay_status == '0') ? 'selected' : '' }}>Un-Paid</option>



                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label class=" col-form-label">Fees Amount (Leave it Empty If Pay Status is Un-Paid)</label>
                                            <div class="">
                                                <input class="form-control" type="number" name="fees_amount" value="{{$student->fees_amount}}" placeholder="Student Fees Amount" data-bs-original-title="" title="">
                                            </div>
                                        </div>
                                    </div>
                                </div>



                                {{--
                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label">Image</label>
                                    <div class="col-sm-9">
                                        <label class="instruction_label">Student image (360 width)</label><br>
                                        <input class="form-control" name="icon" type="file" />
                                        @if((isset($service)) && ($service->hasMedia('icons')))
                                        <img src="{{ $service->getFirstMediaUrl('icons') }}" width="200" />
                                @endif
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Description (en)</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" rows="5" required cols="5" name="description[en]" placeholder="Description">{{ (isset($service)) && ($service->getTranslations('description')['en']) ? $service->getTranslations('description')['en'] : ''}}</textarea>
                            </div>
                        </div> --}}



                    </div>
            </div>
        </div>
        <div class="card-footer text-end">
            <div class="col-sm-9 offset-sm-3">
                <button class="btn btn-primary" type="submit" data-bs-original-title="" title="">Update Student</button>
                <a href="{{ route('students_list') }}" class="btn btn-light">Cancel</a>
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

@endsection