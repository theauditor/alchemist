<?php include_once 'head.php';?>
<html>
    <head>
        <title>Alchemist - S | Cloud Event Registration </title>
<?php 
    include_once 'config.php';
    include_once 'libadd.php'; 
    include_once 'inc.php';
    $mcon = mysql_connect($dbh,$dbu,$dbp);
    
?>
       
    <style>
        html,
        body {
height: 100%;
}
 
    #wrap {
    min-height: 100%;
    height: auto !important;
    height: 100%;
    margin: 0 auto -60px;
    }
    #push,
    #footer {
    height: 60px;
    padding-bottom: 3px;
    }
    .log0{
    height: 0px;
    width: 0px;
    
    }
    .log1{
        height: 100%;
        width:100%px;
    }
   
    
    </style>
    
    <script>
    var $hold ;
    var $z;
    var $flg0;
    var $k1x;
    var $k2x;
     var $k3x;
   $(function(){
          
         $("#inputSchool").change(function(){
             
              $("#logo").html("<img src='pic/ld.gif'/>");
                $z = $("#inputSchool").val();     
                jQuery.get("slogo.php",{s: $z},function(data){
                    $("#logo").html(data);
                });
                
                $( ".log0" ).switchClass( "log0", "log1", 3000 );    
                
        });
       
    });
    
    
    
   function regX(){
              $hold = $("#Base").html();
              $("#Base").html("<img src='pic/ld.gif'/>");
              jQuery.get("regform.php",function(data){
              $("#Base").html(data);     
              });
   }          
    
    </script>
        
    </head>
    

    <body>
        <div id="wrap">
        <div class="container">
            <div class="row">
            <div class="span5" style="margin-top:100px;box-shadow: 0px 10px 25px #212121 " >
                <img src="pic/logo.png" alt="Alchemist" width="500px"/>
                <h6>&nbsp;School Fest Registrar</h6>
                <div style="padding-left:5px" id="Base">
                    
                    <form>
                        <fieldset>
                            <legend>&nbsp;Log In </legend>
                            <?php
                            if(!$mcon)
                            {
                                echo "<div class=\"ui-state-error\">
                                <span class=\"ui-icon ui-icon-alert\" style=\"float:left;margin-left: 3px;\"></span>
                                <b>Error: </b> Was unable to connect to database.</div>";
                            }
                            ?>
                            <div class="controll-group" style="padding-top:5px">
                                <div class="controls">
                                <input type="text" id="inputSchool" placeholder="School">
                                 <script>
        
        $("#inputSchool").autocomplete({
            source: [
                <?php
                mysql_select_db($db);
                $qry = "SELECT sname from Al_schools";
                $ans = mysql_query($qry);
                $nm = mysql_num_rows($ans);
                while($led = mysql_fetch_array($ans))
                {
                    echo "\"".$led[sname]."\"";
                    if($nm!=1 && $nm!=0)
                        echo ",";
                    $nm--;
                }
                mysql_free_result($ans);
                mysql_close();
                ?>
            ]
        });
   
    </script>
  
        
                                </div>
                                </div>
                             <div class="control-group">
                        <div class="controls">
                        <input type="text" id="inputUid" placeholder="Username">
                        </div>
                        </div>
                             <div class="control-group">
                    <div class="controls">
                    <input type="password" id="inputPassword" placeholder="Password">
                    </div>
                                 <button class="btn btn-inverse" id="linB" >LogIn</button>
                               
                                 <button class="btn btn-link" type="button" onclick="regX()" id="regB" >Register</button>
                                 
                             </div>
                        </fieldset>
                        

                    </form>
                </div>
            </div>
                <div class="span5">
                <div class="log0" style="margin-top:100px;" id="logo">
                </div>
                </div>
            </div>
        </div> 
             <div id="push"></div>
        </div>
        <div id="footer">
            <div style="float:right;overflow:hidden;padding-top:20px">
                <h7><b>Powered By</b></h7>
                <a href="http://www.xincoz.com"><img src="pic/XincozLogo.png" width="200px"/></a>
            </div>
        </div>
    </body>
  
</html>
