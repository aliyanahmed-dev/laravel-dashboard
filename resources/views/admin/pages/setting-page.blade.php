@extends('admin.layouts.simple.master')
@section('title', 'galleries')

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
<h3>All galleries</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Dashboard</li>
<li class="breadcrumb-item active">galleries</li>
@endsection

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<div class="card">
				<div class="card-header align-items-center card-header d-flex justify-content-between">
					<h5>galleries</h5>
					<a href="{{ route('galleries.create') }}" class="btn btn-primary">Add gallery</a>
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
								<th scope="col">Description</th>
								<th scope="col">Action</th>
							</tr>
						</thead>
						<tbody>
                            @foreach($galleries as $gallery)
							<tr>
								<th scope="row">{{ $gallery->id }}</th>
								<td>
									@if($gallery->hasMedia('gallery_image'))
										<img src="{{ $gallery->getFirstMediaUrl('gallery_image') }}" width="50" />
									@endif
								</td>
								<td>{{ $gallery->name }}</td>
								<td>{{ $gallery->description }}</td>
                                <td>
									<a class="btn btn-primary btn-sm" href="{{ route('galleries.show', $gallery->id) }}" title=""><i class="fa fa-pencil"></i> Edit</a>
									<form action="{{ route('galleries.destroy', $gallery->id) }}" class="d-inline" method="POST">
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