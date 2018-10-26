<?php

namespace App\Http\Controllers;
use Validator;
use Auth;
use Illuminate\Http\Request;
use App\Http\Requests;
use Cartalyst\Stripe\Stripe;
use Stripe\Error\Card;
use Rap2hpoutre\LaravelStripeConnect\StripeConnect;

class PayController extends Controller {

    public function grabBruce() {
        //$customer = \Stripe\Customer::retrieve("cus_DmXPOCFyOuNjN3");
        $customer = $stripe->customers()->find('cus_DmXPOCFyOuNjN3');
        return view('settings.overview', ['customer' => $customer]);
    }

    // view past transactions by tenant
    public function tenantViewPaymentHistory() {
        
    }

    // view all transactions for all tenants related to admin
    public function adminViewAllPayments() {

    }

    // count number of properties admin has. send to monthly charge
    public function calculateNumberProperties() {

    }

    // monthly charge to go through
    public function adminMonthlyCharge() {

    }

    // tenant pay bill online
    public function payRent() {

    }

    // tenant setup payment options
    public function tenantSetupPayment() {

    }

    // tenant update payment options
    public function tenantUpdatePayment() {

    }

    // admin setup payment options
    public function adminSetupPayment() {

        // we need our customer ID and find the strpie id

        $customer = \Stripe\Customer::retrieve(auth()->user()->stripeId);
        $customer->sources->create(array("source" => "btok_1DKybjEcG3v3qbxWmdTgANkX"));

    }

    // admin update payment options
    public function adminUpdatePayment() {

    }

    // setup automatic paymentsd
    public function tenantSetupAutoPay() {

    }

    // cancel payment at the end of the lease agreement
    public function endLeaseSubscription() {
        // based on admins actions to remove tenant from property
        // will cease billing
    }

    // figure out how admin issues refund

    // need to create user in stripe and add it to the users table

    // figoure out what to do with taxes | need to know if i have to set this up
    // https://stripe.com/docs/billing/subscriptions/taxes

    // setup 2 week trial period
    // https://stripe.com/docs/billing/subscriptions/trials 

    /**
     * SETUP STRIPE BILLING
     * 
     * we create one pkg. 5 properties for $10/mon
     * 
     * calcuate to see if the admin has more than 5 propeties. 
     * if they have more than 5. count the difference and for each property charge $1
     * 
     * formula would be:
     * N = number of properties
     * $e = n + 5
     * 
     * 
     */
    
}
