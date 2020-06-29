@extends('layout.admin')

@section('cssCustom')
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.21/datatables.min.css"/>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
@endsection

@section('content')
<div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                  <h6 class="m-0 font-weight-bold text-primary">Users List</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse show" id="collapseCardExample">
                  <div class="card-body">
                    <div class="table-responsive">
		                <table class="table table-bordered table-striped" id="tbUser"  cellspacing="0">
		                  <thead>
		                    <tr>
		                      <th>No</th>
		                      <th>Name</th>
		                      <th>Email</th>
		                      <th>Role</th>
		                      <th>Action</th>
		                    </tr>
		                  </thead>
		                  <tbody>
		                  	@foreach($user as $row => $value)
			                    <tr>
			                      <td>{{ $row+1}}</td>
			                      <td>{{ $value ->name}}</td>
			                      <td>{{ $value ->email}}</td>
			                      <td>{{ $value ->role}}</td>
			                      <td>
                                            
                                     <a class="btn btn-primary " data-type="" href="#" > <i class="material-icons">edit</i></a>
                                        
                                     <button class="btn btn-danger " data-id="{{$value->id}}" data-type="D_buku"><i class="material-icons">delete</i></button>
                                  </td>
			                     
			                    </tr>
			                 @endforeach
		                  </tbody>
		                </table>
		              </div>
                  </div>
                </div>
              </div>

@endsection
@section('customJs')

 
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.21/datatables.min.js"></script>
<script type="text/javascript">
	$(document).ready( function () {
	    $('#tbUser').DataTable();
	} );
</script>
@endsection