<?php
//Connection to database
include 'config/config.php';

$output = '';
if(isset($_POST['search']))
{
    $searchq = $_POST['search'];
    
    $query =  "Select * from products where category like '%$searchq%' or name like '%$searchq%' ";
    $result = mysqli_query( $link,$query)or die("<br>could not search!");
    $count = mysqli_num_rows($result);
    if( $count != 0)
    {
        while($row = mysqli_fetch_array($result)) 
            {
            $name = $row['name'];
            $desc = $row['description'];
            $category = $row['category'];
            $price = $row['price'];
            
            
            $output .= '<div>'.$name.'<br>'.$desc.'<br>'.$category.'<br>'.$price.'</div>';
            }
    }
    else
    {
        $output = '<br>There was no search result!';
    }
}
?>
<html align="center">
<?php
session_start();
if(isset($_SESSION['admin']))
{
	
?>

<head>
	<title>SEARCH</title>
</head>

<body>
	<style>
		body {
			background: rgb(63, 94, 251);
			background: linear-gradient(90deg, rgba(63, 94, 251, 1) 0%, rgba(252, 70, 107, 1) 100%);
		}
	</style>
	<br>
	<h1> SEARCH PRODUCT DETAIL </h1>
	<br>
	<form action="search.php" method="POST">
		<input name="search" type="text">
		<input type="submit" name="Submit" value="search">
		<div style="margin-top: 10px;background-color:#ecb1b1">
			<?php print ("$output");?>
		</div>

	</form>

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