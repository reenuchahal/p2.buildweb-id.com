
<div class="row">
	<div class="col-md-offset-1 col-sm-offset-1 col-xs-8 col-sm-6 col-md-8">
		<h3>Name: <?=$user->first_name?></h3>
		<h3>Email: <?=$user->email?> </h3>
		<?=$user->profile_image?>
		<img src="<?=$user->avatar?>" />
		<img src="<?=$user->avatar_small?>" />
		<img src="<?=$user->avatar_medium?>" />
	</div>
</div>
<form enctype="multipart/form-data" method="POST" action="/users/p_profile">
	<div class="form-group row">
		<div class="col-md-offset-1 col-sm-offset-1 col-xs-8 col-sm-6 col-md-8">
			<label for="imageInputFile">Upload your profile pic</label>
		    <input type="file" name="profile_image">
		</div>
	</div>

	<div class="row">
		<div class="col-md-offset-1 col-sm-offset-1 col-xs-8 col-sm-6 col-md-4">
			<button type="submit" class="btn btn-default">Upload</button>
		</div>
	</div>
</form>
<form method="POST" action="/users/p_profile_update">

	<p>Click on fields to edit:</p>
 	<table id="user" class="table table-bordered table-striped">
		<tbody> 
			<tr>         
				<td width="30%">Username</td>
				<td><a href="#" id="username" data-type="text" data-pk="1" data-name="username" data-original-title="Enter username">superuser</a></td>
			</tr>
			<tr>         
				<td>First name</td>
				<td><a href="#" id="firstname" data-type="text" data-pk="1" data-name="firstname" data-placement="right" data-placeholder="Required" data-original-title="Enter your firstname"><?=$user->first_name?></a></td>
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


                        
                       




