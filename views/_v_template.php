<!DOCTYPE html>
<html>
<head>
	<title><?php if(isset($title)) echo $title; ?></title>

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">	
	
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
	    <a class="navbar-brand" href="#">ChitChat</a>
	  </div>
	
	  <!-- Collect the nav links, forms, and other content for toggling -->
	  <div class="collapse navbar-collapse navbar-ex1-collapse">
	    <ul class="nav navbar-nav">
	      <li class="active"><a href='/'>Home</a></li>
	    </ul>
	    <form class="navbar-form navbar-left" >
	      <div class="form-group">
	        <input type="text" class="form-control" placeholder="Search">
	      </div>
	      <button type="submit" class="btn btn-default">Submit</button>
	    </form>
	    <ul class="nav navbar-nav navbar-right">
	        <?php if($user): ?>
	          <li><a href='/users/profile'><?=$user->first_name?> <?=$user->last_name?></a></li>
	          <li><a href='/users/logout'>Logout</a></li>
	        <?php else: ?>
	          <li><a href='/users/signup'>Sign up</a></li>
	          <li><a href='/users/login'>Log in</a></li>  
	        <?php endif; ?>
	      
	    </ul>
	  </div><!-- /.navbar-collapse -->
	</nav><!-- Nav Ends -->

	<div class="container">	
		<?php if(isset($content)) echo $content; ?>
	</div><!-- /.container -->

	
	
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	 
    <!-- Bootstap javascript -->
    <script src="/js/jquery-1.8.2.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
   	 <?php if(isset($client_files_body)) echo $client_files_body; ?>
</body>
</html>