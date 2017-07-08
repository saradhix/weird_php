<?php 
$dbcnx = @mysql_connect ("localhost", "root", "");
if (!$dbcnx)
  {
    echo ("<P>Unable to connect to the "."database server at this time.</P>".
	  mysql_error ());
    exit ();
  }
if (!@mysql_select_db ("weird"))
  {
    echo ("<P>Unable to locate the database");
    exit ();

  }
?>
