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

    public function index() {
        return view('pay.overview');
    }

    public function viewOptions() { 
        return view('pay.options');
    }

    public function addPaymentOptions(Request $request) {

        // verify info

        // tenant needs account created in stripe

        // function needs to be universal for tenant and landlord

        // determine wither or not this is cc or ach account

        // retrevie the user account number

        // cc  https://stripe.com/docs/api/external_account_cards/create 
        // ach https://stripe.com/docs/api/external_account_bank_accounts/create


        // grab user instance

        // add payment method
        try {
            $account = \Stripe\Account::retrieve("");
            $account->external_accounts->create(["external_account" => "tok_visa_debit"]);
        } catch (Exception $e) {

        }
        
        // return response
        return view('pay.options')
        ->with('info', 'Good news, your payment was successful!');
    }
    

    public function viewPayment() {
        return view('pay.pay');
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
