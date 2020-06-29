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
<h1>hi kasir</h1>


@endsection

@section('customJs')
<script type="text/javascript">
	$('#btn_book').click(function() {
		  $('.kotak').css('background-color','green');
		  $('.kotak').css('border','1px solid green');
		});

</script>
@endsection