<div class="row">
	<div class="col-md-offset-2 col-xs-12 col-sm-10 col-md-8">
		<form method="post" action="/posts/p_add">
			<label for='content'>Update Status</label><br>
		    <textarea class="form-control" rows="3" name='content' id='content' placeholder="What's on your mind?" required></textarea><br/>
		    <div class="text-right">
		    <button  type="submit" class="btn btn-primary">Post</button>
		    </div>
		</form>
		<h1>ChitChat</h1>
		<br/>
	</div>
</div>
<?php $loggedInUser= $user->first_name?>
<?php foreach($posts as $post): ?>
<div class="row">
	<div class="col-md-offset-2 col-xs-12 col-sm-10 col-md-8">
		<div class="feed-display">
			<h3><?=$post['first_name']?> <?=$post['last_name']?></h3>
			<p><?=$post['content']?></p>
			<time datetime="<?=Time::display($post['created'],'Y-m-d G:i')?>">
				<?=Time::display($post['created'])?>
			</time>
			<?php if($post['first_name'] == $loggedInUser): ?>
			<div class="text-right delete-btn">
				<a href="/posts/delete/<?=$post['post_id']?>" class="btn btn-danger" >Delete</a>
				<a href="/posts/edit/<?=$post['post_id']?>" class="btn btn-default" >Edit</a>
			</div>
			<?php endif; ?>
		</div>
	</div>
</div>
<?php endforeach;?>