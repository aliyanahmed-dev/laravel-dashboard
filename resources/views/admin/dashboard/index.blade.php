@extends('admin.layouts.simple.master')

@section('title', 'Default')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/vendors/animate.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/vendors/chartist.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/vendors/date-picker.css')}}">
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3>Default</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Dashboard</li>
<li class="breadcrumb-item active">Default</li>
@endsection

@section('content')
<div class="container-fluid">
	<div class="row second-chart-list third-news-update">

		<div class="col-xl-8 xl-100 dashboard-sec box-col-12">
			<div class="card earning-card">
				<div class="card-body p-0">
					<div class="row m-0">
						<div class="col-xl-3 earning-content p-0">
							<div class="row m-0 chart-left">
								<div class="col-xl-12 p-0 left_side_earning">
									<h5>Dashboard</h5>
									<p class="font-roboto">Overview of last month</p>
								</div>
								<div class="col-xl-12 p-0 left_side_earning">
									<h5>$4055.56 </h5>
									<p class="font-roboto">This Month Earning</p>
								</div>
								<div class="col-xl-12 p-0 left_side_earning">
									<h5>$1004.11</h5>
									<p class="font-roboto">This Month Profit</p>
								</div>
								<div class="col-xl-12 p-0 left_side_earning">
									<h5>90%</h5>
									<p class="font-roboto">This Month Sale</p>
								</div>

							</div>
						</div>
						<div class="col-xl-9 p-0">
							<div class="chart-right">
								<div class="row m-0 p-tb">
									<div class="col-xl-8 col-md-8 col-sm-8 col-12 p-0">
										<div class="inner-top-left">
											<ul class="d-flex list-unstyled">
												<li>Daily</li>
												<li class="active">Weekly</li>
												<li>Monthly</li>
												<li>Yearly</li>
											</ul>
										</div>
									</div>
									<div class="col-xl-4 col-md-4 col-sm-4 col-12 p-0 justify-content-end">
										<div class="inner-top-right">
											<ul class="d-flex list-unstyled justify-content-end">
												<li>Online</li>
												<li>Store</li>
											</ul>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-xl-12">
										<div class="card-body p-0">
											<div class="current-sale-container">
												<div id="chart-currently"></div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="row border-top m-0">
								<div class="col-xl-4 ps-0 col-md-6 col-sm-6">
									<div class="media p-0">
										<div class="media-left"><i class="icofont icofont-crown"></i></div>
										<div class="media-body">
											<h6>Referral Earning</h6>
											<p>$5,000.20</p>
										</div>
									</div>
								</div>
								<div class="col-xl-4 col-md-6 col-sm-6">
									<div class="media p-0">
										<div class="media-left bg-secondary"><i class="icofont icofont-heart-alt"></i></div>
										<div class="media-body">
											<h6>Cash Balance</h6>
											<p>$2,657.21</p>
										</div>
									</div>
								</div>
								<div class="col-xl-4 col-md-12 pe-0">
									<div class="media p-0">
										<div class="media-left"><i class="icofont icofont-cur-dollar"></i></div>
										<div class="media-body">
											<h6>Sales forcasting</h6>
											<p>$9,478.50 </p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
</div>
<script type="text/javascript">
	var session_layout = '{{ session()->get('
	layout ') }}';
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