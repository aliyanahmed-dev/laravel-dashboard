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
<li class="breadcrumb-item active">Course</li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row second-chart-list third-news-update">
        <div class="col-xl-12 xl-100 dashboard-sec box-col-12">
            <div class="card">
                <div class="card-header">
                    <h5>Edit Course</h5>
                </div>
                <form class="form theme-form bold-labels" action="{{ route('courses.update', $course->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
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
                                                <input class="form-control" type="text" required name="name" value="{{ $course->name }}" placeholder="Course Name" data-bs-original-title="" title="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label class=" col-form-label">Course Category </label>
                                            <div class="">

                                                <select name="category" id="" class="form-control">
                                                    <option value="" selected disabled>-- Select a Category --</option>
                                                    @foreach($categories as $category)
                                                    <option value="{{$category->id}}" {{ ($course->category->id == $category->id) ? 'selected' : '' }}>{{$category->name}}</option>
                                                    @endforeach


                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="mb-3">
                                            <label class=" col-form-label">Students </label>
                                            <div class="">
                                                <input class="form-control" type="number" required name="students" value="{{ $course->students }}" placeholder="Number of Students">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="mb-3">
                                            <label class=" col-form-label">Price </label>
                                            <div class="">
                                                <input class="form-control" type="text" required name="price" value="{{ $course->price }}" placeholder="Price">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-3">
                                        <div class="mb-3">
                                            <label class=" col-form-label">Duration </label>
                                            <div class="">
                                                <input class="form-control" type="text" required name="duration" value="{{ $course->duration }}" placeholder="Duration (eg.. 1 week, 6 months)">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-3">
                                        <div class="mb-3">
                                            <label class=" col-form-label">Level </label>
                                            <div class="">

                                                <select name="level" id="" class="form-control">
                                                    <option value="" selected disabled>-- Select a Level --</option>
                                                    <option value="beginner" {{ ($course->level == 'beginner') ? 'selected' : '' }}>Beginner</option>
                                                    <option value="intermediate" {{ ($course->level == 'intermediate') ? 'selected' : '' }}>Intermediate</option>
                                                    <option value="advanced" {{ ($course->level == 'advanced') ? 'selected' : '' }}>Advanced</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">

                                        <div class="mb-3 ">
                                            <label class=" col-form-label">Requirments</label>
                                            <div class="">
                                                <textarea class="form-control ws_text-editor" rows="5" required cols="5" name="requirments" placeholder="Course Requirments">{{ $course->requirements }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">

                                        <div class="mb-3 ">
                                            <label class=" col-form-label">Materials</label>
                                            <div class="">
                                                <textarea class="form-control ws_text-editor" rows="5" required cols="5" name="materials" placeholder="Course Materials">{{ $course->materials }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">

                                        <div class="mb-3 ">
                                            <label class=" col-form-label">Short Description</label>
                                            <div class="">
                                                <textarea class="form-control  ws_text-editor" rows="5" required cols="5" name="short_description" placeholder="Course Short Description">{{ $course->short_description }}</textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">

                                        <div class="mb-3 ">
                                            <label class=" col-form-label">Description</label>
                                            <div class="">
                                                <textarea class="form-control  ws_text-editor" rows="5" required cols="5" name="description" placeholder="Course Description">{{ $course->description }}</textarea>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-12">
                                        <h3>Video Type </h3>

                                        <div class="mb-3 ">
                                            <label class=" col-form-label">Video Iframe</label>
                                            <div class="input-group">
                                                <div class="input-group-text">
                                                    <input class="form-check-input mt-0" type="radio" value="iframe" name="video_type" {{ ($course->video_type == 'iframe' ? 'checked' : '' ) }}>
                                                </div>
                                                <input type="text" name="video_iframe" class="form-control" value="{{$course->video_iframe}}" placeholder="Video Iframe">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">

                                        <div class="mb-3 ">
                                            <label class=" col-form-label">Video File</label>
                                            <div class="input-group">
                                                <div class="input-group-text">
                                                    <input class="form-check-input mt-0" type="radio" value="file" name="video_type" {{ ($course->video_type == 'file' ? 'checked' : '' ) }}>
                                                </div>
                                                <input class="form-control" name="video_file" type="file" />

                                            </div>
                                            @if($course->video_type == 'file')
                                            @if(($course->hasMedia('video')))
                                            <div class="video-holder">
                                                <video width="320" height="240" controls>
                                                    <source src="{{ $course->getFirstMediaUrl('video') }}" type="video/mp4">
                                                </video>
                                            </div>
                                            @endif
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label class=" col-form-label">Image</label>
                                            <div class="">
                                                <label class="instruction_label">Student image (360 width)</label><br>
                                                <input onchange="thumb(this);" class="form-control" name="image" type="file" />
                                                @if((isset($course)) && ($course->hasMedia('thumbnail')))
                                                <img src="{{ $course->getMedia('thumbnail')->last()->getUrl() }}" width="200" class="thumbnail-img" />
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-3">
                                        <div class="mb-3 d-flex">
                                            <div class="">
                                                <input class="form-control--" id="featured-check" type="checkbox" name="featured" value="featured" {{($course->is_featured == 1) ? 'checked' : ''}}>
                                            </div>
                                            <label class=" col-form-label p-0 px-2" for="featured-check">Featured </label>
                                        </div>
                                    </div>

                                </div>






                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <div class="col-sm-9 offset-sm-3">
                            <button class="btn btn-primary" type="submit" data-bs-original-title="" title="">Update Course</button>
                            <a href="{{ route('courses.index') }}" class="btn btn-light">Cancel</a>
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
    function thumb(input) {
        if (input.files && input.files[0]) {

            var reader = new FileReader();

            reader.onload = function(e) {
                $('.thumbnail-img')
                    .attr('src', e.target.result);

            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection