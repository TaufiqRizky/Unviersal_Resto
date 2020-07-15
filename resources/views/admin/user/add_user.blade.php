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
                  <h6 class="m-0 font-weight-bold text-primary">Form Add User</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse show" id="collapseCardExample">
                  <div class="card-body">
                  	<center>
                  		<h3>Please Fill out This Form To Add New User</h3>
                  	<img style="margin: 20px;" class="img-profile rounded-circle" src="{{url('asset/img/add_user3.png')}}">
                  		
                  	</center>
                    {!! csrf_field() !!}
                    <div class="row">
                    	<div class="form-group col-md-6">
							<label for="name">Display Name</label>
							<input type="text" class="form-control" id="name"  placeholder="Enter your full name..">
						  </div>
						  <div class="form-group col-md-6">
								<label for="exampleInputEmail1">Email address</label>
								<input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
								<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
						  </div>
                    </div>
                     <div class="row">
                      <div class="form-group col-md-6">
						  <label for="password">Password</label>
						  <input type="password" class="form-control" id="password" placeholder="Password">
					  </div>
					  <div class="form-group col-md-6">
						  <label for="kpassword">Confirm Password</label>
						  <input type="password" class="form-control" id="kpassword" placeholder="please type the same password">
						  <small id="pass_error"  class="" style="color: red;">Password didn't match please check again</small>
						  <small id="pass_done"  class="" style="color: green;">Password match! , thanks :)</small>
					  </div>
                    </div>
					  

					  <div class="form-group">
						  <label for="role">Roles</label>
						  <select class="form-control show-tick" id="role" >
                               <option value="">-- Select a Role --</option>
                               @foreach($role as $row => $value)
                               <option value="{{$value->id}}">{{$value->role}}</option>
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
		$(document).ready( function () {
		    $('#pass_error').hide();
		    $('#pass_done').hide();

		    
		});
		$( "#kpassword" ).keyup(function() {
			if ($(this).val() != $('#password').val()) {
				$('#pass_error').show();
				$('#pass_done').hide();
				$('.btn_submit').attr("disabled", true);
			}else{
		   		$('#pass_done').show();
				$('.btn_submit').attr("disabled", false);
		   		$('#pass_error').hide();


			}
		  
		});
		$( ".btn_submit" ).click(function() {
			if ($('#name').val()=="" || $('#role').val()=="" || $('#password').val()=="" || $('#email').val()=="") {
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
	                url:"add/store",
	                type:'POST',
	                headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') },
	                data:{nama:$('#name').val(),email:$('#email').val(),pass:$('#password').val(),role:$('#role').val()},
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