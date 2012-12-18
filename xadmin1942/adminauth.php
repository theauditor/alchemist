<?php
include_once '../config.php';
if(!isset($_POST['u']) || !isset($_POST['p']))
{
    die("0");
}

mysql_connect($dbh,$dbu,$dbp);
mysql_select_db($db);

$u = mysql_escape_string(strtolower(trim($_POST['u'])));
$qry = "SELECT * from Al_MAuth where uid='$u';";
$ans = mysql_query($qry);
if(mysql_num_rows($ans)!=1)
{
    die("0");
}

$res = mysql_fetch_array($ans);
mysql_free_result($ans);
$xi = $res['sdi'].$u.$_POST['p'];
$xi = md5($xi);
if($xi==$res['phash'])
{
    session_start();
    $_SESSION['id'] = md5(session_id());
    $_SESSION['cid']= rand(10000, 200000);
    $_SESSION['flg']="A";
    setcookie("id", $_SESSION['id'],60*60*2);
    setcookie("cid",$_SESSION['cid'],60*60*2);
    die("1");
}

?>
