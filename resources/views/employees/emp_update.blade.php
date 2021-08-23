<!DOCTYPE html>
<html>
<head>
<title></title>

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

<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
      
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
      <!-- This is for javascript model -->
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</head>
<body>
<div class="container">
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
					<form method="POST" action="{{ url('/edit/') }}" enctype="multipart/form-data" class="needs-validation"  id="emp_reg_form" novalidate>
						@csrf
                        <input type = "hidden" name = "id" value = "<?php echo $employee[0]->id; ?>">
                        <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
						<div class="form-group">
							<label>Name:</label>
							<input type="text" name="name" id="name" class=" form-control col-sm-6 @error('name') is-invalid @enderror" placeholder="Name" value="<?php echo $employee[0]->name; ?>" required />
							@error('name')
								<div class="invalid-feedback">
									{{ $message }}
								</div>
							@enderror
						  
						</div>
						<div class="form-group">
							<label>Address:</label>
							<input type="text" name="Address" id="Address" class=" form-control col-sm-6 @error('Address') is-invalid @enderror" placeholder="Address" value="<?php echo $employee[0]->Address; ?>" required />
							@error('Address')
								<div class="invalid-feedback">
									{{ $message }}
								</div>
							@enderror
						  
						</div>
						<div class="form-group">
							<label>Email:</label>
							<input type="email" name="email" id="email_id" class="form-control col-sm-6 @error('email') is-invalid @enderror" placeholder="Email Id" value="<?php echo $employee[0]->email; ?>" required / >
							@error('email')
								<div class="invalid-feedback">
									{{ $message }}
								</div>
							@enderror
						</div>

                        <div class="form-group">
							<label>phone:</label>
							<input type="phone" name="phone" id="phone" class="form-control col-sm-6 @error('phone') is-invalid @enderror" placeholder="phone" value="<?php echo $employee[0]->phone; ?>" required / >
							@error('phone')
								<div class="invalid-feedback">
									{{ $message }}
								</div>
							@enderror
						</div>

                        <div class="form-group">
							<label>Position:</label>
							<input type="text" name="Position" id="Position" class="form-control col-sm-6 @error('Position') is-invalid @enderror" placeholder="Position" value="<?php echo $employee[0]->Position; ?>" required / >
							@error('Position')
								<div class="invalid-feedback">
									{{ $message }}
								</div>
							@enderror
						</div>

                        <div class="form-group">
							<label>Resume:</label>
							<input type="file" name="resume" id="resume" class="form-control col-sm-6 @error('Position') is-invalid @enderror" placeholder="Position"  required / >
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

</body>
</html>
