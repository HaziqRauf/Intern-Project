<html>
<?php
session_start();
if(isset($_SESSION['admin']))
{
	
?>

<head>
	<title>UPDATE</title>

</head>

<body align=center>
	<style>
		body {
			background: rgb(63, 94, 251);
			background: linear-gradient(90deg, rgba(63, 94, 251, 1) 0%, rgba(252, 70, 107, 1) 100%);
			;
		}
	</style>
	<?php
        include 'config/config.php';
        $con = $mysql;
        mysqli_select_db($con,'bczsales');
        $sql = "select * from products";
        $records = mysqli_query($con,$sql);
        ?>
	<table align="center">
		<tr>
			<th colspan="4">
				<h2>Update Products Form</h2>
			</th>
		</tr>
		<tr>
			<th> Name </th>
			<th> Description </th>
			<th> Category </th>
			<th> Price: RM </th>
		</tr>
		<?php
            while($row = mysqli_fetch_array($records))
            {
                echo "<tr><form action='update_product.php' method=post>";
                echo "<td><input type=text name=name value='".$row['name']."'></td>";
                echo "<td><input height=500 type=text name=desc value='".$row['description']."'></td>";
                echo "<td><input type=text name=category value='".$row['category']."'></td>";
				echo "<td><input type=decimal name=price value='".$row['price']."'></td>";
				echo "<input type=hidden name=id value='".$row['id']."'>";
                echo "<td><input type=submit>";
                echo "</form></tr>";
            }
            ?>
	</table>

	<br>
	<form action="admin_menu.php"> <button>MENU </button></form>
</body>
<?php
}
else
{
	echo "<script>location.href='admin_login.php'</script>";
}
?>

</html>