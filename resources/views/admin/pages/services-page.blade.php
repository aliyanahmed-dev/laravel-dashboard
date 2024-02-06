@extends('admin.layouts.simple.master')
@section('title', 'Services')

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
<h3>All services</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Dashboard</li>
<li class="breadcrumb-item active">Services</li>
@endsection

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<div class="card">
				<div class="card-header align-items-center card-header d-flex justify-content-between">
					<h5>Services</h5>
					<a href="{{ route('services.create') }}" class="btn btn-primary">Add Service</a>
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
								<th scope="col">Icon</th>
								<th scope="col">Name</th>
								<th scope="col">Prices</th>
								<th scope="col">Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach($services as $service)
							<tr>
								<td>{{ $service->id }}</td>
								<td>
									@if($service->hasMedia('icons'))
									<img src="{{ $service->getFirstMediaUrl('icons') }}" width="50" />
									@endif
								</td>
								<td>{{ $service->getTranslations('name')['en'] }}</td>
								<td>{{ $service->price }}</td>
								<td>
									<a class="btn btn-primary btn-sm" href="{{ route('services.show', $service->id) }}" title=""><i class="fa fa-pencil"></i> Edit</a>
									<form action="{{ route('services.destroy', $service->id) }}" class="d-inline" method="POST">
										@method('DELETE')
										@csrf
										<button type="submit" class="btn btn-danger btn-sm">
											<i class="fa fa-trash"></i> Delete
										</button>
									</form>
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