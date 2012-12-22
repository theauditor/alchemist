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
}
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
    $n = trim($n);
    $n = strtolower($n);
    $n = ucwords($n);
    $n = mysql_escape_string($n);
    $c = $_POST['c'];
    $c = trim($c);
    
    $d = $_POST['d'];
    $d = trim($d);
    
    $a = $_POST['a'];
    $a = trim($a);
    
    $r = $_POST['r'];
    $r = trim($r);
    
    $p = $_POST['p'];
    $p = trim($p);
    
    $u = $n[0].$n[1].$n[2].$c.$d.$r.$_SESSION['eid'];
    $u = strtoupper($u);
    $pass = $p.$a;
    $pass = md5($pass); 
    mysql_select_db($db);
    
    $qry = "INSERT INTO Al_users values('".$u."','".$_SESSION['eid']."','".$a."',".
            $r.",".$c.",'".$d."','".$pass."',CURRENT_TIMESTAMP,'$n');";
    $qs = mysql_query($qry);
    
    $qry = "update  Al_key set stat=1,pid='$u' where akey='".$_SESSION['key']."';";
    
    session_destroy();
?>


<legend>
    Registration Complete
</legend>
<div style="Padding:5px">
   
    <div style="padding:10px;text-align: center">
        Congratulations. You have registered.
        <div class="ui-state-highlight">
        <span class="ui-icon ui-icon-info" style="float:left;margin-left: 3px;"></span>
        <b> IMPORTANT! Note down your username, It will not be shown again.</b>
        </div>
        <div style="font-size: xx-large;padding:10px ">
            <b><?php echo $u;?></b>
        </div>
        <br/>
        <button class="btn btn-link" onclick="document.location.reload(true)" type="button">Login</button>
    </div>
    
</div>
