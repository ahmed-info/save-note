<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Form-v8 by Colorlib</title>
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<!-- Font-->
	<link rel="stylesheet" type="text/css" href="css/sourcesanspro-font.css">
	<!-- Main Style Css -->
    <link rel="stylesheet" href="css/style.css"/>
</head>
<body class="form-v8">
	<div class="page-content">
		<div class="form-v8-content">
			<div class="form-left">
				<img src="assets/images/notes3.png" alt="form">
			</div>
			<div class="form-right">
				<div class="tab">
					
					<div class="tab-inner">
						<button class="tablinks">Sign Up</button>
					</div>
                    
				</div>
				
				<form class="form-detail" method="POST" action="{{ route('registerUser') }}">
					@if(Session::has('success'))
					<div class="alert alert-success">
						{{Session::get('success')}}
					</div>
					@endif
					@if(Session::has('fail'))
					<div class="alert alert-danger">
						{{Session::get('fail')}}
					</div>
					@endif
					@csrf
					<div class="tabcontent" id="sign-up">
						<div class="form-row">
							<label class="form-row-inner">
							@error('name')
								<span class="text-danger" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
								<input type="text"  @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" id="name" class="input-text">
								<span class="label">Username</span>
		  						<span class="border"></span>
								 
							</label>
							
						</div>
						<div class="form-row">
							<label class="form-row-inner">
							@error('email')
								<span class="text-danger" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
								<input type="email"  @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" id="email" class="input-text">
								<span class="label">E-Mail</span>
		  						<span class="border"></span>
								  
							</label>
							
						</div>
						<div class="form-row">
							<label class="form-row-inner">
								@error('password')
								<span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>     
								</span>
							@enderror
								<input type="password" @error('password') is-invalid @enderror" name="password" id="password" class="input-text" autocomplete="current-password">
								<span class="label">Password</span>
								<span class="border"></span>
								
							</label>
							
							

						</div>

                        <div class="form-row">
							<label class="form-row-inner">
                                <input id="password-confirm" type="password" class="input-text" name="password_confirmation" autocomplete="new-password">
								<span class="label">Comfirm Password</span>
								<span class="border"></span>
							</label>
						</div>
						
						{{-- <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Register') }}
                            </button>
                        </div> --}}

                        <div class="form-row-last">
							<input type="submit" name="login" class="register" value="Sign Up">
						</div>
					</div>
                    <div class="text-center">
                        <span class="txt2" style="display: inline-flex">
                            Have an account?
                        </span>
                        <div class="tab">
                        <div class="tab-inner">
                        <a href="{{ route('login') }}" class="tablinks">
                            Login Now!
                        </a>
                        </div>
                    </div>

                    </div>
				</form>
			</div>
		</div>
	</div>
	
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</html>