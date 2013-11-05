<div class="row">
	<div class="col-md-offset-1 col-xs-12 col-sm-5 col-md-5">
		<?php if($user->profile_image): ?>
			<img  class="img-responsive img-thumbnail" src="/uploads/avatars/<?=$user->profile_image?>" /><br/><br/>
		<?php else: ?>
			<img  class="img-responsive img-thumbnail" src="/uploads/placeholder_200_200.png" /><br/><br/>
		<?php endif; ?>
	</div><!-- / .col-md-offset-1 .col-xs-12 .col-sm-5 .col-md-5 -->
	
	<div class="col-md-offset-1 col-sm-offset-1 col-xs-6 col-sm-5 col-md-4" >
		<h1>Your Profile</h1><br/>
		<p>
			<b>Name:</b> <?=$user->first_name?>  <?=$user->last_name?><br/>
			<b>Email:</b> <?=$user->email?> 
		</p><br/>
		<p>
			<b>Your Current Location </b><br/>
			<?=$location['city'];?>, <?=$location['state'];?>, <?=$location['country_code'];?>
		</p>
		<br/>
		<form enctype="multipart/form-data" method="POST" action="/users/p_profile">
			<label for="imageInputFile">Upload your profile image here</label>
		    <input type="file" name="profile_image" required><br/>
			
			<?php if(isset($error)): ?>
				<p class="error"> There was an error uploading the file, please try again!</p>
			<?php endif; ?>
			<button type="submit" class="btn btn-default">Upload</button><br/><br/><br/>
		</form>
	</div> <!-- / .col-md-offset-1 .col-sm-offset-1 .col-xs-6 .col-sm-5 .col-md-4 -->	
</div> <!-- / .row -->
  
                       




