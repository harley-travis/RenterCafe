@extends('layouts.master')

@section('content')

  <!-- ============================================================== -->
	<!-- Bread crumb and right sidebar toggle -->
	<!-- ============================================================== -->
	<div class="row page-titles">
		<div class="col-md-5 align-self-center">
			<h3 class="text-themecolor">Add Position</h3>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
				<li class="breadcrumb-item">Property</li>
                <li class="breadcrumb-item active">Add Property</li>
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
                    <form action="{{ route('property.add') }}" method="post">

                        <div class="form-group">
                            <label for="address_1">Address 1</label>
                            <input type="text" class="form-control form-control-lg" id="address_1" name="address_1" placeholder="adddress 1">
                        </div>

                        <div class="form-group">
                            <label for="address_2">Address 2</label>
                            <input type="text" class="form-control form-control-lg" id="address_2" name="address_2" placeholder="adddress 2">
                        </div>

                        <div class="form-group">
                            <label for="city">City</label>
                            <input type="text" class="form-control form-control-lg" id="city" name="city" placeholder="city">
                        </div>

                        <!-- TODO: find a list of states to loop -->
                        <div class="form-group">
                            <label for="state">State</label>
                            <input type="text" class="form-control form-control-lg" id="state" name="state" placeholder="state">
                        </div>

                        <div class="form-group">
                            <label for="zip">Zip Code</label>
                            <input type="text" class="form-control form-control-lg" id="zip" name="zip" placeholder="zip code">
                        </div>

                        <!-- TODO: find a list of countries to loop -->
                        <div class="form-group">
                            <label for="country">Country</label>
                            <input type="text" class="form-control form-control-lg" id="country" name="country" placeholder="country">
                        </div>

                        <div class="form-group">
                            <label for="vacany">Vacancy</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="occupied" id="occupied_yes" value="0" checked>
                                <label class="form-check-label" for="occupied_yes">No</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="occupied" id="occupied_no" value="1">
                                <label class="form-check-label" for="occupied_no">Yes</label>
                            </div>
                        </div>  

                        <!-- TODO: create a custom date range -->
                        <div class="form-group">
                            <label for="duration">Lease Length</label>
                            <select name="lease_length" class="form-control form-control-lg">
                                <option value="0">Month To Month</option>
                                <option value="3">3</option>
                                <option value="6">6</option>
                                <option value="8">8</option>
                                <option value="10">10</option>
                                <option value="18">18</option>
                                <option value="24">24</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="rent_amount">Rent Amount</label>
                            <input type="text" class="form-control form-control-lg" id="rent_amount" name="rent_amount" placeholder="rent amount">
                        </div>

                        <div class="form-group">
                            <label for="pet">Pets Allowed</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="pet" id="pet_yes" value="0" checked>
                                <label class="form-check-label" for="pet_no">No</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="occupied" id="pet_no" value="1">
                                <label class="form-check-label" for="pet_yes">Yes</label>
                            </div>
                        </div>

                        <!-- todo: loop through assigned tenants -->
                        <div class="form-group">
                            <label for="tenant_id">Add Tenant</label>
                            <select name="tenant_id" class="form-control form-control-lg">
                                <option>- Select Tenant -</option>
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                            </select>
                        </div>  

                        <input type="hidden" name="repair_id" value="">
                        <input type="hidden" name="maintenance_id" value="">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" class="btn btn-success">Save Property</button>

                    </form>
                </div>
             </div>
        </div>
  </div>

<!-- todo: style the tabs section -->
<style>
.nav-tabs .nav-link.active {
    background-color: #eee;
    border-color: transparent;
}
#myTabContent {
    background: #EEE !important;
    padding: 20PX;
}
</style>


@endsection
