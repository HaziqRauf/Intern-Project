<!DOCTYPE html>
<?php
session_start();
if(isset($_SESSION['admin']))
{
	
?>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width-device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="libs/css/main.css">

	<title>Admin</title>
</head>

<body align="center">
	<style>
		body {
			background: rgb(63, 94, 251);
			background: linear-gradient(90deg, rgba(63, 94, 251, 1) 0%, rgba(252, 70, 107, 1) 100%);
			;
		}
	</style>
	<nav id="overlay" style="width: 1400px; height: 700px;">
		<img src="libs/images/close.svg" class="close-btn" id="close-menu">

		<ul>
			<li>
				<a href="upload_image.php">ADD</a>
				<span>Got a new stuff huh? Upload it to publish it</span>
			</li>
			<li>
				<a href="view_edit.php">UPDATE</a>
				<span>Got something new? Keep up to date</span>
			</li>
			<li>
				<a href="view_products.php">DELETE</a>
				<span>Need to remove something? Just kill it.</span>
			</li>
			<li>
				<a href="search.php">SEARCH</a>
				<span>Too much data to find? Find using the easier way.</span>
			</li>
		</ul>
	</nav>

	<header>
		<img src="libs/images/Menu.svg" class="menu-btn" id="open-menu">

	</header>
	<section>
		<h1>Hello Admin!, Got work to do? Just click at the menu.</h1>
	</section>
	<form action="logout.php"> <button>Log out</button></form>

	<script>
		var overlay = document.getElementById('overlay');
		var closeMenu = document.getElementById('close-menu');

		document.getElementById('open-menu').addEventListener('click', function() {
			overlay.classList.add('show-menu');

		});

		document.getElementById('close-menu').addEventListener('click', function() {
			overlay.classList.remove('show-menu');

		});
	</script>
</body>

</html>
<?php
}
else
{
	echo "<script>location.href='admin_login.php'</script>";
}
?>