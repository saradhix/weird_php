<?php 
include "db.php";


$sql="select * from weirdnews";
$result = mysql_query($sql);

while($row = mysql_fetch_array($result))
{
	$id=$row['id'];
	$url=$row['url'];
	$title=$row['title'];
	$rating=$row['rating'];

	$json=[];
	$json['id']=$id;
	$json['url']=$url;
	$json['title']=$title;
	$json['rating']=$rating;

	$json_str=json_encode($json, true);
	echo $json_str."\n";
}
