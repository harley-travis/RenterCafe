@extends('layouts.master')

@section('content')
	<!-- ============================================================== -->
	<!-- Bread crumb and right sidebar toggle -->
	<!-- ============================================================== -->
	<div class="row page-titles">
		<div class="col-md-5 align-self-center">
			<h3 class="text-themecolor">Positions</h3>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
				<li class="breadcrumb-item active">Property Overview</li>
			</ol>
		</div>
		<div class="col-md-7 align-self-center">
			<a href="{{ route('property.create') }}" class="btn waves-effect waves-light btn-success">Add Property</a>
		</div>
	</div>
	<!-- ============================================================== -->
	<!-- End Bread crumb and right sidebar toggle -->
	<!-- ============================================================== -->

	@if(Session::has('info'))
		<div class="alert alert-success" role="alert">
			<h4 class="alert-heading">Success!</h4>
			<p>{{ Session::get('info') }}</p>
		</div>
	@endif

	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-body">

					<div class="table-responsive">
						<table class="table table-hover">
							<thead>
                            	<tr>
									<th>Action</th>
									<th>Property ID</th>
									<th>Address</th>
                                    <th>State</th>
									<th>Vacancy</th>
									<th>Rent Amount</th>
									<th>Lease Length</th>
									<th>Edit Property</th>
                                    <th>Delete Property</th>
								</tr>
							</thead>
							<tbody>
								@foreach($properties as $property)
									<tr>
										<td>
											<div class="form-group">
												<div class="checkbox checkbox-success">
													<input id="checkbox-{{$property->id}}" type="checkbox">
													<label for="checkbox-{{$property->id}}">  </label>
												</div>
											</div>
										</td>
										<td>{{ $property->id}}</td>
										<td>{{ $property->address_1 }} {{ $property->address_2 }}</td>
                                        <td>{{ $property->state }}</td>
										<td>{{ $property->occupied}}</td>
										<td>${{ $property->rent_amount}}</td>
                                        <td>{{ $property->lease_length}}</td>
										<td><a href="{{ route('property.edit', ['id' => $property->id ]) }}" class="btn waves-effect waves-light btn-info">Edit property</a></td> 
										<td><a href="{{ route('property.delete', ['id' => $property->id ]) }}" class="btn waves-effect waves-light btn-danger">Archive property</a></td>
									</tr>
								@endforeach
								
							</tbody>
						</table>
					</div><!-- table-responsive -->
				</div><!-- card-body -->
			</div><!-- card -->
		</div><!-- col-12 -->
	</div><!-- row -->


	<div class="pagination-wrapper">
		{{ $properties->links() }}
	</div>

@endsection
