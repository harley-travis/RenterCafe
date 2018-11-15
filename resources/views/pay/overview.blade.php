@extends('layouts.master')

@section('content')
	<!-- ============================================================== -->
	<!-- Bread crumb and right sidebar toggle -->
	<!-- ============================================================== -->
	<div class="row page-titles">
		<div class="col-md-5 align-self-center">
			<h3 class="text-themecolor">Pay Bill</h3>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
				<li class="breadcrumb-item active">Payment Overview</li>
			</ol>
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

				@foreach($properties as $property)

					@money($property->rent_amount)			


                    Novemeber 2018 Statment<br>
                     <br>
					 <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#paymentModal">
						Make Payment
					</button>

					<!-- Payment Modal -->
					<div class="modal fade" id="paymentModal" tabindex="-1" role="dialog" aria-labelledby="paymentModal" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="paymentModal">MONTH RENT DUE</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
								
									<form action="{{ route('pay.payRent') }}" method="POST">

										<div class="row">
											<div class="col-md-6 left">
												January 1
											</div>
											<div class="col-md-6 right">
												<span class="text-success">@money($property->rent_amount)</span>
											</div>
										</div>

										@foreach($stripeData as $stripe)
										 <div class="form-group">
											<label for="renting"></label>
											<div class="form-check form-check-inline">
												<input class="form-check-input" type="radio" name="renting" id="yes" value="" checked>
												<label class="form-check-label" for="yes">Default Payment XXXX XXXX XXXX {{$stripe}}</label>
											</div><br>
											<div class="form-check form-check-inline">
												<input class="form-check-input" type="radio">
												<label class="form-check-label" for="add new"><a href="{{ route('pay.options') }}">Add New</a></label>
											</div>
										</div>
										@endforeach
					
										<div class="form-group">
											<div class="checkbox checkbox-success">
												<input id="checkbox" type="checkbox" name="agree">  
												<label for="checkbox"> I agree to the <a href="#" target="_blank">terms of service</a></label>
											</div>
										</div>

										<input type="hidden" name="_token" value="{{ csrf_token() }}">
										<input type="hidden" name="landlord" value="{{ $property->user_id }}">
										<input type="hidden" name="amount" value="{{ $property->rent_amount }}">

								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-lg btn-success full-length">Pay @money($property->rent_amount)</button>
									</form>
								</div>
							</div>
						</div>
					</div>





					
					@endforeach
				</div><!-- card-body -->
			</div><!-- card -->
		</div><!-- col-12 -->
	</div><!-- row -->

@endsection
