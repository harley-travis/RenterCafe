@extends('layouts.master')

@section('content')
	<!-- ============================================================== -->
	<!-- Bread crumb and right sidebar toggle -->
	<!-- ============================================================== -->
	<div class="row page-titles">
		<div class="col-md-5 align-self-center">
			<h3 class="text-themecolor">Settings</h3>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
				<li class="breadcrumb-item active">Settings Overview</li>
			</ol>
		</div>
	</div>
	<!-- ============================================================== -->
	<!-- End Bread crumb and right sidebar toggle -->
	<!-- ============================================================== -->

	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-body">
                    <p><b>IMPORTANT</b> You will not be able to accept payment until you add your banking information. This information is secure and protected.</p>
                    <a href="{{ route('settings.addBilling') }}" class="btn btn-success">+ Add Billing Information</a>
					
				</div><!-- card-body -->
			</div><!-- card -->
		</div><!-- col-12 -->
	</div><!-- row -->

@endsection
