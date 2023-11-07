<?php 

require "../db.php";
$q = $_REQUEST["q"];


$sql="select * FROM album WHERE name='$q'";
$status=mysqli_query($db, $sql);
$data=mysqli_num_rows($status);

if($data==1)
{
echo "<p style='color:red; font-weight:700;'>Album already exists<p>";
}

?>