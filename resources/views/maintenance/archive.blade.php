@extends('layouts.master')

@section('content')
	<!-- ============================================================== -->
	<!-- Bread crumb and right sidebar toggle -->
	<!-- ============================================================== -->
	<div class="row page-titles">
		<div class="col-md-5 align-self-center">
			<h3 class="text-themecolor">Archvived Maintenance Requests</h3>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
				<li class="breadcrumb-item active">Archived Maintenance Overview</li>
			</ol>
		</div>
		<div class="col-md-7 align-self-center">
			<a href="{{ route('maintenance.overview') }}" class="btn waves-effect waves-light btn-success">View Active Requests</a>
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
									<th>ID</th>
									<th>Type</th>
									<th>Subject</th>
                                    <th>Status</th>
									<th>Property</th>
									<th>Reported</th>
									<th>View Request</th>
								</tr>
							</thead>
							<tbody>
								@foreach($requests as $request)
									<tr>
										<td>{{ $request->id }}</td>
										<td>{{ $request->type }}</td>
										<td>{{ $request->subject }}</td>
										<td>
											@if($request->status === 0)
												<span>Pending</span>
											@elseif ($request->status === 1)
												<span>In Progress</span>
											@elseif ($request->status === 2)
												<span>Completed</span>
											@endif
										</td>
										<td>{{$request->property->address_1}}</td>
										<td>{{ $request->created_at }}</td>
										<td><a href="{{ route('maintenance.view', ['id' => $request->id ]) }}" class="btn waves-effect waves-light btn-info">View Request</a></td>
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
		
	</div>

@endsection
