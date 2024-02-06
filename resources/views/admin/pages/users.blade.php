@extends('layouts.simple.master')
@section('title', 'Bootstrap Border Table')

@section('css')
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3>Bootstrap Border Table</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Bootstrap Tables</li>
<li class="breadcrumb-item active">Bootstrap Border Table</li>
@endsection

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<div class="card">
				<div class="card-header">
					<h5>Horizontal Borders</h5>
					<span>Example of <code>horizontal</code> table borders. This is a default table border style attached to <code> .table</code> class.All borders have the same grey color and style, table itself doesn't have a border, but you can add this border using<code> .table-border-horizontal</code>class added to the table with <code>.table</code>class.</span>
				</div>
				<div class="table-responsive">
					<table class="table table-border-horizontal">
						<thead>
							<tr>
								<th scope="col">#</th>
								<th scope="col">First Name</th>
								<th scope="col">Last Name</th>
								<th scope="col">Username</th>
								<th scope="col">Role</th>
								<th scope="col">Country</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<th scope="row">1</th>
								<td>Alexander</td>
								<td>Orton</td>
								<td>@mdorton</td>
								<td>Admin</td>
								<td>USA</td>
							</tr>
							<tr>
								<th scope="row">2</th>
								<td>John Deo</td>
								<td>Deo</td>
								<td>@johndeo</td>
								<td>User</td>
								<td>USA</td>
							</tr>
							<tr>
								<th scope="row">3</th>
								<td>Randy Orton</td>
								<td>the Bird</td>
								<td>@twitter</td>
								<td>admin</td>
								<td>UK</td>
							</tr>
							<tr>
								<th scope="row">4</th>
								<td>Randy Mark</td>
								<td>Ottandy</td>
								<td>@mdothe</td>
								<td>user</td>
								<td>AUS</td>
							</tr>
							<tr>
								<th scope="row">5</th>
								<td>Ram Jacob</td>
								<td>Thornton</td>
								<td>@twitter</td>
								<td>admin</td>
								<td>IND</td>
							</tr>
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