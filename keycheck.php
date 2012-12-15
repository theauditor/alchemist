<?php
include_once "config.php";
$mcon = mysql_connect($dbh,$dbu,dbp);
echo mysql_error();
if($mcon)
{
    die( "<div class=\"ui-state-error\">
        <span class=\"ui-icon ui-icon-alert\" style=\"float:left;margin-left: 3px;\"></span>
        <b>Note: </b> Sorry, Server error. Try after some time.</div> ");
}
if((!isset($_GET['k1']) || !isset($_GET['k2']) || !isset($_GET['k3'])) ||
         (strlen($_GET['k1'])!=5 || strlen($_GET['k2'])!=5 || strlen($_GET['k3'])!=5)
        )
{
     die( "<div class=\"ui-state-error\">
        <span class=\"ui-icon ui-icon-alert\" style=\"float:left;margin-left: 3px;\"></span>
        <b>Note: </b> Invalid Key.</div> ");
}

 $key = mysql_escape_string($_GET['k1']);
 $key = $key.  mysql_escape_string($_GET['k2']);
 $key = $key. mysql_escape_string($_GET['k3']);
 
 

?>


