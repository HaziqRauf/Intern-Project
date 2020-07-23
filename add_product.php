<!DOCTYPE html>
<html>
<?php
session_start();
if(isset($_SESSION['admin']))
{
	
?>
<title>ADD DETAILS</title>
<style>
	body {
		background: rgb(63, 94, 251);
		background: linear-gradient(90deg, rgba(63, 94, 251, 1) 0%, rgba(252, 70, 107, 1) 100%);
	}
</style>

<body>

	<form action="upload2.php" method="POST">

		<p>Please fill in this form according to the product.</p>

		<label for="name"><b>Name</b></label>
		<input type="text" placeholder="Enter product Name " name="nameProduct" id="nameProduct" required>

		<label for="description"><b>Description</b></label>
		<input type="text" placeholder="Enter product description" name="description" id="description">


		<label for="price"><b>Price RM</b></label>
		<input type="decimal" placeholder="Enter product price" name="price" id="price" required>
		<button type="submit" name="save" value="Submit">Save</button>
	</form>
</body>
<?php
}
else
{
	echo "<script>location.href='admin_login.php'</script>";
}
?>

</html>