<?php
include_once 'logver.php';
include_once '../config.php';
if(!isset($_GET['n']) || !isset($_GET['sc']) || !isset($_GET['ec']) || !isset($_GET['i1']) || !isset($_GET['i2']))
    die("0");

$com = mysql_connect($dbh,$dbu,$dbp);
if(!$com)
{
    die("0");
}  else {

    mysql_select_db($db);
    $qry = "select max(id) 'id' from Al_cat where eid='".$_SESSION['eid']."'";
    $ans = mysql_query($qry);
    $id = mysql_fetch_array($ans);
    if(mysql_num_rows($ans)<1)
        $id['id']=0;
    else
        $id['id']+=1;
    echo $id['id'];
    
    $qry = " insert into Al_cat values('".$_SESSION['eid']."','".$id['id']."','".$_GET['n']."',".$_GET['sc'].",".$_GET['ec'].",'".$_GET['i1']."','".$_GET['i2']."');";
    mysql_query($qry);
    echo "<h3>".$_GET['n']."</h3><div id='".$id['id']."'>
        <button id='".$id."' class='btn btn-warning btn-mini'>Edit</button></div>";
}



?>
