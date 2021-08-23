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
					<form method="POST" action="{{ url('create') }}" class="needs-validation"  id="emp_reg_form" novalidate>
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
							<input type="phone" name="phone" id="phone" class="form-control col-sm-6 @error('phone') is-invalid @enderror" placeholder="phone" value="{{ old('phone') }}" required / >
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
						
						<button type="submit" class="btn btn-primary">Save</button>
					  </form>				   
				</div>
			</div>
		</div>
	</div>

