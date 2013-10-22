	<form  method="POST" action="/users/p_login">
		<div class="form-group row">
			<div class="col-xs-12 col-sm-4 col-md-3">
				<label for="loginEmail">Email</label>
				<input class="form-control" placeholder="Enter email" id="loginEmail" type="text" name="email" required>
			</div>
		</div> <!-- /.row 1 -->
		    
		<div class="form-group row">
			<div class="col-xs-12 col-sm-4 col-md-3">
				<label for="loginPassword">Password</label>
				<input class="form-control" placeholder="Enter Password" id="loginPassword" type="password" name="password" required>
			</div>
		</div><!-- /.row 2 -->
		
		<button type="submit" class="btn btn-default">Log in</button>
	</form>
