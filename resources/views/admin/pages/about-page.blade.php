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
                                {{-- $meta --}}
                            </pre>
                            <form action="{{ route('submitAbout') }}" method="post" class="container py-4 bold-labels" enctype="multipart/form-data">
                            @csrf

                            <h2>About Us</h2>
                            <div class="form-group mb-3">
                                <label>Title (en):</label>
                                <input type="text" name="about[title][en]" class="form-control" value="{{ $meta['about']['title']['en'] ?? ''}}">
                            </div>
                            <div class="form-group mb-3">
                                <label>Title (ar):</label>
                                <input type="text" name="about[title][ar]" class="form-control" value="{{$meta['about']['title']['ar'] ?? ''}}">
                            </div>

                            <div class="form-group mb-3">
                                <label>Content 1 (en):</label>
                                <input type="text" name="about[content1][en]" class="form-control" value="{{$meta['about']['content1']['en'] ?? ''}}">
                            </div>
                            <div class="form-group mb-3">
                                <label>Content 1 (ar):</label>
                                <input type="text" name="about[content1][ar]" class="form-control" value="{{$meta['about']['content1']['ar'] ?? ''}}">
                            </div>

                            <div class="form-group mb-3">
                                <label>Content 2 (en):</label>
                                <input type="text" name="about[content2][en]" class="form-control" value="{{$meta['about']['content2']['en'] ?? ''}}">
                            </div>
                            <div class="form-group mb-3">
                                <label>Content 2 (ar):</label>
                                <input type="text" name="about[content2][ar]" class="form-control" value="{{$meta['about']['content2']['ar'] ?? ''}}">
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

                            <h2>Statement</h2>
                            <div class="form-group mb-3">
                                <label>Title (en):</label>
                                <input type="text" name="statement[title][en]" class="form-control" value="{{$meta['statement']['title']['en'] ?? ''}}">
                            </div>
                            <div class="form-group mb-3">
                                <label>Title (en):</label>
                                <input type="text" name="statement[title][ar]" class="form-control" value="{{$meta['statement']['title']['ar'] ?? ''}}">
                            </div>

                            <div class="form-group mb-3">
                                <label>Sign (en):</label>
                                <input type="text" name="statement[stylish_title][en]" class="form-control" value="{{$meta['statement']['stylish_title']['en'] ?? ''}}">
                            </div>
                            <div class="form-group mb-3">
                                <label>Sign (ar):</label>
                                <input type="text" name="statement[stylish_title][ar]" class="form-control" value="{{$meta['statement']['stylish_title']['ar'] ?? ''}}">
                            </div>

                            <div class="form-group mb-3">
                                <label>Short Content (en):</label>
                                <input type="text" name="statement[content1][en]" class="form-control" value="{{$meta['statement']['content1']['en'] ?? ''}}">
                            </div>
                            <div class="form-group mb-3">
                                <label>Short Content (ar):</label>
                                <input type="text" name="statement[content1][ar]" class="form-control" value="{{$meta['statement']['content1']['ar'] ?? ''}}">
                            </div>

                            <div class="form-group mb-3">
                                <label>Heading (en):</label>
                                <input type="text" name="statement[sub_title][en]" class="form-control" value="{{$meta['statement']['sub_title']['en'] ?? ''}}">
                            </div>
                            <div class="form-group mb-3">
                                <label>Heading (ar):</label>
                                <input type="text" name="statement[sub_title][ar]" class="form-control" value="{{$meta['statement']['sub_title']['ar'] ?? ''}}">
                            </div>
                            
                            <div class="form-group mb-3">
                                <label>Content (en):</label>
                                <input type="text" name="statement[content2][en]" class="form-control" value="{{$meta['statement']['content2']['en'] ?? ''}}">
                            </div>
                            <div class="form-group mb-3">
                                <label>Content (ar):</label>
                                <input type="text" name="statement[content2][ar]" class="form-control" value="{{$meta['statement']['content2']['ar'] ?? ''}}">
                            </div>

                            <div class="form-group mb-3">
                                <label>Image 1:</label><br>
                                <label class="instruction_label">Statement Section image (350*470)</label><br>
                                <input type="file" name="statement[0][image1]" class="form-control-file" >
                                @if(isset($meta['uploadedImages']['statement'][0]['image1']['original_url']))
                                    <img src="{{ $meta['uploadedImages']['statement'][0]['image1']['original_url'] ?? '' }}" height="50" width="50">
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <label>Image 2:</label><br>
                                <label class="instruction_label">Statement Section image (350*470)</label><br>
                                <input type="file" name="statement[0][image2]" class="form-control-file" >
                                @if(isset($meta['uploadedImages']['statement'][0]['image2']['original_url']))
                                    <img src="{{ $meta['uploadedImages']['statement'][0]['image2']['original_url'] ?? '' }}" height="50" width="50">
                                @endif
                            </div>
                            <hr>

                            <h2>Faq</h2>
                            <div id="faqContainer"  data-count="{{ count($meta['faq'] ?? ARRAY() ) }}">
                            	@if(isset($meta['faq']))
	                                @foreach ($meta['faq'] as $key => $value)
	                                    <div class="repeater-item border p-4 rounded-3">
	                                        <div class="form-group mb-3">
	                                            <label>Question (en)</label>
                                                <input type="text" name=" faq[{{$key}}][question][en] " class="form-control" value="{{ $meta['faq'][$key]['question']['en'] ?? '' }}">
	                                        </div>
                                            <div class="form-group mb-3">
	                                            <label>Question (ar)</label>
                                                <input type="text" name=" faq[{{$key}}][question][ar] " class="form-control" value="{{ $meta['faq'][$key]['question']['ar'] ?? '' }}">
	                                        </div>
                                            <div class="form-group mb-3">
	                                            <label>Answer (en)</label>
                                                <input type="text" name=" faq[{{$key}}][answer][en] " class="form-control" value="{{ $meta['faq'][$key]['answer']['en'] ?? '' }}">
	                                        </div>
                                            <div class="form-group mb-3">
	                                            <label>Answer (ar)</label>
                                                <input type="text" name=" faq[{{$key}}][answer][ar] " class="form-control" value="{{ $meta['faq'][$key]['answer']['ar'] ?? '' }}">
	                                        </div>
	                                    </div>
	                                @endforeach
                                @else
                                	<div class="repeater-item border p-4 rounded-3">
                                        <div class="form-group mb-3">
                                            <label>Question (en)</label>
                                            <input type="text" name=" faq[0][question][en] " class="form-control">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label>Question (ar)</label>
                                            <input type="text" name=" faq[0][question][ar] " class="form-control">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label>Answer (en)</label>
                                            <input type="text" name=" faq[0][answer][en] " class="form-control">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label>Answer (ar)</label>
                                            <input type="text" name=" faq[0][answer][ar] " class="form-control">
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <button id="addFaq" type="button" class="btn btn-primary">Add Faq</button>
                         
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
