<?php
session_start();
if(isset($_SESSION['admin']))
{
include ('config/config.php');

$id='0';
$name = mysqli_escape_string($mysql,$_POST['nameProduct']);
$desc = mysqli_escape_string($mysql,$_POST['description']);
$price = mysqli_escape_string($mysql,$_POST['price']);

        if(mysqli_query($mysql,"INSERT INTO products(
        name,description,price) VALUES('$name','$desc','$price')"))
        {
            echo "Data Connection Success!";
        }
        else
        {
            echo "Data Connection unsuccessful :( ";
            header ("location:upload.php");
        }
echo $id;
$query="SELECT id FROM products WHERE name like '$name'";
$result = mysqli_query( $link,$query) or die("Query failed");

		while ( $user = mysqli_fetch_array( $result ))
		{
    			$name=$user['name'];
				$id= $user['id'];
				echo $id;
				break;
		}
$con = $mysql;
mysqli_select_db($con,'bczsales');
$sql = "UPDATE `product_images` SET `product_id`=$id WHERE `product_id` like 0 ";
        		if(mysqli_query($con,$sql))
				{
					echo "Updated";
					header ("location:success.php");
				}
       			 else
            		echo "Not Updated";
	
	}
else
{
	echo "<script>location.href='admin_login.php'</script>";
}
?>