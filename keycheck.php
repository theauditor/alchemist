<?php
session_start();
include_once "config.php";

$mcon = mysql_connect($dbh, $dbu, $dbp);
echo mysql_error();
if(!$mcon)
{
    die( "<div class=\"ui-state-error\">
        <span class=\"ui-icon ui-icon-alert\" style=\"float:left;margin-left: 3px;\"></span>
        <b>Critical : </b> Sorry, Server error. Try after some time.</div> ");
}
if((!isset($_GET['k1']) || !isset($_GET['k2']) || !isset($_GET['k3'])) ||
         (strlen($_GET['k1'])!=5 || strlen($_GET['k2'])!=5 || strlen($_GET['k3'])!=5)
        )
{
     die( "<div class=\"ui-state-error\">
        <span class=\"ui-icon ui-icon-alert\" style=\"float:left;margin-left: 3px;\"></span>
        <b>Error: </b> Invalid Key.</div> ");
}

 $key = mysql_escape_string($_GET['k1']);
 $key = $key.  mysql_escape_string($_GET['k2']);
 $key = $key. mysql_escape_string($_GET['k3']);
 
 mysql_select_db($db);
 $qry = "SELECT Al_key.eid, Al_key.stat, DATEDIFF( Al_events.end_date,
CURRENT_TIMESTAMP ) AS days, ev_name, Al_schools.sname, Al_schools.sid
FROM Al_key, Al_events, Al_schools
WHERE Al_key.akey = '$key'
AND Al_events.eid = Al_key.eid
AND Al_schools.sid = Al_events.sid;";
 $ans = mysql_query($qry);

 
 if(mysql_num_rows($ans)!=1)
 {
      die( "<div class=\"ui-state-error\">
        <span class=\"ui-icon ui-icon-alert\" style=\"float:left;margin-left: 3px;\"></span>
        <b>Error : </b> The key you provided is not valid.</div> ");
 }

 $vals = mysql_fetch_array($ans);
 
 if($vals['days']<0)
 {
     if($vals['days']==-1)
     {
         die( "<div class=\"ui-state-error\">
        <span class=\"ui-icon ui-icon-alert\" style=\"float:left;margin-left: 3px;\"></span>
        <b>Error: </b> The registration has closed ".($vals['days']*-1)." day ago.</div> ");
     }else
     {
     die( "<div class=\"ui-state-error\">
        <span class=\"ui-icon ui-icon-alert\" style=\"float:left;margin-left: 3px;\"></span>
        <b>Error: </b>The registration have closed ".($vals['days']*-1)." days ago.</div> ");
 
     }
 }
 
 if($vals['stat']==1)
 {
      die( "<div class=\"ui-state-error\">
        <span class=\"ui-icon ui-icon-alert\" style=\"float:left;margin-left: 3px;\"></span>
        <b>Error </b> The key you are trying have already been used.</div> ");
 }
 
 $_SESSION['key']=$key;
 $_SESSION['sid']=$vals['sid'];
 $_SESSION['sname']=$vals['sname'];
 $_SESSION['ename']=$vals['ev_name'];
 $_SESSION['eid']=$vals['eid'];
 
 mysql_free_result($ans);
 mysql_close();
die('1');
?>


