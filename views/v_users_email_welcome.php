<h1>Hi <?=$user->first_name?></h1>
<?php echo $_POST['first_name'] ?>
<?php echo $_POST['last_name'] ?>
<?php echo $_POST['email'] ?>
<?php 
echo "<pre>";
print_r($user);
echo "</pre>";
?>