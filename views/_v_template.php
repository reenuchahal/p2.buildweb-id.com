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
	<div class="container">	
		<?php if(isset($content)) echo $content; ?>
	</div>

	<?php if(isset($client_files_body)) echo $client_files_body; ?>
	
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="//code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/js/bootstrap.min.js"></script>
</body>
</html>