	<form method="POST" action="/users/p_signup">
		<div class="form-group row" >
			<div class="col-md-offset-1 col-sm-offset-1 col-xs-8 col-sm-6 col-md-4">
				<label for="firstName">First Name</label>
				<input class="form-control" placeholder="First Name" id="firstName" type="text" name="first_name" required>
			</div>
		</div><!-- /.row 1 First Name -->
		
		
		<div class="form-group row">
			<div class="col-md-offset-1 col-sm-offset-1 col-xs-8 col-sm-6 col-md-4">
				<label for="lastName">Last Name</label>
				<input class="form-control" placeholder="Last Name" id="lastName" type="text" name="last_name" required>
			</div>
		</div><!-- /.row 2  Last Name-->
		
		<div class="form-group row">
			<div class="col-md-offset-1 col-sm-offset-1 col-xs-8 col-sm-6 col-md-4">
				<label for="yourEmail">Email</label>
				<input class="form-control" placeholder="Your Email" id="yourEmail" type="text" name="email" required>
			</div>
		</div><!-- /.row 3 Email -->
		
		<div class="form-group row">
			<div class="col-md-offset-1 col-sm-offset-1 col-xs-8 col-sm-6 col-md-4">
				<label for="yourPassword">Password</label>
				<input class="form-control" placeholder="Password" id="yourPassword" type="password" name="password" required>
			</div>
		</div><!-- /.row 5 Password -->
	    <?php if(isset($error)): ?>
	    <div class="row error">
			<div class="col-md-offset-1 col-sm-offset-1 col-xs-8 col-sm-6 col-md-4">
				<p>You already have an account. <a href="/users/login">Login here</a></p>
			</div>
        </div>
        <br>
    	<?php endif; ?>
    	<div class="row">
			<div class="col-md-offset-1 col-sm-offset-1 col-xs-8 col-sm-6 col-md-4">
				<button type="submit" class="btn btn-default">Sign up</button>
			</div>
		</div>
	</form>
	