<!DOCTYPE html>
<html lang="en">
<head>
	<title>Bloggity</title>
	<meta charset="utf-8" />
	<!-- <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" /> -->
	

	<link type="text/plain" rel="author" href="/humans.txt" />
	<link rel="shortcut icon" href="http://adamshields.com/favicon.ico" />
	<link href="css/lightbox.css" rel="stylesheet" />
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="css/jquery-ui-1.10.3.custom.css" />
	<link rel="stylesheet" href="tinyeditor.css">
	<link rel="stylesheet" href="css/responsive-gs-12col.css" /><!-- responsive.gs grid system -->
	<link rel="stylesheet" href="css/ie.css" /><!-- resopnsive.gs grid system -->
	<link rel="stylesheet" href="css/main.css" />
	<link rel="stylesheet" href="css/admin.css" />


	
	

	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<![endif]-->



</head>
	<body class="admin-body">
		<header class="admin-header">
			<div class="header-inner">
				<h1><a href="index.php?action=home&page=1"><img src="images/logo.png" alt="Bloggity logo" width="128" height="40"/></a></h1>

				<!-- gets nav-->
				<?php include 'views/navLoggedIn.php';?> 

					<div class="logout-button">
						<a href="?action=logout">
							<input type="submit" value="logout"/>
						</a>
					</div><!-- /.logout-button-->
				
		</div><!-- /.header-inner -->
		</header>

