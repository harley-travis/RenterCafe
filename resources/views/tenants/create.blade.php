@extends('layouts.master')

@section('content')

  <!-- ============================================================== -->
	<!-- Bread crumb and right sidebar toggle -->
	<!-- ============================================================== -->
	<div class="row page-titles">
		<div class="col-md-5 align-self-center">
			<h3 class="text-themecolor">Add Tenant</h3>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
				<li class="breadcrumb-item">Tenant</li>
                <li class="breadcrumb-item active">Add Tenant</li>
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
                    <form action="{{ route('tenants.add') }}" method="post">

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control form-control-lg" id="name" name="name" placeholder="name">
                        </div>

                        <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <input type="text" class="form-control form-control-lg" id="phone" name="phone" placeholder="phone">
                        </div>

                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <input type="email" class="form-control form-control-lg" id="email" name="email" placeholder="email">
                        </div>

                        <!-- MIGHT WANT TO INCLUDE
                            ______________________
                            
                            1) Rental agreement signed
                            2) Background check status
                            3) Credit check status

                        --> 

                       
                        <div class="form-group">
                            <label for="property">Property</label>
                            <select id="property_id" name="property_id" class="form-control form-control-lg">
                            <option>Select Property</option>
                            @foreach($properties as $property)
                            <option value="{{ $property->id }}">{{ $property->address_1 }} {{ $property->address_2 }}</option>
                            @endforeach
                        </div>
                        

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
