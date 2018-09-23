@extends('layouts.master')

@section('content')

  <!-- ============================================================== -->
	<!-- Bread crumb and right sidebar toggle -->
	<!-- ============================================================== -->
	<div class="row page-titles">
		<div class="col-md-5 align-self-center">
			<h3 class="text-themecolor">Edit Tenant</h3>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
				<li class="breadcrumb-item">Tenant</li>
                <li class="breadcrumb-item active">Edit Tenant</li>
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
                    <form action="{{ route('tenants.update') }}" method="post">

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control form-control-lg" id="name" name="name" value="{{$tenant->name}}">
                        </div>

                        <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <input type="text" class="form-control form-control-lg" id="phone" name="phone" value="{{$tenant->phone}}">
                        </div>

                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <input type="email" class="form-control form-control-lg" id="email" name="email" value="{{$tenant->email}}">
                        </div>

                        <!-- MIGHT WANT TO INCLUDE
                            ______________________
                            
                            1) Rental agreement signeda
                            2) Background check status
                            3) Credit check status
                            4) NOTES

                        --> 

                         @if($tenant->renting === 0)

                        <div class="form-group">
                            <label for="renting">Is the {{$tenant->name}} still renting?</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="renting" id="yes" value="{{$tenant->renting}}" checked>
                                <label class="form-check-label" for="yes">Yes</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="renting" id="no" value="1">
                                <label class="form-check-label" for="no">No</label>
                            </div>
                        </div>

                        @elseif ($tenant->renting === 1)

                        <div class="form-group">
                            <label for="renting">Is the {{$tenant->name}} still renting?</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="renting" id="yes" value="0">
                                <label class="form-check-label" for="yes">Yes</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="renting" id="no" value="{{$tenant->renting}}" checked>
                                <label class="form-check-label" for="no">No</label>
                            </div>
                        </div>

                        @endif

                        <div class="form-group">
                            <label for="property">Property</label>
                            <select id="property_id" name="property_id" class="form-control form-control-lg">
                            @foreach($properties as $property)
                            <option {{ $tenant->property_id == $property->id ? 'selected':'' }}  value='{{$property->id}}'> 
                                {{ $property->address_1 }} {{ $property->address_2 }}
                            </option>
                            @endforeach
                        </div>                      

                        <input type="hidden" name="id" value="{{ $tenant_id }}">   
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" class="btn btn-success">Save Tenant</button>

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
