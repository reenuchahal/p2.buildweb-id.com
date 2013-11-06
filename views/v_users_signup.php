<div class="row" >
	<form method="POST" action="/users/p_signup">
		<div class="col-md-offset-1 col-xs-12 col-sm-6 col-md-5">
			<h1>Signup for ChitChat</h1><br/>
			<p>Instantly connect to what's most important to you. Follow your friends, experts, favorite celebrities, and breaking news.</p>
			<p class="text-muted warning">By clicking Sign Up, you agree to our Terms and that you have read our Data Use Policy, including our Cookie Use.</p><br/>
		</div> <!-- / .col-md-offset-1 .col-xs-12 .col-sm-6 .col-md-5 -->
		
		<div class="col-md-offset-1 col-xs-8 col-sm-6 col-md-4">
			<!-- First Name input -->
			<label for="firstName">First Name</label>
			<input class="form-control" placeholder="First Name" id="firstName" type="text" name="first_name" required><br/>
			
			<!-- Last Name input -->
			<label for="lastName">Last Name</label>
			<input class="form-control" placeholder="Last Name" id="lastName" type="text" name="last_name" required><br/>
			
			<!-- Email input -->
			<label for="yourEmail">Email</label>
			<input class="form-control" placeholder="Your Email" id="yourEmail" type="text" name="email" required><br/>
			
			<!-- Password input -->
			<label for="yourPassword">Password</label>
			<input class="form-control" placeholder="Password" id="yourPassword" type="password" name="password" required><br/>
			
			<!-- If there is an error, Show this message -->
			<?php if(isset($error)): ?>
				<p class="error">
					Either you did not fill up the full form.<br/>
					OR You already have an account on ChitChat. <a href="/users/login">Login here</a>
				</p>
			<?php endif; ?>
    	
			<button type="submit" class="btn btn-default">Sign up</button>
		</div><!-- /.col-md-offset-1 .col-sm-offset-1 .col-xs-8 .col-sm-6 .col-md-4 -->
	</form>
</div><!-- /.row -->
	