<div class="row">
	<div class="col-md-offset-2 col-sm-offset-2 col-xs-12 col-sm-8 col-md-8">
		<h1>Find a Connection</h1>
		<table class="table table-hover">
			<?php foreach($users as $user): ?>
				<tr>
					<td><?=$user['first_name']?> <?=$user['last_name']?> <td>
					<td><button type="button" class="btn btn-primary">Follow</button></td>
				</tr>
			<?php endforeach; ?>
		</table>
	</div>
</div>