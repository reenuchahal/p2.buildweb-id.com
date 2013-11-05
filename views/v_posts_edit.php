<div class="row">
	<div class="col-md-offset-2 col-xs-12 col-sm-10 col-md-8">
		<form method="post" action="/posts/p_edit/<?php echo $post_id_edit; ?>">
			<label for='content'>Edit your post</label><br>
		    <textarea class="form-control" rows="3" name='content' id='content' placeholder="What's on your mind?" required><?php echo $edit_content ?></textarea><br/>
		    
		    <div class="text-right">
		    	<button  type="submit" class="btn btn-primary">Update</button>
		    	<a  href="/posts/add/" class="btn btn-default">cancel</a>
		    </div>
		</form>
	</div> <!-- / .col-md-offset-2 .col-xs-12 .col-sm-10 .col-md-8 -->
</div> <!-- / .row -->
