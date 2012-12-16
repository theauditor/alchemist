<?php
session_start();

if(!isset($_POST['n']) || !isset($_POST['c']) || !isset($_POST['d']) || !isset($_POST['r'])
        || !isset($_POST['a']) || !isset($_POST['p']))
{
    die("<div class=\"ui-state-error\" >
            <span class=\"ui-icon ui-icon-alert\" style=\"float:left;margin-left: 3px;\"></span>
            <b>Alert : Invalid Operation.</b>
                </div>");
}

if(!isset($_SESSION['key']) || !isset($_SESSION['sid']) || !isset($_SESSION['eid'])){
    die("<div class=\"ui-state-error\" >
            <span class=\"ui-icon ui-icon-alert\" style=\"float:left;margin-left: 3px;\"></span>
            <b>Alert : Invalid Operation.</b>
                </div>");
    include_once 'config.php';
    $mcon = mysql_connect($dbh,$dbu,$dbp);
    if(!$mcon)
    {
        die("<div class=\"ui-state-error\" >
            <span class=\"ui-icon ui-icon-alert\" style=\"float:left;margin-left: 3px;\"></span>
            <b>Error : Critical Server Error .</b>
                </div>");
    }
    
    $n = $_POST['n'];
    $c = $_POST['c'];
    $d = $_POST['d'];
    $a = $_POST['a'];
    $r = $_POST['r'];
    $p = $_POST['p'];
    
    $u = $n[0].$n[1].$n[2].$c.$d.$r.$_SESSION['eid'];
    $pass = $p.$a;
    $pass = md5($pass); 
    mysql_select_db($db);
    
    $qry = "INSERT INTO Al_users data('".$u."','".$_SESSION['eid']."','".$a."',".
            $r.",".$c.",'".$d."','".$pass."',CURRENT_TIMESTAMP);";
    $qs = mysql_query($qry);
    
    echo "$................";
    
}

?>


<legend>
    Registration Complete
</legend>
