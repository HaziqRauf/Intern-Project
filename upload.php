<?php
session_start();
if(isset($_SESSION['admin']))
{
	
include ('config/config.php');

$phpFileUploadErrors = array(
0 => 'There is no error, the file uploaded with success',
1 => 'The uploaded file exceeds the upload_max_filesize directive in php.ini',
2 => 'The uploaded file exceeds MAX_FILE_SIZE directive that was specified in the HTML form',
3 => 'The uploaded file was only partially uploaded',
4 => 'No file was uploaded',
6 => 'Missing a temporary folder',
7 => 'Failed to write file to disk',
8 => 'A php extension stopped the file upload.',
);
	function reArrayFiles($file_post)
{
    $file_ary=array();
    $file_count=count($file_post['name']);
    $file_keys=array_keys($file_post);
    
    for($i=0; $i<$file_count ; $i++)
    {
        foreach($file_keys as $key)
        {
            $file_ary[$i][$key] = $file_post[$key][$i];
        }
    }
    return $file_ary;
}
if(isset($_FILES['file']))
{
    $file_array = reArrayFiles($_FILES['file']);
    //pre_r($file_array);
    for( $i=0 ;$i<count($file_array) ; $i++)
    {
        if($file_array[$i]['error'])
        {
            ?><div class="alert alert-danger">
	<?php echo $phpFileUploadErrors[$file_array[$i]['error']];
            ?></div><?php
        }
        else
            {
                $extensions = array ('jpg','png','jpeg');
                $file_ext = explode('.',$file_array[$i]['name']);
                $file_ext = end($file_ext);
                if(!in_array($file_ext,$extensions))
                {
                    ?><div class="alert alert-danger">
	<?php echo "{$file_array[$i]['name']} -Invalid File extension!";
            ?></div><?php
                }
                else
                {
                    move_uploaded_file($file_array[$i]{'tmp_name'},"uploads/images/".$file_array[$i]['name']);
                    $filename = mysqli_escape_string($mysql,$file_array[$i]['name']);
                    $sql = "INSERT INTO product_images (name) VALUES ('$filename')";
                    $result = mysqli_query($mysql,$sql);
                    echo $filename;
                    header ("refresh:1; url=add_product.php");

            ?><div class="alert alert-danger">
	<?php echo $phpFileUploadErrors[$file_array[$i]['error']];
            ?></div><?php
                }
            }
    }
}




function pre_r($array)
{
    echo '<pre>';
    print_r($array);
    echo '</pre>';
}

}
else
{
	echo "<script>location.href='admin_login.php'</script>";
}
?>