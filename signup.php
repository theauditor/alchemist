<?php session_start();

if(!isset($_SESSION['key']) || !isset($_SESSION['sid']) || !isset($_SESSION['eid'])){
    die("<div class=\"ui-state-error\" >
            <span class=\"ui-icon ui-icon-alert\" style=\"float:left;margin-left: 3px;\"></span>
            <b>Alert : Invalid Operation.</b>
                </div>");
}

?>
<legend>Register</legend>
 <script>
     var $val;
     var $val2;
     
     function spcan(st)
{
     var iChars = "!@#$%^&*()+=-[]\\\';,./{}|\":<>?~_1234567890"; 
   for (var i = 0; i < st.length; i++) 
   {
  	
        if (iChars.indexOf(st.charAt(i)) != -1) 
        {
  	   	return true;
        }
   }
   return false;
}
   
        function cno(st)
{
     var iChars = "!@#$%^&*()+=-[]\\\';,./{}|\":<>?~_ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz"; 
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
    
        $("#sub").click(function(){
    
    
    $flg0 = 0;
    
           //name verification
           
           $val=$("#inName").val();
         if(spcan($val) || $val.length<5)
             {
                 $("#NE").animate({opacity:1,height:30}, 1000);
                 $flg0=1;
                 
             }else
                  $("#NE").animate({opacity:0,height:0}, 1000);
           
           //Admission number verification
           
           $val=$("#adn").val();
    if(cno($val) || $val<1 || $val.length<3)
        {
            $("#ADE").animate({opacity:1,height:30}, 1000);
            $flg0=1;
        }else
             $("#ADE").animate({opacity:0,height:0}, 1000);
         
         //Roll number verification
         
         $val=$("#rn").val();
    if(cno($val) || $val>50 || $val<1 || $val.length<1)
        {
            $("#RE").animate({opacity:1,height:30}, 1000);
            $flg0=1;
        }else
             $("#RE").animate({opacity:0,height:0}, 1000);
           
      //Password verification 1    
          $val = $("#pw1").val();
        if($val.length<6)
            {
                $("#PE").animate({opacity:1,height:30}, 1000);
                $flg0=1;
            }else
                $("#PE").animate({opacity:0,height:0}, 1000);
       
       
       //Password verification 2
       $val = $("#pw1").val();
        $val2 = $("#pw2").val();
        if($val!=$val2)
            {
                $("#PE2").animate({opacity:1,height:30}, 1000);
                $flg0=1;
            }else
                $("#PE2").animate({opacity:0,height:0}, 1000);
           
           //reg request
           
           if($flg0==0)
               {
                   var $nam = $("#inName").val();
                   var $cls = $("#cls1").val();
                   var $div = $("#div1").val();
                   var $rno = $("#rn").val();
                   var $ano = $("#adn").val();
                   var $pss = $("#pw1").val();
                   $("#Base").html("<img src='pic/ld.gif' alt='Loading...'/>");
                   jQuery.post("register.php",{n: $nam,
                   c: $cls, d: $div,r: $rno,a: $ano,p: $pss },function(data){
                   $("#Base").html(data);
                   });
               }
           
           
        });
          
$("#adn").change(function(){
    $val=$("#adn").val();
    if(cno($val) || $val<1 || $val.length<3)
        {
            $("#ADE").animate({opacity:1,height:30}, 1000);
        }else
             $("#ADE").animate({opacity:0,height:0}, 1000);
        
});

$("#rn").change(function(){
    $val=$("#rn").val();
    if(cno($val) || $val>50 || $val<1)
        {
            $("#RE").animate({opacity:1,height:30}, 1000);
        }else
             $("#RE").animate({opacity:0,height:0}, 1000);
        
});



    $("#pw1").change(function(){
        $val = $("#pw1").val();
        if($val.length<6)
            {
                $("#PE").animate({opacity:1,height:30}, 1000);
            }else
                $("#PE").animate({opacity:0,height:0}, 1000);
    });
    
    
    $("#pw2").change(function(){
        $val = $("#pw1").val();
        $val2 = $("#pw2").val();
        if($val!=$val2)
            {
                $("#PE2").animate({opacity:1,height:30}, 1000);
            }else
                $("#PE2").animate({opacity:0,height:0}, 1000);
    });
    
 });

 function NC(){
         
         $val=$("#inName").val();
         if(spcan($val))
             {
                 $("#NE").animate({opacity:1,height:30}, 1000);
                 
             }else
                  $("#NE").animate({opacity:0,height:0}, 1000);
     }
 </script>
    <div>
        <h5>Thank you! Please Enter the following information.</h5>
        <div class="ui-state-highlight">
            <span class="ui-icon ui-icon-info" style="float:left;margin-left: 3px;"></span>
            <b>Note : Please make sure all information you provide are correct, you can't edit 
            them once you have registered.</b>
        </div>
        <div>
            <form>
                 <fieldset>
                <div class="boxee">
                    <div class="ui-state-highlight">
                      <span class="ui-icon ui-icon-home" style="float:left;margin-left: 3px;"></span>
                    School :<b>
                    <?php echo $_SESSION['sname']; ?>
                    </b>
                    <br/>
                    <span class="ui-icon ui-icon-flag" style="float:left;margin-left: 3px;"></span>
                    Event: <b>
                    <?php echo $_SESSION['ename'];?>
                    </b>
                    </div>
                </div>
                <style>
                    .boxee{
                        padding: 3px;
                    }
                    .sel{
                        width: 20%;
                    }
                    
                    .sc{
                        opacity: 0;
                        height: 0px;
                        overflow: hidden;
                       
                    }
                    </style>
                   
                <div class="boxee">
                    
                    
                <input id="inName" type="text" maxlength="30" name="n" placeholder="Full Name" onchange="NC()"/>
                   
                    <div class="sc" id="NE">
                    <div class="ui-state-error" >
            <span class="ui-icon ui-icon-alert" style="float:left;margin-left: 3px;"></span>
            <b>Alert : Invalid name.</b>
                </div>
                    </div>
                </div>
                    <div class="boxee">
                        <label for="cls1">Class</label>
                        <select id="cls1" placeholder="Class" name="cls" class="sel">
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
                        
                        <select placeholder="Div" id="div1"name="div" class="sel">
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                            <option value="E">E</option>
                            <option value="F">F</option>
                            <option value="G">G</option>
                            <option value="H">H</option>
                            <option value="I">I</option>
                        </select>
                        <input id="rn"  type="text" class="sel" maxlength="2" placeholder="Roll.No"/>
                        
                        <div class="sc" id="RE">
                    <div class="ui-state-error" >
            <span class="ui-icon ui-icon-alert" style="float:left;margin-left: 3px;"></span>
            <b>Alert : Invalid Roll No.</b>
                </div>
                    </div>
                        
                        
                        <label for="adn">Admission Number </label>
                        <input id="adn" name="an" type="text" class="sel" maxlength="7" placeholder="Ad.No"/> 
                            <div class="sc" id="ADE">
                    <div class="ui-state-error" >
            <span class="ui-icon ui-icon-alert" style="float:left;margin-left: 3px;"></span>
            <b>Alert : Invalid Admission No.</b>
                </div>
                    </div>
                            <div>
                            <input id="pw1" type="password" name="p" placeholder="Password"/>
                            </div>
                        <div class="sc" id="PE">
                    <div class="ui-state-error" >
            <span class="ui-icon ui-icon-alert" style="float:left;margin-left: 3px;"></span>
            <b>Alert : Password too short.</b>
                </div>
                    </div>
                            <div>
                            <input id="pw2" type="password" name="p2" placeholder="Repeat Password"/>
                            </div>
                            <div class="sc" id="PE2">
                    <div class="ui-state-error" >
            <span class="ui-icon ui-icon-alert" style="float:left;margin-left: 3px;"></span>
            <b>Alert : Password do not match.</b>
                </div>
                    </div>
                        <button class="btn btn-inverse" type="button"  id="sub">Register</button>
                    </div>
                    </fieldset>
            </form>
        </div>
        
    </div>
