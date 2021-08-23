<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>{{ config('app.name', 'ST Laravel') }}</title>

	<!-- Scripts -->
	
	{{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}

	<!-- Fonts -->
	<link rel="dns-prefetch" href="//fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">

 <!-- Font Awesome -->
 <link
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
  rel="stylesheet"
/>
<!-- Google Fonts -->
<link
  href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
  rel="stylesheet"
/>
<!-- MDB -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.css"
  rel="stylesheet"
/>

	<!-- Styles -->
	{{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
	<link href="{{ asset('css/bootstrap/bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ asset('css/select2/select2.min.css') }}" rel="stylesheet">
	<link href="{{ asset('css/main.css')}}" rel="stylesheet">
	
	<script type="text/javascript" src="{{ asset('js/jquery/jquery.min.js') }}"></script>
	<script src="{{ asset('js/bootstrap/popper.min.js') }}"></script>
	<script src="{{ asset('js/bootstrap/bootstrap.min.js') }}"></script>
	<script src="{{ asset('js/select2/select2.min.js') }}"></script>
	<script src="{{ asset('js/common.js') }}"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
	
</head>
<body>
	<div id="app">
		<div class="main">
        <div class="container">
	<div class="" style="margin-bottom:10px;margin-top:15px;">
	</div>
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
			
				
				<div class="card-body">
					@if (session('status'))
						<div class="alert alert-success" role="alert">
							<button type="button" class="close" data-dismiss="alert">×</button>
							{{ session('status') }}
						</div>
					@elseif(session('failed'))
						<div class="alert alert-danger" role="alert">
							<button type="button" class="close" data-dismiss="alert">×</button>
							{{ session('failed') }}
						</div>
					@endif
					<form method="POST" action="{{ url('create') }}" enctype='multipart/form-data' class="needs-validation" id="emp_reg_form" novalidate>
						@csrf
						<div class="form-group">
							<label>Name:</label>
							<input type="text" name="name" id="name" class=" form-control col-sm-6 @error('name') is-invalid @enderror" placeholder="Name" value="{{ old('name') }}" required />
							@error('name')
								<div class="invalid-feedback">
									{{ $message }}
								</div>
							@enderror
						  
						</div>
						<div class="form-group">
							<label>Address:</label>
							<input type="text" name="Address" id="Address" class=" form-control col-sm-6 @error('Address') is-invalid @enderror" placeholder="Address" value="{{ old('Address') }}" required />
							@error('Address')
								<div class="invalid-feedback">
									{{ $message }}
								</div>
							@enderror
						  
						</div>
						<div class="form-group">
							<label>Email:</label>
							<input type="email" name="email" id="email_id" class="form-control col-sm-6 @error('email') is-invalid @enderror" placeholder="Email Id" value="{{ old('email') }}" required / >
							@error('email')
								<div class="invalid-feedback">
									{{ $message }}
								</div>
							@enderror
						</div>
                        <div class="form-group">
							<label>phone:</label>
							<input type="tel" name="phone" id="phone" class="form-control col-sm-6 @error('phone') is-invalid @enderror" placeholder="phone" value="{{ old('phone') }}" required / >
							@error('phone')
								<div class="invalid-feedback">
									{{ $message }}
								</div>
							@enderror
						</div>
                        <div class="form-group">
							<label>Position:</label>
							<input type="text" name="Position" id="Position" class="form-control col-sm-6 @error('Position') is-invalid @enderror" placeholder="Position" value="{{ old('Position') }}" required / >
							@error('phone')
								<div class="invalid-feedback">
									{{ $message }}
								</div>
							@enderror
						</div>

						<div class="form-group">
							<label>Resume:</label>
							<input type="file" name="resume" id="resume" class="form-control col-sm-6 @error('Position') is-invalid @enderror" value="{{ old('resume') }}" required / >
							@error('resume')
								<div class="invalid-feedback">
									{{ $message }}
								</div>
							@enderror
						</div>
						
						<button type="submit" class="btn btn-primary">Save</button>
					  </form>				   
				</div>
			</div>
		</div>
	</div>
</div>
		</div>
	</div>		
</body>
</html>