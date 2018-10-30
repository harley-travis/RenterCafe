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
                <li class="breadcrumb-item">Payment Overview</li>
				<li class="breadcrumb-item active">Make Payment</li>
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
                   
                <form action="{{ route('pay.makePayment') }}" method="POST">

                    <!-- give option to pay with card or bank account -->
                    <!-- save payment method for next use -->
                    <!-- billing address must be included -->



                    <h3>Add Credit or Debit Card</h3>

                    <div class="form-group">
                        <label for="name_on_card">Name on Card</label>
                        <input type="text" class="form-control form-control-lg" id="name_on_card" name="name_on_card" placeholder="name on card">
                    </div>

                    <div class="form-group">
                        <label for="cc_number">Card Number</label>
                        <input type="text" class="form-control form-control-lg" id="cc_number" name="cc_number" placeholder="card number">
                    </div>

                    <div class="form-group">
                        <label for="cc_number_verify">Re-Enter Card Number</label>
                        <input type="text" class="form-control form-control-lg" id="cc_number_verify" name="cc_number_verify" placeholder="re-enter card number">
                    </div>

                    <div class="form-group">
                        <label for="exp_date">Expiration Date</label>
                        <input type="text" class="form-control form-control-lg" id="exp_mon" name="exp_mon">
                        <input type="text" class="form-control form-control-lg" id="exp_year" name="exp_year">
                    </div>

                    <div class="form-group">
                        <label for="security_number">Security Number</label>
                        <input type="text" class="form-control form-control-lg" id="security_number" name="security_number">
                    </div>


                    <hr>
                    <h3>Add ACH Account</h3>

                    <div class="form-group">
                        <label for="name_on_account">Name on Account</label>
                        <input type="text" class="form-control form-control-lg" id="name_on_account" name="name_on_account" placeholder="name on account">
                    </div>

                    <div class="form-group">
                        <label for="routing_number">Routing Number</label>
                        <input type="text" class="form-control form-control-lg" id="routing_number" name="routing_number" placeholder="routing number">
                    </div>

                    <div class="form-group">
                        <label for="account_number">Account Number</label>
                        <input type="text" class="form-control form-control-lg" id="account_number" name="account_number" placeholder="account number">
                    </div>

                    <div class="form-group">
                        <label for="account_number_verify">Re-Enter Account Number</label>
                        <input type="text" class="form-control form-control-lg" id="account_number_verify" name="account_number_verify" placeholder="re-enter account number">
                    </div>

                    <hr>
                    <h3>Billing Information</h3>

                    <div class="form-group">
                        <label for="billing_name">Name</label>
                        <input type="text" class="form-control form-control-lg" id="billing_name" name="billing_name" placeholder="billing name">
                    </div>

                    <div class="form-group">
                        <label for="address_1">Address Line 1</label>
                        <input type="text" class="form-control form-control-lg" id="address_1" name="address_1" placeholder="address line 1">
                    </div>

                    <div class="form-group">
                        <label for="address_2">Address Line 2</label>
                        <input type="text" class="form-control form-control-lg" id="address_2" name="address_2" placeholder="address line 2">
                    </div>

                    <div class="form-group">
                        <label for="city">City</label>
                        <input type="text" class="form-control form-control-lg" id="city" name="city" placeholder="city">
                    </div>

                    <div class="form-group">
                        <label for="state">State/Province/Region</label>
                        <input type="text" class="form-control form-control-lg" id="state" name="state" placeholder="state">
                    </div>

                    <div class="form-group">
                        <label for="zip">Zip Code</label>
                        <input type="text" class="form-control form-control-lg" id="zip" name="zip" placeholder="zip">
                    </div>

                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="text" class="form-control form-control-lg" id="phone" name="phone" placeholder="phone">
                    </div>


                    <span>I agree to the terms of service</span><br>

                    <button type="submit" class="btn btn-success">Pay Rent</button>
                    
                </form>
					
				</div><!-- card-body -->
			</div><!-- card -->
		</div><!-- col-12 -->
	</div><!-- row -->

@endsection
