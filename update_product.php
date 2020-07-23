<?php
include 'config/config.php';
$con = $mysql;
mysqli_select_db($con,'bczsales');
$sql = "UPDATE products SET name='$_POST[name]',description='$_POST[desc]',category='$_POST[category]',price='$_POST[price]' WHERE id='$_POST[id]'";

        if(mysqli_query($con,$sql))
            header("refresh:1; url=view_edit.php");
        else
            echo "Not Updated";

?>