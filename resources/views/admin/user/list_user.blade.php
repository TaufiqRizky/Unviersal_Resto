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
                  	<div class="col-md-12 ">
                  		<div style="float: right; margin-bottom: 20px" class="list-button"></div>
                  	</div>
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
			                    <tr class="itemUser{{$value->id}}">
			                      <td>{{ $row+1}}</td>
			                      <td>{{ $value ->name}}</td>
			                      <td>{{ $value ->email}}</td>
			                      <td>{{ $value ->role}}</td>
			                      <td class="js-sweetalert">
                                            
                                     <a class="btn btn-primary " data-type="" href="{{ url('admin/user/edit/'.$value->id) }}" > <i class="material-icons">edit</i></a>
                                        
                                     <button class="btn btn-danger " data-id="{{$value->id}}" data-type="D_user"><i class="material-icons">delete</i></button>
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
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.bootstrap4.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.colVis.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.flash.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript">
	$(document).ready( function () {
	     var codeListTable = $('#tbUser').DataTable();
	     new $.fn.dataTable.Buttons(codeListTable, {
        buttons: [
          {
            extend: 'csv',
            text: '<i class="fa fa-file"></i> CSV',
            titleAttr: 'CSV',
            className: 'btn btn-primary btn-sm',
            init: function(api, node, config) {
              $(node).removeClass('btn-default btn-secondary')
            },
            exportOptions: {
              columns: ['0', '1', '2', '3']
            }
          },
          {
            extend: 'excelHtml5',
            text: '<i class="fa fa-file-excel"></i> Excel',
            titleAttr: 'Excel',
            className: 'btn btn-primary btn-sm',
            init: function(api, node, config) {
              $(node).removeClass('btn-default btn-secondary')
            },
            exportOptions: {
              columns: ['0', '1', '2', '3']
            }
          },
          {
            extend: 'pdf',
            text: '<i class="fa fa-file-pdf"></i> PDF',
            titleAttr: 'pdfHtml5',
            className: 'btn btn-primary btn-sm',
            init: function(api, node, config) {
              $(node).removeClass('btn-default btn-secondary')
            },
            exportOptions: {
              columns: ['0', '1', '2', '3']
            }
          },
          {
            extend: 'print',
            text: '<i class="fa fa-print"></i> Print',
            titleAttr: 'Print',
            className: 'btn btn-primary btn-sm',
            init: function(api, node, config) {
              $(node).removeClass('btn-default btn-secondary')
            },
            exportOptions: {
              columns: ['0', '1', '2', '3']
            }
          },
        ]
      });
      codeListTable.buttons().container().appendTo('.list-button');

	    var id;

	} );
	function Delete_User(id) {
		const swalWithBootstrapButtons = Swal.mixin({
		  customClass: {
		    confirmButton: 'btn btn-success',
		    cancelButton: 'btn btn-danger'
		  },
		  buttonsStyling: false
		})

		swalWithBootstrapButtons.fire({
		  title: 'Are you sure?',
		  text: "You won't be able to revert this!",
		  icon: 'warning',
		  showCancelButton: true,
		  confirmButtonText: 'Yes, delete it!',
		  cancelButtonText: 'No, cancel!',
		  reverseButtons: true
		}).then((result) => {
		  if (result.value) {
		  	$.ajax({
	                url:"list/"+id,
	                type:'DELETE',
	                headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') },
	                data:{id:id},
	                success: function (data) {
	                   swalWithBootstrapButtons.fire(
					      'Deleted!',
					      'Your file has been deleted.',
					      'success'
					    );
	                   $('.itemUser'+id).fadeOut(1500, function(){ $(this).remove();});

	                    },
	                    error: function (data) {
	                         swalWithBootstrapButtons.fire(
						      'Gagal!',
						      'Failed to delete your file.',
						      'error'
						    );
	                    }
	            });
		    
		  } else if (
		    
		    result.dismiss === Swal.DismissReason.cancel
		  ) {
		    swalWithBootstrapButtons.fire(
		      'Cancelled',
		      'Your imaginary file is safe :)',
		      'error'
		    )
		  }
		});
    
	    
	}
	$('.js-sweetalert button').on('click', function () {
	        var type = $(this).data('type');
	         id=$(this).data('id');
	         console.log(id);
	         console.log(type);
	         if (type === 'D_user') {
	            Delete_User(id);
	        }
	     });
	
</script>
@endsection