<!DOCTYPE html>
<html>
<?php
session_start();
if(isset($_SESSION['admin']))
{
	
?>

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>PRODUCT DETAILS</title>
	<style>
		body {
			background: rgb(63, 94, 251);
			background: linear-gradient(90deg, rgba(63, 94, 251, 1) 0%, rgba(252, 70, 107, 1) 100%);
		}
	</style>
</head>

<body align="center">
	<?php include 'config/config.php';
//get the data
    $id=$_GET['user_id'];
    $query="SELECT * FROM  products WHERE id='$id'";
$result = mysqli_query( $link,$query) or die("Query failed");
// SQL statement for checking
?>
	<h2>Products Full Information</h2>
	<table align="center" border="1">
		<?php while ( $user = mysqli_fetch_array( $result ))
{
    $id=$user['id'];
    $name=$user['name'];
    $desc= $user['description'];
    $category= $user['category'];
	$price= $user['price'];

}
    
?>
		<tr>
			<td><strong>ID</strong></td>
			<td> <?php echo $id ?></td>
		</tr>
		<tr>
			<td><strong>NAME</strong></td>
			<td> <?php echo $name ?></td>
		</tr>
		<tr>
			<td><strong>DESCRIPTION</strong></td>
			<td> <?php echo $desc ?></td>
		</tr>
		<tr>
			<td><strong>PRODUCT CATEGORY</strong></td>
			<td> <?php echo $category ?></td>
		</tr>
		<tr>
			<td><strong>PRODUCT PRICE</strong></td>
			<td> <?php echo $price ?></td>
		</tr>
	</table>

	<br>
	<form action="view_products.php"> <button>LIST </button></form>
</body>
<?php
}
else
{
	echo "<script>location.href='admin_login.php'</script>";
}
?>

</html>