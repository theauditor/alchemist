<?php

session_start();
if(!isset($_SESSION['id']) || !isset($_SESSION['cid']) || !isset($_SESSION['flg']))
{
    session_destroy();
    die("<meta http-equiv=\"Refresh\" content=\"0; url=index.php\">");
}

setcookie("id",$_SESSION['id'],time()+60*60*2);
setcookie("cid",$_SESSION['cid'],time()+60*60*2);


echo "Redirecting....";
die("<meta http-equiv=\"Refresh\" content=\"1; url=Cpanel.php\">");
?>
