@extends('admin.layouts.simple.master')

@section('title', 'Default')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/vendors/animate.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/vendors/chartist.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/vendors/date-picker.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/custom_style.css')}}">
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3>Default</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Dashboard</li>
<li class="breadcrumb-item active">Home</li>
@endsection

@section('content')
<div class="container-fluid">
	<div class="row second-chart-list third-news-update">
		<div class="col-xl-8 xl-100 dashboard-sec box-col-12">
			<div class="card earning-card">
				<div class="card-body p-0">
					<div class="row m-0">
						<div class="col-xl-12">
                            <!-- form -->
                            <form action="{{ route('submitHome') }}" method="post" class="container py-4 bold-labels" enctype="multipart/form-data">
                            @csrf
                            <h2>Slider</h2>
                            <div id="sliderContainer" data-count="{{ count($meta['slider'] ?? ARRAY() ) }}">
                            	@if(isset($meta['slider']))
	                                @foreach ($meta['slider'] as $key => $value)
	                                    <div class="repeater-item border p-4 rounded-3">
	                                        <h4>Slider Item</h4>
                                            <input type="hidden" name="slider[{{$key}}][index]" class="form-control" value="{{ $key }}">
	                                        <div class="form-group mb-3">
	                                            <label>Title (en):</label>
	                                            <input type="text" name="slider[{{$key}}][title][en]" class="form-control" value="{{ $meta['slider'][$key]['title']['en'] }}">
	                                        </div>
                                            <div class="form-group mb-3">
	                                            <label>Title (en):</label>
	                                            <input type="text" name="slider[{{$key}}][title][ar]" class="form-control" value="{{ $meta['slider'][$key]['title']['ar'] }}">
	                                        </div>
	                                        <div class="form-group mb-3">
	                                            <label>Content (en):</label>
	                                            <input type="text" name="slider[{{$key}}][content][en]" class="form-control" value="{{ $meta['slider'][$key]['content']['en'] }}">
	                                        </div>
                                            <div class="form-group mb-3">
	                                            <label>Content (ar):</label>
	                                            <input type="text" name="slider[{{$key}}][content][ar]" class="form-control" value="{{ $meta['slider'][$key]['content']['ar'] }}">
	                                        </div>
	                                        <div class="form-group mb-3">
	                                            <label>Button Text (en):</label>
	                                            <input type="text" name="slider[{{$key}}][btn_text][en]" class="form-control" value="{{ $meta['slider'][$key]['btn_text']['en'] }}">
	                                        </div>
                                            <div class="form-group mb-3">
	                                            <label>Button Text (ar):</label>
	                                            <input type="text" name="slider[{{$key}}][btn_text][ar]" class="form-control" value="{{ $meta['slider'][$key]['btn_text']['ar'] }}">
	                                        </div>
	                                        <div class="form-group mb-3">
	                                            <label>Button Link:</label>
	                                            <input type="text" name="slider[{{$key}}][btn_link]" class="form-control" value="{{ $meta['slider'][$key]['btn_link'] }}">
	                                        </div>
	                                        <div class="form-group mb-3">
	                                            <label>Background Image:</label><br>
                                                <label class="instruction_label">Slider background image</label><br>
	                                            <input type="file" name="slider[{{$key}}][bg_img]" class="form-control-file" >
	                                            @if(isset($meta['uploadedImages']['slider'][$key]['bg_img']['original_url']))
	                                            	<img src="{{ $meta['uploadedImages']['slider'][$key]['bg_img']['original_url'] ?? '' }}" height="50" width="50">
	                                            @endif
	                                        </div>
	                                        <div class="form-group mb-3">
	                                            <label>Slider Image:</label><br>
                                                <label class="instruction_label">Slider image (535*802)</label><br>
	                                            <input type="file" name="slider[{{$key}}][sl_img]" class="form-control-file" >
	                                            @if(isset($meta['uploadedImages']['slider'][$key]['sl_img']['original_url']))
	                                            	<img src="{{ $meta['uploadedImages']['slider'][$key]['sl_img']['original_url'] ?? '' }}" height="50" width="50">
	                                            @endif
	                                        </div>
                                            <button class="btn btn-danger remove-slider" type="button">Remove Slider Item</button>
	                                    </div>
	                                @endforeach
                                @else
                                	<div class="repeater-item border p-4 rounded-3">
                                        <h4>Slider Item</h4>
                                        <input type="text" name="slider[0][index]" class="form-control" value="0">
                                        <div class="form-group mb-3">
	                                            <label>Title (en):</label>
	                                            <input type="text" name="slider[0][title][en]" class="form-control">
	                                        </div>
                                            <div class="form-group mb-3">
	                                            <label>Title (en):</label>
	                                            <input type="text" name="slider[0][title][ar]" class="form-control">
	                                        </div>
	                                        <div class="form-group mb-3">
	                                            <label>Content (en):</label>
	                                            <input type="text" name="slider[0][content][en]" class="form-control">
	                                        </div>
                                            <div class="form-group mb-3">
	                                            <label>Content (ar):</label>
	                                            <input type="text" name="slider[0][content][ar]" class="form-control">
	                                        </div>
	                                        <div class="form-group mb-3">
	                                            <label>Button Text (en):</label>
	                                            <input type="text" name="slider[0][btn_text][en]" class="form-control">
	                                        </div>
                                            <div class="form-group mb-3">
	                                            <label>Button Text (ar):</label>
	                                            <input type="text" name="slider[0][btn_text][ar]" class="form-control">
	                                        </div>
                                        <div class="form-group mb-3">
                                            <label>Button Link:</label>
                                            <input type="text" name="slider[0][btn_link]" class="form-control">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label>Background Image:</label><br>
                                            <input type="file" name="slider[0][bg_img]" class="form-control-file" >
                                            <label>Slider background image</label>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label>Slider Image:</label><br>
                                            <input type="file" name="slider[0][sl_img]" class="form-control-file" >
                                            <label>Slider image (535*802)</label>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <button id="addSlider" type="button" class="btn btn-primary">Add Slider Item</button>
                            <hr>
                            
                            <h2>Mission</h2>
                            <div class="form-group mb-3 ">
                                <label>Mission (en):</label>
                                <textarea name="mission[mission][en]" class="form-control" rows="3" >{{ $meta['mission']['mission']['en'] ?? ''}}</textarea>
                            </div>
                            <div class="form-group mb-3 ">
                                <label>Mission(ar):</label>
                                <textarea name="mission[mission][ar]" class="form-control" rows="3" >{{ $meta['mission']['mission']['ar'] ?? ''}}</textarea>
                            </div>
                            <hr>

                            <h2>About Us</h2>
                            <div class="form-group mb-3">
                                <label>Title (en):</label>
                                <input type="text" name="about[title][en]" class="form-control" value="{{ $meta['about']['title']['en'] ?? ''}}">
                            </div>
                            <div class="form-group mb-3">
                                <label>Title (ar):</label>
                                <input type="text" name="about[title][ar]" class="form-control" value="{{ $meta['about']['title']['ar'] ?? ''}}">
                            </div>
                            <div class="form-group mb-3">
                                <label>Content 1 (en):</label>
                                <input type="text" name="about[content1][en]" class="form-control" value="{{ $meta['about']['content1']['en'] ?? ''}}">
                            </div>
                            <div class="form-group mb-3">
                                <label>Content 1 (ar):</label>
                                <input type="text" name="about[content1][ar]" class="form-control" value="{{ $meta['about']['content1']['ar'] ?? ''}}">
                            </div>
                            <div class="form-group mb-3">
                                <label>Content 2 (en):</label>
                                <input type="text" name="about[content2][en]" class="form-control" value="{{ $meta['about']['content2']['en'] ?? ''}}">
                            </div>
                            <div class="form-group mb-3">
                                <label>Content 2 (ar):</label>
                                <input type="text" name="about[content2][ar]" class="form-control" value="{{ $meta['about']['content2']['ar'] ?? ''}} ">
                            </div>
                            <div class="form-group mb-3">
							    <label>About Image 1:</label><br>
                                <label class="instruction_label">About image (526*688)</label><br>
							    <input type="file" name="about[0][aboutImage1]" class="form-control-file" >
							    @if(isset($meta['uploadedImages']['about'][0]['aboutImage1']['original_url']))
                                	<img src="{{ $meta['uploadedImages']['about'][0]['aboutImage1']['original_url'] ?? '' }}" height="50" width="50">
                                @endif
							</div>
							<div class="form-group mb-3">
							    <label>About Image 2:</label><br>
                                <label class="instruction_label">About image (290*314)</label><br>
							    <input type="file" name="about[0][aboutImage2]" class="form-control-file" >
							    @if(isset($meta['uploadedImages']['about'][0]['aboutImage2']['original_url']))
                                	<img src="{{ $meta['uploadedImages']['about'][0]['aboutImage2']['original_url'] ?? '' }}" height="50" width="50">
                                @endif
							</div>
                            <hr>

                            <h2>Watch Our Videos</h2>
                            <div id="videosContainer" data-count="{{ count($meta['video'] ?? ARRAY() ) }}">
                            	@if(isset($meta['video']))
	                                @foreach ($meta['video'] as $key => $title)
	                                    <div class="repeater-item border p-4 rounded-3">
	                                        <h4>Video</h4>
	                                        <div class="form-group mb-3">
	                                            <label>Video URL:</label>
	                                            <input type="text" name="video[{{$key}}][url]" class="form-control" value="{{ $meta['video'][$key]['url'] ?? '' }}">
	                                        </div>
                                            <button class="btn btn-danger remove-video" type="button">Remove Video Item</button>
	                                    </div>
	                                @endforeach
                                @else
                                	<div class="repeater-item border p-4 rounded-3">
                                        <h4>Video</h4>
                                        <div class="form-group mb-3">
                                            <label>Video URL:</label>
                                            <input type="text" name="video[0][url]" class="form-control">
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <button id="addVideo" type="button" class="btn btn-primary">Add Video</button>
                            <hr>

                            <h2>Experience The Service</h2>
                            <div class="form-group mb-3">
                                <label>Title (en):</label>
                                <input type="text" name="experience[title][en]" class="form-control" value="{{$meta['experience']['title']['en'] ?? ''}}">
                            </div>
                            <div class="form-group mb-3">
                                <label>Title (ar):</label>
                                <input type="text" name="experience[title][ar]" class="form-control" value="{{$meta['experience']['title']['ar'] ?? ''}}">
                            </div>
                            <!-- <div class="form-group mb-3">
                                <label>Sub Title (en):</label>
                                <input type="text" name="experience[sub-title][en]" class="form-control" value="{{-- $meta['experience']['sub-title']['en'] ?? '' --}}">
                            </div>
                            <div class="form-group mb-3">
                                <label>Sub Title (ar):</label>
                                <input type="text" name="experience[sub-title][ar]" class="form-control" value="{{-- $meta['experience']['sub-title']['ar'] ?? '' --}}">
                            </div> -->

                            <div id="servicesContainer" data-count="{{ count($meta['services'] ?? ARRAY() ) }}">
                            	@if(isset($meta['services']))
	                                @foreach ($meta['services'] as $key => $title)
	                                    <div class="repeater-item border p-4 rounded-3">
	                                        <h4>Service</h4>
	                                        <div class="form-group mb-3">
	                                            <label>Image:</label><br>
                                                <label class="instruction_label">Service image (360 width)</label><br>
	                                            <input type="file" name="services[{{$key}}][image1]" class="form-control-file">
	                                            @if(isset($meta['uploadedImages']['services'][$key]['image1']['original_url']))
	                                            	<img src="{{ $meta['uploadedImages']['services'][$key]['image1']['original_url'] ?? '' }}" height="50" width="50">
	                                            @endif
	                                        </div>
	                                        <div class="form-group mb-3">
	                                            <label>Title (en):</label>
	                                            <input type="text" name="services[{{$key}}][title][en]" class="form-control" value="{{ $meta['services'][$key]['title']['en'] ?? ''}}">
	                                        </div>
	                                        <div class="form-group mb-3">
	                                            <label>Title (ar):</label>
	                                            <input type="text" name="services[{{$key}}][title][ar]" class="form-control" value="{{ $meta['services'][$key]['title']['ar'] ?? ''}}">
	                                        </div>
	                                        <div class="form-group mb-3">
	                                            <label>Content (en):</label>
	                                            <input type="text" name="services[{{$key}}][content][en]" class="form-control" value="{{ $meta['services'][$key]['title']['en'] ?? ''}}">
	                                        </div>
	                                        <div class="form-group mb-3">
	                                            <label>Content (ar):</label>
	                                            <input type="text" name="services[{{$key}}][content][ar]" class="form-control" value="{{ $meta['services'][$key]['title']['ar'] ?? ''}}">
	                                        </div>
	                                        <div class="form-group mb-3">
	                                            <label>Button Link:</label>
	                                            <input type="text" name="services[{{$key}}][buttonlink]" class="form-control" value="{{ $meta['services'][$key]['buttonlink'] ?? ''}}">
	                                        </div>
                                            <button class="btn btn-danger remove-service" type="button">Remove Service Item</button>
	                                    </div>
	                                @endforeach
                                @else
                                	<div class="repeater-item border p-4 rounded-3">
                                        <h4>Service</h4>
                                        <div class="form-group mb-3">
                                            <label>Image:</label><br>
                                            <input type="file" name="services[0][image1]" class="form-control-file">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label>Title (en):</label>
                                            <input type="text" name="services[0][title][en]" class="form-control" >
                                        </div>
                                        <div class="form-group mb-3">
                                            <label>Title (ar):</label>
                                            <input type="text" name="services[0][title][en]" class="form-control" >
                                        </div>
                                        <div class="form-group mb-3">
                                            <label>Content (en):</label>
                                            <input type="text" name="services[0][content][en]" class="form-control" >
                                        </div>
                                        <div class="form-group mb-3">
                                            <label>Content (ar):</label>
                                            <input type="text" name="services[0][content][ar]" class="form-control" >
                                        </div>
                                        <div class="form-group mb-3">
                                            <label>Button Text (en):</label>
                                            <input type="text" name="services[0][buttontext][en]" class="form-control">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label>Button Text (ar):</label>
                                            <input type="text" name="services[0][buttontext][ar]" class="form-control">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label>Button Link:</label>
                                            <input type="text" name="services[0][buttonlink]" class="form-control">
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <button id="addService" type="button" class="btn btn-primary">Add Service</button>
                            <!-- <div class="form-group my-3">
                                <label>Button Text (en):</label>
                                <input type="text" name="experience[buttontext][en]" class="form-control" value="{{-- $meta['experience']['buttontext']['en'] ?? '' --}}">
                            </div>
                            <div class="form-group my-3">
                                <label>Button Text (ar):</label>
                                <input type="text" name="experience[buttontext][ar]" class="form-control" value="{{-- $meta['experience']['buttontext']['ar'] ?? '' --}}">
                            </div>
                            <div class="form-group mb-3">
                                <label>Button Link:</label>
                                <input type="text" name="experienceButtonLink" class="form-control" value="{{-- $meta['experienceButtonLink'] ?? '' --}}">
                            </div> -->
                            <hr>

                            <h2>Mission Statement</h2>
                            <div class="form-group mb-3">
                                <label>Title (en):</label>
                                <input type="text" name="statement[title][en]" class="form-control" value="{{$meta['statement']['title']['en'] ?? ''}}">
                            </div>
                            <div class="form-group mb-3">
                                <label>Title (ar):</label>
                                <input type="text" name="statement[title][ar]" class="form-control" value="{{$meta['statement']['title']['ar'] ?? ''}}">
                            </div>
                            <div class="form-group mb-3">
                                <label>Stylish Title (en):</label>
                                <input type="text" name="statement[stylish_title][en]" class="form-control" value="{{$meta['statement']['stylish_title']['en'] ?? ''}}">
                            </div>
                            <div class="form-group mb-3">
                                <label>Stylish Title (ar):</label>
                                <input type="text" name="statement[stylish_title][ar]" class="form-control" value="{{$meta['statement']['stylish_title']['ar'] ?? ''}}">
                            </div>
                            <div class="form-group mb-3">
                                <label>Content 1 (en):</label>
                                <input type="text" name="statement[content1][en]" class="form-control" value="{{$meta['statement']['content1']['en'] ?? ''}}">
                            </div>
                            <div class="form-group mb-3">
                                <label>Content 1 (ar):</label>
                                <input type="text" name="statement[content1][ar]" class="form-control" value="{{$meta['statement']['content1']['ar'] ?? ''}}">
                            </div>
                            <div class="form-group mb-3">
                                <label>Sub Title (en):</label>
                                <input type="text" name="statement[sub_title][en]" class="form-control" value="{{$meta['statement']['sub_title']['en'] ?? ''}}">
                            </div>
                            <div class="form-group mb-3">
                                <label>Sub Title (ar):</label>
                                <input type="text" name="statement[sub_title][ar]" class="form-control" value="{{$meta['statement']['sub_title']['ar'] ?? ''}}">
                            </div>
                            <div class="form-group mb-3">
                                <label>Content 2 (en):</label>
                                <input type="text" name="statement[content2][en]" class="form-control" value="{{$meta['statement']['content2']['en'] ?? ''}}">
                            </div>
                            <div class="form-group mb-3">
                                <label>Content 2 (ar):</label>
                                <input type="text" name="statement[content2][ar]" class="form-control" value="{{$meta['statement']['content2']['ar'] ?? ''}}">
                            </div>
                            <!-- <div class="form-group mb-3">
                                <label>Button Text (en):</label>
                                <input type="text" name="statement[buttontext][en]" class="form-control" value="{{-- $meta['statement']['buttontext']['en'] ?? '' --}}">
                            </div>
                            <div class="form-group mb-3">
                                <label>Button Text (ar):</label>
                                <input type="text" name="statement[buttontext][ar]" class="form-control" value="{{-- $meta['statement']['buttontext']['ar'] ?? '' --}}">
                            </div> -->
                            <!-- <div class="form-group mb-3">
                                <label>Button Link:</label>
                                <input type="text" name="statement[buttonlink]" class="form-control" value="{{-- $meta['statement']['buttonlink'] ?? '' --}}">
                            </div> -->
                            <div class="form-group mb-3">
                                <label>Image 1:</label><br>
                                <label class="instruction_label">Statement Section image (350*470)</label><br>
                                <input type="file" name="statement[0][image1]" class="form-control-file" >
                                @if(isset($meta['uploadedImages']['statement']['image1']['original_url']))
                                	<img src="{{ $meta['uploadedImages']['statement']['image1']['original_url'] ?? '' }}" height="50" width="50">
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <label>Image 2:</label><br>
                                <label class="instruction_label">Statement Section image (350*470)</label><br>
                                <input type="file" name="statement[0][image2]" class="form-control-file" >
                                @if(isset($meta['uploadedImages']['statement']['image2']['original_url']))
                                	<img src="{{ $meta['uploadedImages']['statement']['image2']['original_url'] ?? '' }}" height="50" width="50">
                                @endif
                            </div>
                            <hr>

                            <h2>Our Customer's Feedback</h2>
                            <div class="form-group mb-3">
                                <label>Title (en):</label>
                                <input type="text" name="feedback[title][en]" class="form-control" value="{{$meta['feedback']['title']['en'] ?? ''}}">
                            </div>
                            <div class="form-group mb-3">
                                <label>Title (ar):</label>
                                <input type="text" name="feedback[title][ar]" class="form-control" value="{{$meta['feedback']['title']['ar'] ?? ''}}">
                            </div>
                            <div class="form-group mb-3">
                                <label>Sub Title (en):</label>
                                <input type="text" name="feedback[subtitle][en]" class="form-control" value="{{$meta['feedback']['title']['en'] ?? ''}}">
                            </div>
                            <div class="form-group mb-3">
                                <label>Sub Title (ar):</label>
                                <input type="text" name="feedback[subtitle][ar]" class="form-control" value="{{$meta['feedback']['title']['ar'] ?? ''}}">
                            </div>
                            <div id="feedbackContainer"  data-count="{{ count($meta['customer'] ?? ARRAY() ) }}">
                            	@if(isset($meta['customer']))
	                                @foreach ($meta['customer'] as $key => $title)
	                                    <div class="repeater-item border p-4 rounded-3">
	                                        <h4>Customer Feedback</h4>
	                                        <div class="form-group mb-3">
	                                            <label>Customer Image:</label><br>
                                                <label class="instruction_label">Feedback image (55*55)</label><br>
	                                            <input type="file" name="customer[{{$key}}][image1]" class="form-control-file" >
	                                            @if(isset($meta['uploadedImages']['customer'][$key]['image1']['original_url']))
	                                            	<img src="{{ $meta['uploadedImages']['customer'][$key]['image1']['original_url'] ?? '' }}" height="50" width="50">
	                                            @endif
	                                        </div>

	                                        <div class="form-group mb-3">
	                                            <label>Customer Title (en):</label>
	                                            <input type="text" name="customer[{{$key}}][title][en]" class="form-control" value="{{ $meta['customer'][$key]['title']['en'] }}">
	                                        </div>
	                                        <div class="form-group mb-3">
	                                            <label>Customer Title (ar):</label>
	                                            <input type="text" name="customer[{{$key}}][title][ar]" class="form-control" value="{{ $meta['customer'][$key]['title']['ar'] }}">
	                                        </div>

	                                        <div class="form-group mb-3">
	                                            <label>Customer Review (en):</label>
	                                            <textarea name="customer[{{$key}}][review][en]" class="form-control" rows="3" >{{ $meta['customer'][$key]['review']['en'] }}</textarea>
	                                        </div>
	                                        <div class="form-group mb-3">
	                                            <label>Customer Review (ar):</label>
	                                            <textarea name="customer[{{$key}}][review][ar]" class="form-control" rows="3" >{{ $meta['customer'][$key]['review']['ar'] }}</textarea>
	                                        </div>
                                            <button class="btn btn-danger remove-feedback" type="button">Remove Customer Feedback Item</button>
	                                    </div>
	                                @endforeach
	                            @else
	                            	<div class="repeater-item border p-4 rounded-3">
                                        <h4>Customer Feedback</h4>
                                        <div class="form-group mb-3">
                                            <label>Customer Image:</label><br>
                                            <input type="file" name="customer[0][image1]" class="form-control-file" >
                                        </div>
                                        <div class="form-group mb-3">
                                            <label>Customer Title (en):</label>
                                            <input type="text" name="customer[0][title][en]" class="form-control" >
                                        </div>
                                         <div class="form-group mb-3">
                                            <label>Customer Title (ar):</label>
                                            <input type="text" name="customer[0][title][ar]" class="form-control" >
                                        </div>
                                        <div class="form-group mb-3">
                                            <label>Customer Review (en):</label>
                                            <textarea name="customer[0][review][en]" class="form-control" rows="3" ></textarea>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label>Customer Review (ar):</label>
                                            <textarea name="customer[0][review][ar]" class="form-control" rows="3" ></textarea>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <button id="addFeedback" type="button" class="btn btn-primary">Add Customer Feedback</button>
                            <hr>

                            <h2>See Our Gallery</h2>
                            <div id="galleryContainer" data-count="{{ count($meta['gallery'] ?? ARRAY() ) }}">
                            	@if(isset($meta['gallery']))
	                                @foreach ($meta['gallery'] as $key => $title)
	                                    <div class="repeater-item border p-4 rounded-3">
	                                        <h4>Gallery Item</h4>
	                                        <div class="form-group mb-3">
	                                            <label>Image:</label><br>
                                                <label class="instruction_label">Gallery image (316*200)</label><br>
	                                            <input type="file" name="gallery[{{$key}}][image1]" class="form-control-file" >
				                                @if(isset($meta['uploadedImages']['gallery'][$key]['image1']['original_url']))
	                                            	<img src="{{ $meta['uploadedImages']['customer'][$key]['image1']['original_url'] ?? '' }}" height="50" width="50">
	                                            @endif
	                                        </div>
	                                        <div class="form-group mb-3">
	                                            <label>Title (en):</label>
	                                            <input type="text" name="gallery[{{$key}}][title][en]" class="form-control"  value="{{ $meta['gallery'][$key]['title']['en'] }}">
	                                        </div>
	                                        <div class="form-group mb-3">
	                                            <label>Title (ar):</label>
	                                            <input type="text" name="gallery[{{$key}}][title][en]" class="form-control"  value="{{ $meta['gallery'][$key]['title']['en'] }}">
	                                        </div>
	                                        <div class="form-group mb-3">
	                                            <label>Content (en):</label>
	                                            <input type="text" name="gallery[{{$key}}][content][en]" class="form-control"  value="{{ $meta['gallery'][$key]['content']['en'] }}">
	                                        </div>
	                                        <div class="form-group mb-3">
	                                            <label>Content (ar):</label>
	                                            <input type="text" name="gallery[{{$key}}][content][en]" class="form-control"  value="{{ $meta['gallery'][$key]['content']['en'] }}">
	                                        </div>
                                            <button class="btn btn-danger remove-gallery" type="button">Remove Gallery Item</button>
	                                    </div>
	                                @endforeach
	                            @else
	                            	<div class="repeater-item border p-4 rounded-3">
                                        <h4>Gallery Item</h4>
                                        <div class="form-group mb-3">
                                            <label>Image:</label><br>
                                            <input type="file" name="gallery[0][image1]" class="form-control-file" >
                                        </div>
                                        <div class="form-group mb-3">
                                            <label>Title (en):</label>
                                            <input type="text" name="gallery[0][title][en]" class="form-control">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label>Title (ar):</label>
                                            <input type="text" name="gallery[0][title][ar]" class="form-control">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label>Content (en):</label>
                                            <input type="text" name="gallery[0][content][en]" class="form-control">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label>Content (ar):</label>
                                            <input type="text" name="gallery[0][content][ar]" class="form-control">
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <button id="addGallery" type="button" class="btn btn-primary">Add Gallery Item</button>
                            <hr>

                            <h2>Call To Action</h2>
                            <div class="form-group mb-3">
                                <label>Background Image:</label><br>
                                <label class="instruction_label">Full image</label><br>
                                <input type="file" name="calltoaction[0][image1]" class="form-control-file">
                                @if(isset($meta['uploadedImages']['calltoaction'][0]['image1']['original_url']))
	                            	<img src="{{ $meta['uploadedImages']['calltoaction'][0]['image1']['original_url'] ?? '' }}" height="50" width="50">
	                            @endif
                            </div>
                            <div class="form-group mb-3">
                                <label>Title (en):</label>
                                <input type="text" name="calltoaction[title][en]" class="form-control" value="{{$meta['calltoaction']['title']['en'] ?? ''}}">
                            </div>
                            <div class="form-group mb-3">
                                <label>Title (ar):</label>
                                <input type="text" name="calltoaction[title][ar]" class="form-control" value="{{$meta['calltoaction']['title']['ar'] ?? ''}}">
                            </div>
                            <div class="form-group mb-3">
                                <label>Content (en):</label>
                                <input type="text" name="calltoaction[content][en]" class="form-control" value="{{$meta['calltoaction']['content']['en'] ?? ''}}">
                            </div>
                            <div class="form-group mb-3">
                                <label>Content (ar):</label>
                                <input type="text" name="calltoaction[content][ar]" class="form-control" value="{{$meta['calltoaction']['content']['ar'] ?? ''}}">
                            </div>
                            <div class="form-group mb-3">
                                <label>Button Text (en):</label>
                                <input type="text" name="calltoaction[buttontext][en]" class="form-control" value="{{$meta['calltoaction']['buttontext']['en'] ?? ''}}">
                            </div>
                            <div class="form-group mb-3">
                                <label>Button Text (ar):</label>
                                <input type="text" name="calltoaction[buttontext][ar]" class="form-control" value="{{$meta['calltoaction']['buttontext']['ar'] ?? ''}}">
                            </div>
                            <div class="form-group mb-3">
                                <label>Button Link:</label>
                                <input type="text" name="calltoaction[buttonlink]" class="form-control" value="{{$meta['calltoaction']['buttonlink'] ?? ''}}">
                            </div>
                            
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                            <!-- form -->
						</div>						
					</div>
				</div>
			</div>
		</div>
		
	</div>
</div>
<script type="text/javascript">
	var session_layout = '{{ session()->get('layout') }}';
</script>
@endsection

@section('script')
<script src="{{asset('assets/admin/js/chart/chartist/chartist.js')}}"></script>
<script src="{{asset('assets/admin/js/chart/chartist/chartist-plugin-tooltip.js')}}"></script>
<script src="{{asset('assets/admin/js/chart/knob/knob.min.js')}}"></script>
<script src="{{asset('assets/admin/js/chart/knob/knob-chart.js')}}"></script>
<script src="{{asset('assets/admin/js/chart/apex-chart/apex-chart.js')}}"></script>
<script src="{{asset('assets/admin/js/chart/apex-chart/stock-prices.js')}}"></script>
<script src="{{asset('assets/admin/js/notify/bootstrap-notify.min.js')}}"></script>
<script src="{{asset('assets/admin/js/dashboard/default.js')}}"></script>
<script src="{{asset('assets/admin/js/notify/index.js')}}"></script>
<script src="{{asset('assets/admin/js/datepicker/date-picker/datepicker.js')}}"></script>
<script src="{{asset('assets/admin/js/datepicker/date-picker/datepicker.en.js')}}"></script>
<script src="{{asset('assets/admin/js/datepicker/date-picker/datepicker.custom.js')}}"></script>
<script src="{{asset('assets/admin/js/typeahead/handlebars.js')}}"></script>
<script src="{{asset('assets/admin/js/typeahead/typeahead.bundle.js')}}"></script>
<script src="{{asset('assets/admin/js/typeahead/typeahead.custom.js')}}"></script>
<script src="{{asset('assets/admin/js/typeahead-search/handlebars.js')}}"></script>
<script src="{{asset('assets/admin/js/typeahead-search/typeahead-custom.js')}}"></script>
@endsection
