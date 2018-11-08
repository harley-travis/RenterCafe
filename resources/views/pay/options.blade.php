@extends('layouts.master')

@section('content')
	<!-- ============================================================== -->
	<!-- Bread crumb and right sidebar toggle -->
	<!-- ============================================================== -->
	<div class="row page-titles">
		<div class="col-md-5 align-self-center">
			<h3 class="text-themecolor">Payment Options</h3>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
				<li class="breadcrumb-item active">Payment Options</li>
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

                <div class="accordion" id="accordionExample">
                    <div class="card">
                        <div class="card-header" id="headingOne">
                        <h5 class="mb-0">
                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Add Credit Card or Debit Card
                            </button>
                        </h5>
                        </div>

                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                        <div class="card-body">
                            <form action="{{ route('pay.addCreditCard') }}" method="post" id="payment-form">
                                <div class="form-row">
                                    <label for="card-element">
                  
                                    </label>

                                    <div class="form-group">
                                        <label for="name">Name on Card</label>
                                        <input type="text" class="form-control form-control-lg" id="name" name="name" placeholder="name on card">
                                    </div>

                                    <div class="form-group">
                                        <label for="card_number">Card Number</label>
                                        <input type="text" class="form-control form-control-lg" id="card_number" name="card_number" placeholder="card number">
                                    </div>

                                    <div class="form-group">
                                        <label for="card_number_verify">Re-Enter Card Number</label>
                                        <input type="text" class="form-control form-control-lg" id="card_number_verify" name="card_number_verify" placeholder="re-enter card number">
                                    </div>

                                    <div class="form-group">
                                        <label for="exp_month">Exp Month</label>
                                        <input type="text" class="form-control form-control-lg" id="exp_month" name="exp_month" placeholder="exp month">
                                    </div>

                                    <div class="form-group">
                                        <label for="exp_year">Exp Year</label>
                                        <input type="text" class="form-control form-control-lg" id="exp_year" name="exp_year" placeholder="exp year">
                                    </div>

                                    <div class="form-group">
                                        <label for="cvc">CVC</label>
                                        <input type="text" class="form-control form-control-lg" id="cvc" name="cvc" placeholder="cvc">
                                    </div>
                                   
                                </div>

                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <button class="btn btn-success">Save Payment Method</button>
                            </form>   
                        </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingTwo">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Add Bank Account or ACH
                            </button>
                        </h5>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                        <div class="card-body">
                            <form action="{{ route('pay.addBankAccount') }}" method="post" id="payment-form">
                                <div class="form-row">
                                    <label for="card-element">
         
                                    </label>

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
                                
                                </div>
                                
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <button class="btn btn-success">Save Payment Method</button>
                            </form>
                        </div>
                        </div>
                    </div>

                </div>

				</div><!-- card-body -->
			</div><!-- card -->
		</div><!-- col-12 -->
	</div><!-- row -->

    <script>
        // Create a Stripe client.
        var stripe = Stripe('{{config('services.stripe.key')}}');

        // Create an instance of Elements.
        var elements = stripe.elements();

        // Custom Styling
        var style = {
            base: {
                color: '#32325d',
                lineHeight: '24px',
                fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                fontSmoothing: 'antialiased',
                fontSize: '16px',
                '::placeholder': {
                    color: '#aab7c4'
                }
            },
            invalid: {
                color: '#fa755a',
                iconColor: '#fa755a'
            }
        };

        // Create an instance of the card Element
        var card = elements.create('card', {style: style});

        // Add an instance of the card Element into the `card-element` <div>
        card.mount('#card-element');

        // Handle real-time validation errors from the card Element.
        card.addEventListener('change', function(event) {
            var displayError = document.getElementById('card-errors');
        if (event.error) {
                displayError.textContent = event.error.message;
            } else {
                displayError.textContent = '';
            }
        });

        // Handle form submission
        var form = document.getElementById('payment-form');
        form.addEventListener('submit', function(event) {
            event.preventDefault();
        stripe.createToken(card).then(function(result) {
                if (result.error) {
                    // Inform the user if there was an error
                    var errorElement = document.getElementById('card-errors');
                    errorElement.textContent = result.error.message;
                } else {
                    stripeTokenHandler(result.token);
                }
            });
        });

        // Send Stripe Token to Server
        function stripeTokenHandler(token) {

            // Insert the token ID into the form so it gets submitted to the server
            var form = document.getElementById('payment-form');

            // Add Stripe Token to hidden input
            var hiddenInput = document.createElement('input');
            hiddenInput.setAttribute('type', 'hidden');
            hiddenInput.setAttribute('name', 'stripeToken');
            hiddenInput.setAttribute('value', token.id);
            form.appendChild(hiddenInput);

            //alert(token.id)
             // Submit form
            form.submit();
        }
    </script>

@endsection
