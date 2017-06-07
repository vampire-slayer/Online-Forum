<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="description" content="A short description." />
	<meta name="keywords" content="put, keywords, here" />
	<title>Programming is Fun! Forum</title>
	<link rel="stylesheet" href="style.css" type="text/css">
</head>
<style>
	body {
		background-image: url("bg11.png");
	}

	h1
	{
		text-align: center;
	}

	h1 a
	{
		font-family: Broadway;
		color: #FFF;
		font-size: 250%;
	}

	#wrapper {
		width: 1100px;
		margin: 0 auto; 			
	}

	#content {
		background-color: #fff;
		border: 10px solid green;
		float: left;
		font-family: Courier;
		padding: 20px 20px;
		text-align: left;
		width: 100%;				
	}

	#menu {
		float: left;
		border: 10px solid green;
		border-bottom: none;		
		clear: both;				
		width:100%;
		height:40px;
		padding: 10px 20px;
		background-color: white;
		text-align: left;
		font-size: 125%;
	}

	#menu a:hover {
		background-color: green;
	}

	#userbar {
		background-color: white;
		float: right;
		width: 300px;
	}

	#footer {
		clear: both;
	}

	table {
		border-collapse: collapse;
		width: 100%;
	}

	table a {
		color: #000;
	}

	table a:hover {
		color:red;
		text-decoration: none;
	}

	th {
		background-color: darkgreen;
		color: #F0F0F0;
	}

	td {
		padding: 5px;
	}

	h1, #footer {
		font-family: Arial;
		color: #F1F3F1;
	}

	h3 {margin: 0; padding: 0;}

	.item {
		background-color: darkgreen;
		border: 1px solid #032472;
		color: #FFF;
		font-family: Courier;
		padding: 3px;
		text-decoration: none;
	}

	.leftpart {
		width: 70%;
	}

	.rightpart {
		width: 30%;
	}

	.small {
		font-size: 75%;
		color: #373737;
	}
	#footer {
		font-size: 65%;
		padding: 3px 0 0 0;
	}

	.topic-post {
		height: 100px;
		overflow: auto;
	}

	.post-content {
		padding: 30px;
	}

	textarea {
		width: 500px;
		height: 200px;
	}
</style>
<body>
	<h1><a>Programming is Fun!</a></h1>
	<div id="wrapper">
		<div id="menu">
			<a class="item" href="index.php">Forum Home</a> -
			<a class="item" href="create_topic.php">Create a topic</a> -
			<a class="item" href="create_cat.php">Create a category</a>

			<div id="userbar">
				<?php
				session_start();
				if(isset($_SESSION['signed_in'])){
					echo 'Welcome, ' . $_SESSION['user_name'] . '. ';
					echo 'Not you?' . ' ' . '<a href="signout.php">Sign out</a> ';

				}
				else
				{
					echo '<a href="signin.php">Sign in</a> or <a href="signup.php">Create an account</a>.';
				}
				?>
			</div>
		</div>
		<div id="content">



