<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Profile</title>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/edit.css') }}">
</head>
<body>
    <div class="container-fluid">
		<div class="container">
			<div class="formBox">
				<form action="/profile/edit" method="POST">
                    @csrf
						<div class="row">
							<div class="col-sm-12">
								<h1>Edit form</h1>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-6">
								<div class="inputBox ">
                                    <p>First Name</p>
									<input value="{{ $user->firstName }}" type="text" name="firstName" class="input">
								</div>
							</div>

							<div class="col-sm-6">
								<div class="inputBox">
                                    <p>Last Name</p>
									<input value="{{ $user->lastName }}" type="text" name="lastName" class="input">
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-6">
								<div class="inputBox">
                                    <p>Username</p>
									<input value="{{ $user->username }}" type="text" name="username" class="input">
								</div>
							</div>


						<div class="row">
							<div class="col-sm-12">
								<div class="inputBox">
                                    <p>Email</p>
									<input value="{{ $user->email }}" type="email" name="email" class="input">
								</div>
							</div>
						</div>

                        <div class="row">
							<div class="col-sm-12">
								<div class="inputBox">
                                    <p>Current Password</p>
									<input type="password" name="currPassword" class="input">
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-12">
								<input type="submit" name="" class="button" value="Send Message">
							</div>
						</div>
				</form>
			</div>
		</div>
	</div>
</body>