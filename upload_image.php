<html>
<?php
session_start();
if(isset($_SESSION['admin']))
{
	
?>

<title>UPLOAD</title>

<body>
	<style>
		body {
			background: rgb(63, 94, 251);
			background: linear-gradient(90deg, rgba(63, 94, 251, 1) 0%, rgba(252, 70, 107, 1) 100%);
		}
	</style>
	<form action="upload.php" align="center" method="post" enctype="multipart/form-data">
		Select image to upload:
		<br>
		<input type="file" name="file[]" id="file" multiple="">
		<br>
		<br>

		<input type="submit" value="Upload Image" name="submit">
	</form>
	<form align="center" action="admin_menu.php"> <button>Menu</button></form>
</body>
<?php
}
else
{
	echo "<script>location.href='admin_login.php'</script>";
}
?>

</html>