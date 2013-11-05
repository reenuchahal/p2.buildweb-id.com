<div class="row">
	<div class="col-md-offset-1 col-xs-12 col-sm-5 col-md-5">
		<?php if($user->profile_image): ?>
			<img  class="img-responsive  profile-image" src="/uploads/avatars/<?=$user->profile_image?>" /><br/><br/>
		<?php else: ?>
			<img  class="img-responsive " src="/uploads/placeholder_200_200.png" /><br/><br/>
		<?php endif; ?>
	</div><!-- / .col-md-offset-1 .col-xs-12 .col-sm-6 .col-md-5 -->
	
	<div class="col-md-offset-1 col-sm-offset-1 col-xs-6 col-sm-5 col-md-4 profile-top-margin" >
		<h1>Your Profile</h1><br/>
		<p>
			<b>Name:</b> <?=$user->first_name?>  <?=$user->last_name?><br/>
			<b>Email:</b> <?=$user->email?> 
		</p><br/>
		<p>
			<b>Your Current Location </b><br/>
			<?=$location['city'];?>, <?=$location['state'];?>, <?=$location['country_code'];?>
		</p>
		
		<form enctype="multipart/form-data" method="POST" action="/users/p_profile">
			<label for="imageInputFile">Upload your profile image here</label>
		    <input type="file" name="profile_image" required><br/>
			
			<?php if(isset($error)): ?>
				<p class="error"> There was an error uploading the file, please try again!</p>
			<?php endif; ?>
			<button type="submit" class="btn btn-default">Upload</button><br/><br/><br/>
		</form>
	</div> <!-- / .col-xs-6 .col-sm-5 .col-md-4 -->	
</div> <!-- / .row -->
<div class="row">
	<div class="col-md-offset-1 col-xs-12 col-sm-6 col-md-5">
		<form method="POST" action="/users/p_profile_update">
			<p><b>Click on fields to edit:</b></p>
		 	<table id="user" class="table table-bordered table-striped">
				<tbody> 
					<tr>         
						<td width="30%">Username</td>
						<td><a href="#" id="username" data-type="text" data-pk="1" data-name="username" data-original-title="Enter username">superuser</a></td>
					</tr>
					<tr>         
						<td>First name</td>
						<td><a href="#" id="firstname" data-type="text" data-pk="1" data-name="first_name" data-placement="right" data-placeholder="Required" data-original-title="Enter your firstname"><?=$user->first_name?></a></td>
					</tr>  
					<tr>         
						<td>Last name</td>
						<td><a href="#" id="lastname" data-type="text" data-pk="1" data-name="last_name" data-original-title="Enter your lastname"><?=$user->last_name?></a></td>
					</tr>  
					<tr>         
						<td>Sex</td>
						<td><a href="#" id="sex" data-type="select" data-name="sex" data-pk="1" data-prepend="Not set" data-original-title="Select sex"></a></td>
					</tr>
					<tr>         
						<td>Date of birth</td>
						<td><a href="#" id="dob" data-type="date" data-viewformat="dd.mm.yyyy" data-pk="1" data-name="dob" data-original-title="Select Date of birth">15.05.1984</a></td>
					</tr> 
				</tbody>
			</table>
			<div class="row">
				<div class="col-md-offset-1 col-sm-offset-1 col-xs-8 col-sm-6 col-md-4">
					<button type="submit" class="btn btn-default">Update</button>
				</div>
			</div>
		</form>
	</div><!-- /.col-md-offset-1 /.col-xs-12 /.col-sm-6 /.col-md-5 -->
</div><!-- / .row -->


                        
                       




