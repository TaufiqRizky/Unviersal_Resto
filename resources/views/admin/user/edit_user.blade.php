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
                  <h6 class="m-0 font-weight-bold text-primary">Form Edit User</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse show" id="collapseCardExample">
                  <div class="card-body">
                  	<center>
                  		
                  		<h3>Please Fill out This Form To Edit New User </h3>
                  		
                  	<img style="margin: 20px;" class="img-profile rounded-circle" src="{{url('asset/img/add_user3.png')}}">
                  		
                  	</center>
                    {!! csrf_field() !!}
                    <div class="row">
                    	<div class="form-group col-md-6">
							<label for="name">Display Name</label>
							<input type="text" class="form-control" id="name"  placeholder="Enter your full name.." value="{{$user->name}}">
						  </div>
						  <div class="form-group col-md-6">
								<label for="exampleInputEmail1">Email address </label>
								<input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" value="{{$user->email}}">
								<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
						  </div>
                    </div>
                     
					  

					  <div class="form-group">
						  <label for="role">Roles</label>
						  <select class="form-control show-tick" id="role" >
                               <option value="">-- Select a Role --</option>
                               @foreach($role as $row => $value)
                               		@if($value->id == $id_role)
                               			<option value="{{$value->id}}" selected="selected">{{$value->role}}</option>
                               		@else
                               			<option value="{{$value->id}}" >{{$value->role}}</option>
                               		@endif
                               @endforeach
                          </select>
					  </div>
								  
                      <div class="form-group">
                           <input type="checkbox" id="robot" name="checkbox">
                            <label for="checkbox">Saya Bukan Robot</label>
                       </div>
                          <button class="btn btn-primary  btn_submit" data-type="prompt">Simpan</button>
                  </div>
                </div>
              </div>

@endsection
@section('customJs')

	<script type="text/javascript">
		var id;
		$(document).ready( function () {
		  id= {{$user->id}};
		    console.log(id);
		    
		});
		
		$( ".btn_submit" ).click(function() {
			if ($('#name').val()=="" || $('#role').val()=="" || $('#email').val()=="") {
				Swal.fire(
					      'Warning!',
					      "Please check again your data, make sure you've fill out all form",
					      'warning'
					    );
			}else if ($("#robot").prop('checked') == false) {
				Swal.fire(
					      'Beep Beep Beep',
					      "Hey Robot Fuck off!!",
					      'warning'
					    );
			}else{

				$.ajax({
	                url:"../update/"+id,
	                type:'POST',
	                headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') },
	                data:{nama:$('#name').val(),email:$('#email').val(),role:$('#role').val()},
	                success: function (data) {
	                   Swal.fire({
						 
						  icon: 'success',
						  title: 'Your work has been saved',
						  showConfirmButton: false,
						  timer: 1500
						});
	                   window.location.href = "{{ route('admin.user.list')}}";
	                  

	                    },
	                    error: function (data) {
	                         swalWithBootstrapButtons.fire(
						      'Gagal!',
						      'Failed to delete your file.',
						      'error'
						    );
	                    }
	            });
			}

		});
	</script>
@endsection