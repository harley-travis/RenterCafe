@extends('layouts.master')

@section('content')

  <!-- ============================================================== -->
	<!-- Bread crumb and right sidebar toggle -->
	<!-- ============================================================== -->
	<div class="row page-titles">
		<div class="col-md-5 align-self-center">
			<h3 class="text-themecolor">Add Maintenance Request</h3>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
				<li class="breadcrumb-item">Maintenance</li>
                <li class="breadcrumb-item active">Add Maintenance</li>
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
                    <form action="{{ route('maintenance.add') }}" method="post">

						<div class="form-group">
                            <label for="subject">Subject</label>
                            <input type="text" class="form-control form-control-lg" id="subject" name="subject" placeholder="subject">
                        </div>

						<div class="form-group">
                            <label for="type">Type of Issue</label>
                            <select name="type" class="form-control form-control-lg">
                                <option>- Select Type</option>
                                <option value="Alarm System">Alarm System</option>
                                <option value="Appliances">Appliances</option>
                                <option value="Balcony/Patio">Balcony/Patio</option>
                                <option value="Blinds">Blinds</option>
                                <option value="Cabinets">Cabinets</option>
                                <option value="Carbon Monoxide Detectors">Carbon Monoxide Detectors</option>
								<option value="Counter Top">Counter Top</option>
								<option value="Doors">Doors</option>
								<option value="Electrical">Electrical</option>
								<option value="Fire Alarm/Fire Sprinklers/Extinguishers">Fire Alarm/Fire Sprinklers/Extinguishers</option>
								<option value="Flood">Flood</option>
								<option value="Floors/Carpet">Floors/Carpet</option>
								<option value="Garage/Carport">Garage/Carport</option>
								<option value="Garbage Disposal">Garbage Disposal</option>
								<option value="Gas Leak">Gas Leak</option>
								<option value="Glass/Windows/Screens">Glass/Windows/Screens</option>
								<option value="Hardware">Hardware</option>
								<option value="Heating/Ventilation/AC">Heating/Ventilation/AC</option>
								<option value="Landscaping/Grounds">Landscaping/Grounds</option>
								<option value="Lighting">Lighting</option>
								<option value="Locks/Keys">Locks/Keys</option>
								<option value="Paint">Paint</option>
								<option value="Pest Control">Pest Control</option>
								<option value="Plumbing">Plumbing</option>
								<option value="Roof">Roof</option>
								<option value="Smoke Detectors">Smoke Detectors</option>
								<option value="Storage Unit">Storage Unit</option>
								<option value="Toilet Problems">Toilet Problems</option>
								<option value="Tub/Shower">Tub/Shower</option>
								<option value="Other">Other</option>
                            </select>
                        </div>

						<div class="form-group">
							<label for="description">Description</label>
							<textarea class="form-control" id="description" name="description" rows="8"></textarea>
						</div>

                        <div class="form-group">
                            <label for="permission">Permission To Enter If You Are Not Home</label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="no" id="no" value="0" checked>
                                <label class="form-check-label" for="permission_no">No</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="yes" id="yes" value="1">
                                <label class="form-check-label" for="permission_yes">Yes</label>
                            </div>
                        </div>

						<div class="form-group">
                            <label for="permission">Emergency</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="no" id="no" value="0" checked>
                                <label class="form-check-label" for="emergency_no">No</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="yes" id="yes" value="1">
                                <label class="form-check-label" for="emergency_yes">Yes</label>
                            </div>
                        </div>

						<div class="form-group">
							<label for="attachment">Attach Files</label>
							<input type="file" class="form-control-file" id="attachment" name="attachment">
						</div>

						<input type="hidden" name="property_id" value="">
						<input type="hidden" name="user_id" value="">
                        <input type="hidden" name="tenant_id" value="">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" class="btn btn-success">Create Ticket</button>

                    </form>
                </div>
             </div>
        </div>
  </div>

@endsection
