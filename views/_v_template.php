<!DOCTYPE html>
<html>
	<head>
		<title><?php if(isset($title)) echo $title; ?></title>
		
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">	
		
		<!-- Favicon -->
		<link rel="shortcut icon" href="/uploads/favicon.ico">
		
		<!-- CSS-->
		<link href="/css/bootstrap.min.css" rel="stylesheet" type="text/css" media="screen">
		<link href="/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css" media="screen">
		<link href="/css/style.css" rel="stylesheet" type="text/css" media="screen">				
			
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="/js/html5shiv.js"></script>
			<script src="/js/respond.min.js"></script>
		<![endif]-->
		    
		<!-- Controller Specific JS/CSS -->
		<?php if(isset($client_files_head)) echo $client_files_head; ?>
	</head>

	<body>
		<nav class="navbar navbar-inverse navbar-fixed-top">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<p class="navbar-brand " >ChitChat</p> 
			</div>
		
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse navbar-ex1-collapse">
				<ul class="nav navbar-nav">
					<li <?php if(basename($_SERVER['REQUEST_URI']) == NULL): ?> class="active" <?php endif; ?>><a href='/'>Home</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<?php if($user): ?>
						<li<?php if(basename($_SERVER['REQUEST_URI']) == 'add'): ?> class="active" <?php endif; ?>><a href='/posts/add'>News Feed</a></li>
						<li<?php if(basename($_SERVER['REQUEST_URI']) == 'findfriends'): ?> class="active" <?php endif; ?>><a href='/users/findfriends'>@ Connect</a></li>
						<li<?php if(basename($_SERVER['REQUEST_URI']) == 'profile'): ?> class="active" <?php endif; ?>><a href='/users/profile'><?=$user->first_name?> <?=$user->last_name?></a></li>
						<li><a href='/users/logout'>Logout</a></li>
					<?php else: ?>
						<li <?php if(basename($_SERVER['REQUEST_URI']) == 'signup'): ?> class="active" <?php endif; ?>><a href='/users/signup'>Sign up</a></li>
						<li<?php if(basename($_SERVER['REQUEST_URI']) == 'login'): ?> class="active" <?php endif; ?>><a href='/users/login'>Log in</a></li>  
					<?php endif; ?>
				</ul>
			</div><!-- /.navbar-collapse -->
		</nav><!-- Nav Ends -->
		
		<div class="container">	
			<?php if(isset($content)) echo $content; ?>
		</div><!-- /.container -->
		
		<footer>
			<div class="text-center">
				<p>&copy; ChitChat 2013, All rights reserved.</p>
			</div>
		</footer><!-- / footer Ends-->
		
		
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="/js/jquery-1.8.2.min.js"></script>
		
		<!-- Bootstap javascript -->
		<script src="/js/bootstrap.min.js"></script>
		<?php if(isset($client_files_body)) echo $client_files_body; ?>
	</body>
</html>