<html>
    <head>
        <title>Alchemist | Administrator</title>
    </head>
    <?php 

    include_once 'libadd.php'; 
    
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
    
    #basebox{
        width:40%;
        box-shadow: 0px 10px 15px #000000;
        margin-left: auto;
        margin-right: auto;
        margin-top: 20%;
        padding: 20px;
        margin-top: auto;
        height: auto;
        
    }
   </style>
   <script>
       var $u;
       var $p;
   $(function(){
       $("#in").click(function(){
           $u = $("#un").val();
           $p = $("#pw").val();
           jQuery.post("adminauth.php",{u: $u, p: $p},function(data){
              if(data==1)
                  {
                      window.location= "Cpanel.php";
                  }else
                      {
                          $("#hider").animate({opacity:1,height:30},1000);
                      }
           });
       });
      
   });
   
   </script>
</head>
<div id="wrap">
    <div class="container">
        <div id="basebox" >
            <img src="../pic/logo.png"/>
            <legend>Administrator Login</legend>
            <div style="text-align:center">
                <form>
                    <fieldset>
                        <input type="text" style="width:80%;height: 10%;font-size: large" placeholder="Username" id="un"/>
                        <input type="password" style="width:80%;height: 10%;font-size: larger" placeholder="Password" id="pw"/>
                        <div id="hider" style="height:0px;opacity: 0">
                        <div class="ui-state-error">
                            <span class="ui-icon ui-icon-alert" style="float:left;margin-left: 3px;"></span>
                            <b>ERROR : </b>The username and password did not match our records.
                        </div>
                        </div>
                        <div>
                            <a type="button"  class="btn btn-inverse" id="in">Login</a>
                        </div>
                    </fieldset>
                </form>
            </div>
                
        </div>
    </div>
    <div id="push"></div>
</div>
<div  id="footer">
    <div style="float:right;overflow:hidden;padding-top:20px">
                <h7><b>Powered By</b></h7>
                <a href="http://www.xincoz.com"><img src="../pic/XincozLogo.png" width="200px"/></a>
            </div>
</div>
</div>
