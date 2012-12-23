<?php
include_once 'logver.php';
include_once '../config.php';
include_once 'libadd.php'; 
//include_once 'inc.php';
?>
<html>
    <head>
        <script>
            var $cn, $sc, $ec, $ic1, $ic2;

 function spca(st)
{
     var iChars = "!@#$%^&*()+=-[]\\\';,./{}|\":<>?~_"; 
   for (var i = 0; i < st.length; i++) 
   {
  	
        if (iChars.indexOf(st.charAt(i)) != -1) 
        {
  	   	return true;
        }
   }
   return false;
}




$(function(){

$("#acc").accordion();
  
  
                $("#AddCatB").click(function(){
                    $("#addModal").modal('show');
                });
                
            $("#AddB").click(function(){
                $cn =    $("#cnamI").val();
                $sc = $("#clsI1").val();
                $ec = $("#clsI2").val();
                $ic1 = $("#In1").val();
                $ic2 = $("#In2").val();
                
                jQuery.get("ccat.php",{n: $cn, sc: $sc, ec: $ec, i1:$ic1,i2: $ic2}, function(data){
                    $("#hider2").animate({opacity:0,height:0}, 1000);
                    $("#hider").animate({opacity:0,height:0}, 1000);
                    if(data==0)
                        {
                            
                            $("#hider").animate({opacity:1,height:30}, 1000);
                            
                            
                        }else
                            {
                                $("#acc").append(data).accordion('destroy').accordion();
                                
                                $("#cnamI").val('');
                                $("#clsI1").val('');
                                $("#clsI2").val('');
                                $("#In1").val('');
                                $("#In2").val('');
                                $("#hider2").animate({opacity:1,height:30}, 1000);
                                
                               
                                
                            }
                });
            });
  
});      

   
   
 
    
</script>
        
        
        <style>
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
            body {  
                    padding-top: 60px;  
                    padding-bottom: 40px;  
                    }  
           .nav li {  
                    padding-top: 5px;  
                    }  
                    .holder{
                        width:  80%;
                        padding-top: 5%;
                            padding-bottom: 5%;
                        margin-left: auto;
                        margin-right: auto;
                        margin-top: 20px;
                        margin-bottom: 10px;
                        box-shadow: 0px 10px 15px #000000;
                    }
                    #Arc{
                        width:80%;
                        margin-left: auto;
                        margin-right: auto;
                    }
              
        </style>
    </head>
    <body>
        
        <div id="wrap">
            <div class="container">
                <div class="navbar  navbar-fixed-top">
            <div class="navbar-inner">
                <div class="containerX">
                    
                    
                     
                     <img src="../pic/logo.png" width="175" />    
                    <img src="../pic/sl/<?php echo $_SESSION['sname']; ?>" width="111" height="30" alt="logo" />   
                      
                    
                     
                    
                </div>
            </div>
        </div>
                
                
                <div class="holder">
                    <legend>Categories</legend>
                    <div id="Arc">
                    <div id="acc">
                    <?php
                    mysql_connect($dbh,$dbu,$dbp);
                    mysql_select_db($db);
                    
                    $qry = "select  * from  Al_cat where eid='".$_SESSION['eid']."' order by nam;";
                    
                    $ans = mysql_query($qry);
                   ?>
                        
                        <?php
                    if(mysql_num_rows($ans)==0)
                    {
                        echo "No Categories found.";
                    }else
                    {
                        while($datx = mysql_fetch_array($ans))
                        {
                            echo "<h3>".$datx['nam']."</h3>";
                            echo "<div id=\"".$datx['id']."box\"> .. </div>";
                                    
                        }
                    }
                    
                    ?>
                         
                    </div>
                        <button  id="AddCatB" type="button" class="btn btn-link" >+ Add Category</button>
                    </div>
                    <div>
                    
                    
                    <!--  ADD CAT MODAL -->
<div id="addModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
<h3 id="myModalLabel">Add Category</h3>
</div>
<div class="modal-body" id="addmodbod">
    <form>
        <fieldset>
        <div>
        <input style="height:30px;width:60%" type="text" id="cnamI" maxlength="30" placeholder="Category Name"/>
        </div>
            <b>Classes:</b>
        </br> From <select id="cls1I" placeholder="Class" name="cls" class="sel">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                        </select>  
        To <select id="cls2I" placeholder="Class" name="cls" class="sel">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                        </select> 
        <div>
       <input style="height:30px;width:60%" id="In1" type="text" placeholder="Incharge One"/>
        </div>
        <div>
       <input style="height:30px;width:60%" id="In2" type="text" placeholder="Incharge Two"/>
        </div>
        <div id="hider" style="height:0px;opacity: 0">
                        <div class="ui-state-error">
                            <span class="ui-icon ui-icon-alert" style="float:left;margin-left: 3px;"></span>
                            <b>ERROR : </b>Failed to create a category.
                        </div>
                        </div>
        <div id="hider2" style="height:0px;opacity: 0">
                        <div class="alert alert-success">
                            <span class="ui-icon ui-icon-alert" style="float:left;margin-left: 3px;"></span>
                            <b>Congratulation : </b>Category Added.
                        </div>
                        </div>
        
        </fieldset>
    </form>
</div>
<div class="modal-footer">
<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
<button class="btn btn-inverse" id="AddB">Add +</button>
</div>
</div>
                    <!--- ADD CAT MODAL END-->
                    </div>
                </div>
                
                
            </div>
            <div id="push"></div>
        </div>
        
        <!--- ACTIVE MOD --->
        <div id="randMod" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
<h3 id="myModalLabel">Add Category</h3>
</div>
<div class="modal-body" id="Rmod">
    
</div>
<div class="modal-footer">
<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
<button class="btn btn-inverse" id="AddB">Add +</button>
</div>
</div>
        
        <!---END ACTIVE MOD --->
        
        
        
        
        
        
        
          <div  id="footer">
    <div style="float:right;overflow:hidden;padding-top:20px">
                <h7><b>Powered By</b></h7>
                <a href="http://www.xincoz.com"><img src="../pic/XincozLogo.png" width="200px"/></a>
            </div>
</div>
        
        
        
    </body>
</html>