
<?php
$file = "pic/sl/".$_GET['s'].".jpg";

if($fp = fopen($file,"rb", 0))
{
   $picture = fread($fp,filesize($file));
   fclose($fp);
   // base64 encode the binary data, then break it
   // into chunks according to RFC 2045 semantics
   $base64 = chunk_split(base64_encode($picture));
   $tag = '<img ' .
          'src="data:image/jpeg;base64,' . $base64 .
          '"  />';
   echo $tag;
} ?>

<br/><legend>Welcome!</legend><br/>
Alchmist Fest registrar will allow you to register for <strong>
<?php echo $_GET['s'];?>'s 
</strong> events in an easy and convenient way.</br> If you have already registered log in.</br>Else please click on
<strong>Register</strong> to register with your unique key.</br><h4>Happy Competing</h4>
<br/>

