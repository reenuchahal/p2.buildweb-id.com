<?php if($user): ?>
	<div class="row">
	
		<div class="col-xs-12 col-sm-12 col-md-12">
			<h1>Welcome to <?=APP_NAME?><?php if($user) echo ', '.$user->first_name; ?></h1><br/>
		</div><!-- / .col-xs-12 .col-sm-12 .col-md-12 -->
		
	</div><!-- / .row -->
<?php endif; ?>

<div class="row">

	<div class="col-xs-12 col-sm-12 col-md-8">
		<img class="img-responsive" src="/uploads/people.png" alt="ChitChat Landing Page Image"/><br/>
	</div><!-- / .col-xs-12 .col-sm-12 .col-md-8-->
	
	<div class="col-xs-12 col-sm-12 col-md-4">
		<h1>+1 Features</h1>
		<p>1. Email confirmation upon sign-up</p>
		<p>2. Upload a profile photo and assign it a unique number to store it in upload folder.</p>
		<p>3. Locate the user by it's IP address and display it on profile page.</p>
		<p>4. User needs a unique email address to sign up for ChitChat.</p>
		<p>5. User can edit and delete his posts.</p>
		<p>6. User can like and unlike the post.</p>
		<p>7. User can see the number of likes for each post</p>
		
		<h1>Other Features</h1>
		<p>1. Use of active class to show which page the user is currently on</p>
		<p>2. Use of Bootstrap. Responsive Design.</p>
	</div><!-- / .col-xs-12 .col-sm-12 .col-md-4 -->
	
</div><!-- / .row -->


