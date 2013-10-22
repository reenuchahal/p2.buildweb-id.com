	<form method="POST" action="/users/p_signup">
		<div class="form-group row" >
			<div class="col-xs-12 col-sm-4 col-md-3">
				<label for="firstName">First Name</label>
				<input class="form-control" placeholder="First Name" id="firstName" type="text" name="first_name" required>
			</div>
		</div>
		
		
		<div class="form-group row">
			<div class="col-xs-12 col-sm-4 col-md-3">
				<label for="lastName">Last Name</label>
				<input class="form-control" placeholder="Last Name" id="lastName" type="text" name="last_name" required>
			</div>
		</div>
		
		<div class="form-group row">
			<div class="col-xs-12 col-sm-4 col-md-3">
				<label for="yourEmail">Email</label>
				<input class="form-control" placeholder="Your Email" id="yourEmail" type="text" name="email" required>
			</div>
		</div>
		
		<div class="form-group row">
			<div class="col-xs-12 col-sm-4 col-md-3">
				<label for="yourPassword">Password</label>
				<input class="form-control" placeholder="Password" id="yourPassword" type="password" name="password" required>
			</div>
		</div>
	
		<button type="submit" class="btn btn-default">Sign up</button>
	</form>