@extends('layouts.master')

@section('content')
	<!-- ============================================================== -->
	<!-- Bread crumb and right sidebar toggle -->
	<!-- ============================================================== -->
	<div class="row page-titles">
		<div class="col-md-5 align-self-center">
			<h3 class="text-themecolor">Tenants</h3>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
				<li class="breadcrumb-item active">Tenants Overview</li>
			</ol>
		</div>
		<div class="col-md-7 align-self-center">
			<a href="{{ route('tenants.create') }}" class="btn waves-effect waves-light btn-success">Add Tenant</a>
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
									<th>Name</th>
                                    <th>Phone</th>
									<th>Email</th>
									<th>Balance Due</th>
									<th>Property</th>
									<th>Edit Tenant</th>
                                    <th>Delete Tenant</th>
								</tr>
							</thead>
							<tbody>
								@foreach($tenants as $tenant)
									<tr>
										<td>
											<div class="form-group">
												<div class="checkbox checkbox-success">
													<input id="checkbox-{{$tenant->id}}" type="checkbox">
													<label for="checkbox-{{$tenant->id}}">  </label>
												</div>
											</div>
										</td>
										<td>{{ $tenant->name }}</td>
                                        <td>{{ $tenant->phone }}</td>
										<td>{{ $tenant->email }}</td>
										<td>${{ $tenant->balance }}</td>
                                        <td>{{ $tenant->property['address_1']}}</td>
										<td><a href="{{ route('tenants.edit', ['id' => $tenant->id ]) }}" class="btn waves-effect waves-light btn-info">Edit Tenant</a></td> 
										<td><a href="#" class="btn waves-effect waves-light btn-danger" data-toggle="modal" data-target="#deleteModal-{{$tenant->id}}" value="{{$tenant->id}}">Delete Tenant</a></td>
									</tr>

									<!-- Confirm Delete Modal -->
									<div class="modal fade" id="deleteModal-{{$tenant->id}}" tabindex="-1" role="dialog" aria-labelledby="deleteModal-{{$tenant->id}}" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="deleteModal-{{$tenant->id}}">Delete Tenant</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<div class="modal-body">
												Are You Sure You Want To Delete This Tenant?
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-success" data-dismiss="modal">Nah, Don't Delete</button>
												<a href="{{ route('tenants.delete', ['id' => $tenant->id ]) }}" class="btn btn-danger">Delete Tenant</a>
											</div>
											</div>
										</div>
									</div>

								@endforeach
								
							</tbody>
						</table>
					</div><!-- table-responsive -->
				</div><!-- card-body -->
			</div><!-- card -->
		</div><!-- col-12 -->
	</div><!-- row -->


	<div class="pagination-wrapper">
	    {{ $tenants->links() }}
	</div>

@endsection
