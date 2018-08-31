@extends('layouts.master')

@section('content')
	<!-- ============================================================== -->
	<!-- Bread crumb and right sidebar toggle -->
	<!-- ============================================================== -->
	<div class="row page-titles">
		<div class="col-md-5 align-self-center">
			<h3 class="text-themecolor">Dashboard</h3>
			<ol class="breadcrumb">
				<li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
			</ol>
		</div>
		<div class="col-md-7 align-self-center">
			
		</div>
	</div>
	<!-- ============================================================== -->
	<!-- End Bread crumb and right sidebar toggle -->
	<!-- ============================================================== -->

	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-body">

					<div class="total-jobs">
						
					</div>

					<div class="table-responsive">
						<table class="table">
							<thead>
								<tr>
									<th>Action</th>
									<th>Job ID</th>
									<th>Position</th>
									<th>Department</th>
									<th>Location</th>
									<th>Edit Position</th>
									<th>Archive Position</th>
								</tr>
							</thead>
							<tbody>
																
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
