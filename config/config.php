
<?php
$databaseHost = "localhost";
$databaseUsername = "root";
$databasePassword = "";
$databaseName = "bczsales";

$mysql = mysqli_connect ($databaseHost,$databaseUsername,$databasePassword,$databaseName);
$link = mysqli_connect($databaseHost,$databaseUsername,$databasePassword,$databaseName)or die("Could not connect");
//connection to database
$db = mysqli_select_db( $link,"bczsales")or die("Could not select
database");
if(!$mysql)
{
    echo "Connection Failed";
}
else
{
    //echo "Connection Successfull";
}
    
?>