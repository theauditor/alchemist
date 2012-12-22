<?php
session_start();
if(!isset($_SESSION['id']) || !isset($_SESSION['cid']) || !isset($_SESSION['flg']))
{
    session_destroy();
    die("<meta http-equiv=\"Refresh\" content=\"0; url=index.php\">");
}
if(!isset($_COOKIE['id']) || !isset($_COOKIE['cid']))
{
    session_destroy();
    die("<meta http-equiv=\"Refresh\" content=\"0; url=index.php\">");
}

if($_SESSION['id']!=$_COOKIE['id'] || $_SESSION['cid']!=$_COOKIE['cid'] || $_SESSION['flg']!='A')
{
    session_destroy();
    die("<meta http-equiv=\"Refresh\" content=\"0; url=index.php\">");
}

?>
