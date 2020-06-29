@extends('layout.admin')
@section('cssCustom')
	<style type="text/css">
		.kotak{
			background-color: red;
			border: 1px solid red;
			border-radius: 10px;
			width: 250px;
			height: 200px;
			text-align: center;
			color: white;
			position: relative;
			margin: 20px;
			cursor: pointer;

		}

		.kotak p {
			margin-top: 40px;
		}
		.kotak i {
			font-size: 8px;
			top: -20px;
		}

	</style>
@endsection

@section('content')
<h1>hi pelayan</h1>

<div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">List Meja</h6>
                </div>
                <div class="card-body">
                	<div class="row">
                		<div class="col-md-3 "><div class="kotak" data-toggle="modal" data-target="#modal_meja"" data-toggle="modal" data-target="#modal_meja"><p>A01</p><i>(up to 6 person)</i></div></div>
                		<div class="col-md-3 "><div class="kotak" data-toggle="modal" data-target="#modal_meja"><p>A01</p><i>(up to 6 person)</i></div></div>
                		<div class="col-md-3 "><div class="kotak" data-toggle="modal" data-target="#modal_meja""><p>A01</p><i>(up to 6 person)</i></div></div>
                		<div class="col-md-3 "><div class="kotak" data-toggle="modal" data-target="#modal_meja""><p>A01</p><i>(up to 6 person)</i></div></div>

                	</div>
                	<div class="row">
                		<div class="col-md-3 "><div class="kotak" data-toggle="modal" data-target="#modal_meja""><p>A01</p><i>(up to 6 person)</i></div></div>
                		<div class="col-md-3 "><div class="kotak" data-toggle="modal" data-target="#modal_meja""><p>A01</p><i>(up to 6 person)</i></div></div>
                		<div class="col-md-3 "><div class="kotak" data-toggle="modal" data-target="#modal_meja""><p>A01</p><i>(up to 6 person)</i></div></div>
                		<div class="col-md-3 "><div class="kotak" data-toggle="modal" data-target="#modal_meja""><p>A01</p><i>(up to 6 person)</i></div></div>

                	</div>
                	<div class="row">
                		<div class="col-md-3 "><div class="kotak" data-toggle="modal" data-target="#modal_meja""><p>A01</p><i>(up to 6 person)</i></div></div>
                		<div class="col-md-3 "><div class="kotak" data-toggle="modal" data-target="#modal_meja""><p>A01</p><i>(up to 6 person)</i></div></div>
                		<div class="col-md-3 "><div class="kotak" data-toggle="modal" data-target="#modal_meja""><p>A01</p><i>(up to 6 person)</i></div></div>
                		<div class="col-md-3 "><div class="kotak" data-toggle="modal" data-target="#modal_meja""><p>A01</p><i>(up to 6 person)</i></div></div>

                	</div>
                	
           
                </div>
              </div>

              <div class="modal fade" id="modal_meja" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			    <div class="modal-dialog" role="document">
			      <div class="modal-content">
			        <div class="modal-header">
			          <h5 class="modal-title" id="exampleModalLabel">Book Meja?</h5>
			          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
			            <span aria-hidden="true">×</span>
			          </button>
			        </div>
			        <div class="modal-body">Klik ok untuk book meja ini</div>
			        <div class="modal-footer">
			          <button class="btn btn-secondary" type="button" data-dismiss="modal" style="min-width: 80px">Cancel</button>
			          <button class="btn btn-primary" id="btn_book" data-dismiss="modal" style="min-width: 80px">Ok</button>
			          
			        </div>
			      </div>
			    </div>
			  </div>
@endsection

@section('customJs')
<script type="text/javascript">
	$('#btn_book').click(function() {
		  $('.kotak').css('background-color','green');
		  $('.kotak').css('border','1px solid green');
		});

</script>
@endsection