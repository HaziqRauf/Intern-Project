<!DOCTYPE html>
<html lang="en">
<?php
session_start();
if(isset($_SESSION['admin']))
{
	
?>

<head>
	<meta charset="utf-8">
	<title>VIEW</title>
	<link rel="stylesheet" type="text/css" href="">
</head>
<style>
	body {
		background: rgb(63, 94, 251);
		background: linear-gradient(90deg, rgba(63, 94, 251, 1) 0%, rgba(252, 70, 107, 1) 100%);
	}
</style>

<body align=center>
	<?php
//Connection to database
include 'config/config.php';
$query="Select * from products order by name Asc";
$result = mysqli_query( $link,$query) or die("Query failed");
//SQL statement for checking
?>
	<table align="center" border="1px" style="width:1080px;">

		<tr>
			<th colspan="6">
				<h2>Products Record</h2>
			</th>
		</tr>
		<t>

			<th> Products ID </th>
			<th> Products Name </th>
			<th> Products Description </th>
			<th> Products Category </th>
			<th> Products Price </th>
			<th> Action </th>
		</t>
		<?php
//data looping
while($row = mysqli_fetch_array($result))
{ 
	?>

		<tr>
			<form method="post" action="view_detail.php">

				<td align=center><a href="view_detail.php?user_id=<?php print($row['id']);?>"><?php echo $row['id'];?></a></td>
				<td align=center width="150" value="name"><?php echo $row['name'];?></td>

				<td align=center width="521"><?php echo $row['description'];?></td>
				<td align=center width="150"><?php echo $row['category'];?></td>
				<td align=center width="150"><?php echo $row['price'];?></td>

				<td>
					<div align="center"><a href="delete.php?user_id=<?php print
($row['id']);?>">delete </a></div>
				</td>
			</form>
		</tr>
		<?php
 // looping close
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