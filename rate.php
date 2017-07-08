<?php 
include "db.php";
$id=$_GET['id'];
$rating=$_GET['rating'];


$sql="update weirdnews set rating=$rating where id=$id limit 1";
mysql_query($sql) or die("Failed to execute $sql ".mysql_error());
header("Location:index.php");


