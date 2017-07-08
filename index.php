<?php 
include "db.php";

$sql="select * from weirdnews where rating = 0";
$result = mysql_query($sql) or die("Query failed $sql ".mysql_error());
$num=mysql_num_rows($result);

$random_number=mt_rand(1,$num);

for($i=0;$i<$random_number;$i++)
{
    $row=mysql_fetch_array($result);
}

$id=$row['id'];
$url=$row['url'];
$title=$row['title'];

?>

<html>
<link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
<link href='index.css' rel='stylesheet' type='text/css'>
<body>
<table border='0' width="80%" cellspacing="0" cellpadding="5" align='center'>
<tr>
<td><?php echo "$id  $url";?></td>
</tr>
<tr>
<td><h1><?php echo $title;?></h1></td>
</tr>
<tr>
<form method="GET" action='rate.php'>
<input type="hidden" name="id" value="<?php echo $id;?>"/>
<input type="hidden" name="rating" value="0"/>
<input type="submit" name="submit" value="Do not use" class="btn btn-danger">
</form>&nbsp;
<form method="GET" action='rate.php'>
<input type="hidden" name="id" value="<?php echo $id;?>" class="button"/>
<input type="hidden" name="rating" value="1"/>
<input type="submit" name="submit" value="1-Not Weird" class="btn btn-primary">
</form>
<form method="GET" action='rate.php'>
<input type="hidden" name="id" value="<?php echo $id;?>"/>
<input type="hidden" name="rating" value="2"/>
<input type="submit" name="submit" value="2-Slightly Weird" class="btn btn-success">
</form>
<form method="GET" action='rate.php'>
<input type="hidden" name="id" value="<?php echo $id;?>"/>
<input type="hidden" name="rating" value="3"/>
<input type="submit" name="submit" value="3-Considerably Weird" class="btn btn-info">
</form>
<form method="GET" action='rate.php'>
<input type="hidden" name="id" value="<?php echo $id;?>"/>
<input type="hidden" name="rating" value="4"/>
<input type="submit" name="submit" value="4-Heavily Weird" class="btn btn-warning">
</form>
</tr>
</table>
<iframe width="100%" height="100%" src=<?php echo $url;?>/>
</body>
</html>
