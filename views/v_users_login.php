	<form  method="POST" action="/users/p_login">
		<div class="form-group row">
			<div class="col-md-offset-1 col-sm-offset-1 col-xs-8 col-sm-6 col-md-4">
				<label for="loginEmail">Email</label>
				<input class="form-control" placeholder="Enter email" id="loginEmail" type="text" name="email" required>
			</div>
		</div> <!-- /.row 1 Login Email-->
		    
		<div class="form-group row">
			<div class="col-md-offset-1 col-sm-offset-1 col-xs-8 col-sm-6 col-md-4">
				<label for="loginPassword">Password</label>
				<input class="form-control" placeholder="Enter Password" id="loginPassword" type="password" name="password" required>
			</div>
		</div><!-- /.row 2 Login Password-->
		<?php if(isset($error)): ?>
		<div class="row error">
			<div class="col-md-offset-1 col-sm-offset-1 col-xs-8 col-sm-6 col-md-5">
				<p> Login failed. Please double check your email and password.</p>
			</div>
		</div>
		<?php endif; ?>
		<div class="row">
			<div class="col-md-offset-1 col-sm-offset-1 col-xs-8 col-sm-6 col-md-4">
				<button type="submit" class="btn btn-default">Log in</button>
			</div>
		</div>
	</form>
	