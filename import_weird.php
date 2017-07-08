<?php
include "db.php";

$source = 'weirdnews.json';

$fp=fopen($source,"r");

while($line=fgets($fp))
{
    echo $line;
    $json=json_decode($line,true);
    $url=$json['url'];
    $title=$json['title'];
    $url=mysql_real_escape_string($url);
    $title=mysql_real_escape_string($title);
    echo "url=$url title=$title\n";
    $sql="insert into weirdnews(url,title) values('$url','$title')";
    echo "SQL=$sql\n";
    mysql_query($sql) or die("Execution error".mysql_error());
}
