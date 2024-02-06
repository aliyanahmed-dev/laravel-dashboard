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
                            <pre>
                              
                                {{ $meta }}
                            </pre>
                            <form action="{{ route('submitHome2') }}" method="post" class="container py-4" enctype="multipart/form-data">
                            @csrf
                            <h2>Slider</h2>
                            <div id="sliderContainer">
                                <div class="repeater-item border p-4 rounded-3">
                                    <h4>Slider Item 1</h4>
                                    <div class="form-group mb-3">
                                        <label>Title (en):</label>
                                        <input type="text" name="slider[0][title][en]" class="form-control" value="{{ $meta['slider'][0]['title']['en'] ?? '' }}">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Title (en):</label>
                                        <input type="text" name="slider[0][title][ar]" class="form-control" value="{{ $meta['slider'][0]['title']['ar'] ?? '' }}">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Content (en):</label>
                                        <input type="text" name="slider[0][content][en]" class="form-control" value="{{ $meta['slider'][0]['content']['en'] ?? '' }}">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Content (ar):</label>
                                        <input type="text" name="slider[0][content][ar]" class="form-control" value="{{ $meta['slider'][0]['content']['ar'] ?? '' }}">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Button Text (en):</label>
                                        <input type="text" name="slider[0][btn_text][en]" class="form-control" value="{{ $meta['slider'][0]['btn_text']['en'] ?? '' }}">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Button Text (ar):</label>
                                        <input type="text" name="slider[0][btn_text][ar]" class="form-control" value="{{ $meta['slider'][0]['btn_text']['ar'] ?? '' }}">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Button Link:</label>
                                        <input type="text" name="slider[0][btn_link]" class="form-control" value="{{ $meta['slider'][0]['btn_link'] ?? '' }}">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Background Image:</label><br>
                                        <input type="file" name="slider[0][bg_img]" class="form-control-file" >
                                        <img src="{{ $meta['slider'][0]['bg_img']['original_url'] ?? '' }}" height="50" width="50">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Slider Image:</label><br>
                                        <input type="file" name="slider[0][sl_img]" class="form-control-file" >
                                        <img src="{{ $meta['slider'][0]['sl_img']['original_url'] ?? '' }}" height="50" width="50">
                                    </div>
                                </div>

                                <div class="repeater-item border p-4 rounded-3">
                                    <h4>Slider Item 2</h4>
                                    <div class="form-group mb-3">
                                        <label>Title (en):</label>
                                        <input type="text" name="slider[1][title][en]" class="form-control" value="{{ $meta['slider'][1]['title']['en'] ?? '' }}">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Title (en):</label>
                                        <input type="text" name="slider[1][title][ar]" class="form-control" value="{{ $meta['slider'][1]['title']['ar'] ?? '' }}">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Content (en):</label>
                                        <input type="text" name="slider[1][content][en]" class="form-control" value="{{ $meta['slider'][1]['content']['en'] ?? '' }}">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Content (ar):</label>
                                        <input type="text" name="slider[1][content][ar]" class="form-control" value="{{ $meta['slider'][1]['content']['ar'] ?? '' }}">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Button Text (en):</label>
                                        <input type="text" name="slider[1][btn_text][en]" class="form-control" value="{{ $meta['slider'][1]['btn_text']['en'] ?? '' }}">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Button Text (ar):</label>
                                        <input type="text" name="slider[1][btn_text][ar]" class="form-control" value="{{ $meta['slider'][1]['btn_text']['ar'] ?? '' }}">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Button Link:</label>
                                        <input type="text" name="slider[1][btn_link]" class="form-control" value="{{ $meta['slider'][1]['btn_link'] ?? '' }}">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Background Image:</label><br>
                                        <input type="file" name="slider[1][bg_img]" class="form-control-file" >
                                        <img src="{{ $meta['slider'][1]['bg_img']['original_url'] ?? '' }}" height="50" width="50">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Slider Image:</label><br>
                                        <input type="file" name="slider[1][sl_img]" class="form-control-file" >
                                        <img src="{{ $meta['slider'][1]['sl_img']['original_url'] ?? '' }}" height="50" width="50">
                                    </div>
                                </div>

                                <div class="repeater-item border p-4 rounded-3">
                                    <h4>Slider Item 3</h4>
                                    <div class="form-group mb-3">
                                        <label>Title (en):</label>
                                        <input type="text" name="slider[2][title][en]" class="form-control" value="{{ $meta['slider'][2]['title']['en'] ?? '' }}">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Title (en):</label>
                                        <input type="text" name="slider[2][title][ar]" class="form-control" value="{{ $meta['slider'][2]['title']['ar'] ?? '' }}">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Content (en):</label>
                                        <input type="text" name="slider[2][content][en]" class="form-control" value="{{ $meta['slider'][2]['content']['en'] ?? '' }}">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Content (ar):</label>
                                        <input type="text" name="slider[2][content][ar]" class="form-control" value="{{ $meta['slider'][2]['content']['ar'] ?? '' }}">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Button Text (en):</label>
                                        <input type="text" name="slider[2][btn_text][en]" class="form-control" value="{{ $meta['slider'][2]['btn_text']['en'] ?? '' }}">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Button Text (ar):</label>
                                        <input type="text" name="slider[2][btn_text][ar]" class="form-control" value="{{ $meta['slider'][2]['btn_text']['ar'] ?? '' }}">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Button Link:</label>
                                        <input type="text" name="slider[2][btn_link]" class="form-control" value="{{ $meta['slider'][2]['btn_link'] ?? '' }}">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Background Image:</label><br>
                                        <input type="file" name="slider[2][bg_img]" class="form-control-file" >
                                        <img src="{{ $meta['slider'][2]['bg_img']['original_url'] ?? '' }}" height="50" width="50">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Slider Image:</label><br>
                                        <input type="file" name="slider[2][sl_img]" class="form-control-file" >
                                        <img src="{{ $meta['slider'][2]['sl_img']['original_url'] ?? '' }}" height="50" width="50">
                                    </div>
                                </div>
                            </div>
                            <hr>
                            
                            <h2>Mission</h2>
                            <div class="form-group mb-3 ">
                                <label>Mission:</label>
                                <textarea name="mission" class="form-control" rows="3" >{{$meta['mission'] ?? ''}}</textarea>
                            </div>
                            <hr>

                            <h2>About Us</h2>
                            <div class="form-group mb-3">
                                <label>Title:</label>
                                <input type="text" name="aboutTitle" class="form-control" value="{{$meta['aboutTitle'] ?? ''}}">
                            </div>
                            <div class="form-group mb-3">
                                <label>Content 1:</label>
                                <input type="text" name="aboutContent1" class="form-control" value="{{$meta['aboutContent1'] ?? ''}}">
                            </div>
                            <div class="form-group mb-3">
                                <label>Content 2:</label>
                                <input type="text" name="aboutContent2" class="form-control" value="{{$meta['aboutContent2'] ?? ''}}">
                            </div>
                            <div class="form-group mb-3">
                                <label>About Image 1:</label><br>
                                <input type="file" name="aboutImage1" class="form-control-file" >
                                @if(isset($meta['uploadedImages']['aboutImage1']['original_url']))
                                	<img src="{{ $meta['uploadedImages']['aboutImage1']['original_url'] ?? '' }}" height="50" width="50">
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <label>About Image 2:</label><br>
                                <input type="file" name="aboutImage2" class="form-control-file" >
                            </div>
                            <hr>

                            <h2>Watch Our Videos</h2>
                            <div id="videosContainer">
                            	@if(isset($meta['videoURL']))
	                                @foreach ($meta['videoURL'] as $key => $title)
	                                    <div class="repeater-item border p-4 rounded-3">
	                                        <h4>Video</h4>
	                                        <div class="form-group mb-3">
	                                            <label>Video URL:</label>
	                                            <input type="text" name="videoURL[]" class="form-control" value="{{$meta['videoURL'][$key] ?? ''}}">
	                                        </div>
	                                    </div>
	                                @endforeach
                                @else
                                	<div class="repeater-item border p-4 rounded-3">
                                        <h4>Video</h4>
                                        <div class="form-group mb-3">
                                            <label>Video URL:</label>
                                            <input type="text" name="videoURL[]" class="form-control">
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <button id="addVideo" type="button" class="btn btn-primary">Add Video</button>
                            <hr>

                            <h2>Experience The Service</h2>
                            <div class="form-group mb-3">
                                <label>Title:</label>
                                <input type="text" name="experienceTitle" class="form-control" value="{{$meta['experienceTitle'] ?? ''}}">
                            </div>
                            <div class="form-group mb-3">
                                <label>Sub Title:</label>
                                <input type="text" name="experienceSubtitle" class="form-control" value="{{$meta['experienceSubtitle'] ?? ''}}">
                            </div>
                            <div id="servicesContainer">
                            	@if(isset($meta['serviceTitle']))
	                                @foreach ($meta['serviceTitle'] as $key => $title)
	                                    <div class="repeater-item border p-4 rounded-3">
	                                        <h4>Service</h4>
	                                        <div class="form-group mb-3">
	                                            <label>Image:</label><br>
	                                            <input type="file" name="serviceImage[]" class="form-control-file">
	                                            @if(isset($meta['uploadedImages']['serviceImage'][$key]['original_url']))
				                                	<img src="{{ $meta['uploadedImages']['serviceImage'][$key]['original_url'] ?? '' }}" height="50" width="50">
				                                @endif
	                                        </div>
	                                        <div class="form-group mb-3">
	                                            <label>Title:</label>
	                                            <input type="text" name="serviceTitle[]" class="form-control" value="{{$meta['serviceTitle'][$key] ?? ''}}">
	                                        </div>
	                                        <div class="form-group mb-3">
	                                            <label>Content:</label>
	                                            <input type="text" name="serviceContent[]" class="form-control" value="{{$meta['serviceTitle'][$key] ?? ''}}">
	                                        </div>
	                                        <div class="form-group mb-3">
	                                            <label>Button Text:</label>
	                                            <input type="text" name="serviceButtonText[]" class="form-control" value="{{$meta['serviceTitle'][$key] ?? ''}}">
	                                        </div>
	                                        <div class="form-group mb-3">
	                                            <label>Button Link:</label>
	                                            <input type="text" name="serviceButtonLink[]" class="form-control" value="{{$meta['serviceTitle'][$key] ?? ''}}">
	                                        </div>
	                                    </div>
	                                @endforeach
                                @else
                                	<div class="repeater-item border p-4 rounded-3">
                                        <h4>Service</h4>
                                        <div class="form-group mb-3">
                                            <label>Image:</label><br>
                                            <input type="file" name="serviceImage[]" class="form-control-file">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label>Title:</label>
                                            <input type="text" name="serviceTitle[]" class="form-control" >
                                        </div>
                                        <div class="form-group mb-3">
                                            <label>Content:</label>
                                            <input type="text" name="serviceContent[]" class="form-control" >
                                        </div>
                                        <div class="form-group mb-3">
                                            <label>Button Text:</label>
                                            <input type="text" name="serviceButtonText[]" class="form-control">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label>Button Link:</label>
                                            <input type="text" name="serviceButtonLink[]" class="form-control">
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <button id="addService" type="button" class="btn btn-primary">Add Service</button>
                            <div class="form-group my-3">
                                <label>Button Text:</label>
                                <input type="text" name="experienceButtonText" class="form-control" value="{{$meta['experienceButtonText'] ?? ''}}">
                            </div>
                            <div class="form-group mb-3">
                                <label>Button Link:</label>
                                <input type="text" name="experienceButtonLink" class="form-control" value="{{$meta['experienceButtonLink'] ?? ''}}">
                            </div>
                            <hr>

                            <h2>Mission Statement</h2>
                            <div class="form-group mb-3">
                                <label>Title:</label>
                                <input type="text" name="missionStatementTitle" class="form-control" value="{{$meta['missionStatementTitle'] ?? ''}}">
                            </div>
                            <div class="form-group mb-3">
                                <label>Stylish Title:</label>
                                <input type="text" name="missionStatementStylishTitle" class="form-control" value="{{$meta['missionStatementStylishTitle'] ?? ''}}">
                            </div>
                            <div class="form-group mb-3">
                                <label>Content 1:</label>
                                <input type="text" name="missionStatementContent1" class="form-control" value="{{$meta['missionStatementContent1'] ?? ''}}">
                            </div>
                            <div class="form-group mb-3">
                                <label>Sub Title:</label>
                                <input type="text" name="missionStatementSubtitle" class="form-control" value="{{$meta['missionStatementSubtitle'] ?? ''}}">
                            </div>
                            <div class="form-group mb-3">
                                <label>Content 2:</label>
                                <input type="text" name="missionStatementContent2" class="form-control" value="{{$meta['missionStatementContent2'] ?? ''}}">
                            </div>
                            <div class="form-group mb-3">
                                <label>Button Text:</label>
                                <input type="text" name="missionStatementButtonText" class="form-control" value="{{$meta['missionStatementButtonText'] ?? ''}}">
                            </div>
                            <div class="form-group mb-3">
                                <label>Button Link:</label>
                                <input type="text" name="missionStatementButtonLink" class="form-control" value="{{$meta['missionStatementButtonLink'] ?? ''}}">
                            </div>
                            <div class="form-group mb-3">
                                <label>Image 1:</label><br>
                                <input type="file" name="missionStatementImage1" class="form-control-file" >
                                @if(isset($meta['uploadedImages']['missionStatementImage1']['original_url']))
                                	<img src="{{ $meta['uploadedImages']['missionStatementImage1']['original_url'] ?? '' }}" height="50" width="50">
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <label>Image 2:</label><br>
                                <input type="file" name="missionStatementImage2" class="form-control-file" >
                                @if(isset($meta['uploadedImages']['missionStatementImage2']['original_url']))
                                	<img src="{{ $meta['uploadedImages']['missionStatementImage2']['original_url'] ?? '' }}" height="50" width="50">
                                @endif
                            </div>
                            <hr>

                            <h2>Our Customer's Feedback</h2>
                            <div class="form-group mb-3">
                                <label>Title:</label>
                                <input type="text" name="feedbackTitle" class="form-control" value="{{$meta['feedbackTitle'] ?? ''}}">
                            </div>
                            <div class="form-group mb-3">
                                <label>Sub Title:</label>
                                <input type="text" name="feedbackSubtitle" class="form-control" value="{{$meta['feedbackSubtitle'] ?? ''}}">
                            </div>
                            <div id="feedbackContainer">
                            	@if(isset($meta['customerTitle']))
	                                @foreach ($meta['customerTitle'] as $key => $title)
	                                    <div class="repeater-item border p-4 rounded-3">
	                                        <h4>Customer Feedback</h4>
	                                        <div class="form-group mb-3">
	                                            <label>Customer Image:</label><br>
	                                            <input type="file" name="customerImage[]" class="form-control-file" >
	                                            @if(isset($meta['uploadedImages']['customerImage'][$key]['original_url']))
				                                	<img src="{{ $meta['uploadedImages']['customerImage'][$key]['original_url'] ?? '' }}" height="50" width="50">
				                                @endif
	                                        </div>
	                                        <div class="form-group mb-3">
	                                            <label>Customer Title:</label>
	                                            <input type="text" name="customerTitle[]" class="form-control" value="{{$meta['customerTitle'][$key] ?? ''}}">
	                                        </div>
	                                        <div class="form-group mb-3">
	                                            <label>Customer Review:</label>
	                                            <textarea name="customerReview[]" class="form-control" rows="3" >{{$meta['customerTitle'][$key] ?? ''}}</textarea>
	                                        </div>
	                                    </div>
	                                @endforeach
	                            @else
	                            	<div class="repeater-item border p-4 rounded-3">
                                        <h4>Customer Feedback</h4>
                                        <div class="form-group mb-3">
                                            <label>Customer Image:</label><br>
                                            <input type="file" name="customerImage[]" class="form-control-file" >
                                        </div>
                                        <div class="form-group mb-3">
                                            <label>Customer Title:</label>
                                            <input type="text" name="customerTitle[]" class="form-control" >
                                        </div>
                                        <div class="form-group mb-3">
                                            <label>Customer Review:</label>
                                            <textarea name="customerReview[]" class="form-control" rows="3" ></textarea>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <button id="addFeedback" type="button" class="btn btn-primary">Add Customer Feedback</button>
                            <hr>

                            <h2>See Our Gallery</h2>
                            <div id="galleryContainer">
                            	@if(isset($meta['galleryTitle']))
	                                @foreach ($meta['galleryTitle'] as $key => $title)
	                                    <div class="repeater-item border p-4 rounded-3">
	                                        <h4>Gallery Item</h4>
	                                        <div class="form-group mb-3">
	                                            <label>Image:</label><br>
	                                            <input type="file" name="galleryImage[]" class="form-control-file" >
	                                            @if(isset($meta['uploadedImages']['galleryImage'][$key]['original_url']))
				                                	<img src="{{ $meta['uploadedImages']['galleryImage'][$key]['original_url'] ?? '' }}" height="50" width="50">
				                                @endif
	                                        </div>
	                                        <div class="form-group mb-3">
	                                            <label>Title:</label>
	                                            <input type="text" name="galleryTitle[]" class="form-control"  value="{{$meta['galleryTitle'][$key] ?? ''}}">
	                                        </div>
	                                        <div class="form-group mb-3">
	                                            <label>Content:</label>
	                                            <input type="text" name="galleryContent[]" class="form-control"  value="{{$meta['galleryContent'][$key] ?? ''}}">
	                                        </div>
	                                    </div>
	                                @endforeach
	                            @else
	                            	<div class="repeater-item border p-4 rounded-3">
                                        <h4>Gallery Item</h4>
                                        <div class="form-group mb-3">
                                            <label>Image:</label><br>
                                            <input type="file" name="galleryImage[]" class="form-control-file" >
                                        </div>
                                        <div class="form-group mb-3">
                                            <label>Title:</label>
                                            <input type="text" name="galleryTitle[]" class="form-control">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label>Content:</label>
                                            <input type="text" name="galleryContent[]" class="form-control">
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <button id="addGallery" type="button" class="btn btn-primary">Add Gallery Item</button>
                            <hr>

                            <h2>Call To Action</h2>
                            <div class="form-group mb-3">
                                <label>Background Image:</label><br>
                                <input type="file" name="callToActionBackgroundImage" class="form-control-file">
                                @if(isset($meta['uploadedImages']['callToActionBackgroundImage']['original_url']))
                                	<img src="{{ $meta['uploadedImages']['callToActionBackgroundImage']['original_url'] ?? '' }}" height="50" width="50">
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <label>Title:</label>
                                <input type="text" name="callToActionTitle" class="form-control" value="{{$meta['callToActionTitle'] ?? ''}}">
                            </div>
                            <div class="form-group mb-3">
                                <label>Content:</label>
                                <input type="text" name="callToActionContent" class="form-control" value="{{$meta['callToActionContent'] ?? ''}}">
                            </div>
                            <div class="form-group mb-3">
                                <label>Button Text:</label>
                                <input type="text" name="callToActionButtonText" class="form-control" value="{{$meta['callToActionButtonText'] ?? ''}}">
                            </div>
                            <div class="form-group mb-3">
                                <label>Button Link:</label>
                                <input type="text" name="callToActionButtonLink" class="form-control" value="{{$meta['callToActionButtonLink'] ?? ''}}">
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
