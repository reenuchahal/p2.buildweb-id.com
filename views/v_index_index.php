<?php if($user): ?>
<?php else: ?>
<?php endif; ?>
<?php 
echo "<pre>";
print_r($user);
echo "</pre>";
		
?>
<h1>Welcome to <?=APP_NAME?><?php if($user) echo ', '.$user->first_name; ?></h1>
<p>Instantly connect to what's most important to you. Follow your friends, experts, favorite celebrities, and breaking news.</p>