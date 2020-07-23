<?php
include 'config/config.php';
 //delete data
 $delete_id=$_GET['user_id'];
 $query = "DELETE FROM products WHERE id='$delete_id'";
 $result = mysqli_query( $link,$query) or die("Query failed");
 if ($result)
 echo " Delete Successfully ! <a href='view_products.php'> back to menu
</a>";
 else
 echo "Problem occured !";
 mysqli_close($link);
?>