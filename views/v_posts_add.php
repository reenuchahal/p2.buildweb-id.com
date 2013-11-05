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
			
			<div class="text-right delete-btn">
				<?php if($post['first_name'] == $loggedInUser): ?>
					<a href="/posts/delete/<?=$post['post_id']?>" class="btn btn-danger btn-xs" >Delete</a>
					<a href="/posts/edit/<?=$post['post_id']?>" class="btn btn-default btn-xs" >Edit</a>
				<?php endif; ?>
				<?php if(isset($connections[$post['post_id']])): ?>
					<a href='/posts/unlike/<?=$post['post_id']?>' class="btn btn-default btn-xs">Unlike</a>
				<?php else: ?>			
					<a href='/posts/like/<?=$post['post_id']?>' class="btn btn-default btn-xs">Like</a>
				<?php endif; ?>
				<?php if(isset($count[$post['post_id']]['count'])): ?>
				 	<img src="/uploads/Facebook-Thumbs-Up.jpg" alt="facebook thumbs up"/> (<?php echo $count[$post['post_id']]['count'] ?>)
				<?php endif; ?>
			</div><!-- / .text-right -->
		</div>
	</div>
</div>
<?php endforeach;?>