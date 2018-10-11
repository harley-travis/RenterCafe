@extends('layouts.master')

@section('content')

  <!-- ============================================================== -->
	<!-- Bread crumb and right sidebar toggle -->
	<!-- ============================================================== -->
	<div class="row page-titles">
		<div class="col-md-5 align-self-center">
			<h3 class="text-themecolor">View Maintenance Request</h3>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
				<li class="breadcrumb-item">Maintenance</li>
                <li class="breadcrumb-item active">View Maintenance Request</li>
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

					<div class="form-group">
						<h1>{{$request->subject}}</h1>
						<span><b>Property:</b> 	@foreach($properties as $property) {{$property->address_1}} @endforeach</span><br>
						<span><b>Reported:</b> {{$request->created_at}}</span><br>
						<span><b>Tenant:</b> {{$request->tenant->name}} | {{$request->tenant->phone}}</span><br>
						<span><b>Status:</b>
							@if($request->status === 0)
								<span class="text-warning">Pending</span>
						   	@elseif ($request->status === 1)
						   		<span class="text-primary">In Progress</span>
						   	@elseif ($request->status === 2)
						   		<span class="text-success">Completed</span>
						   @endif
						</span>
					</div>

					<div class="form-group">
						<label for="description">Description</label>
						<h4>{{$request->description}}</h4>
					</div>

					<div class="form-group">
						<label for="type">Type</label>
						<input type="text" class="form-control form-control-lg" id="type" name="type" value="{{$request->type}}">
					</div>

					<form action="{{ route('maintenance.update') }}" method="post">

						<div class="form-group">
                            <label for="status">Status Update</label>
                            <select name="status" class="form-control form-control-lg">

								<option>- Update Status -</option>
								<option value="0">Pending</option>
								<option value="1">In Progress</option>
								<option value="2">Completed</option>

                        </div> 

						<input type="hidden" name="id" value="{{$request->id}}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">


					<h3>Attachments</h3>
					<!-- TODO: need to upload attachments from the tenenat and display them here. download them not display them -->
					
					
						<button type="submit" class="btn btn-success">Update Status</button>

					</form>
                    
                </div>
             </div>
        </div>
  </div>

@endsection
