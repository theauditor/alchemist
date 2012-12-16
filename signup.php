<?php session_start();?>
<legend>Register</legend>
 <script>
     var $val;
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
           alert("bhoom"); 
        });
          
$("#adn").change(function(){
    $val=$("#adn").val();
    if(cno($val))
        {
            $("#ADE").animate({opacity:1,height:30}, 1000);
        }else
             $("#ADE").animate({opacity:0,height:0}, 1000);
        
});
    
 });

 function NC(){
         
         $val=$("#inName").val();
         if(spcan($val))
             {
                 $("#NE").animate({opacity:1,height:20}, 1000);
                 
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
                    <br/>
                    School :<b>
                    <?php echo $_SESSION['sname']; ?>
                    </b>
                    <br/>
                    Event: <b>
                    <?php echo $_SESSION['ename'];?>
                    </b>
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
                       
                    }
                    </style>
                   
                <div class="boxee">
                    
                    <label for="inName">Name
                <input id="inName" type="text" maxlength="30" name="n" placeholder="Full Name" onchange="NC()"/>
                    </label>
                    <div class="sc" id="NE">
                    <div class="ui-state-error" >
            <span class="ui-icon ui-icon-alert" style="float:left;margin-left: 3px;"></span>
            <b>Alert : Invalid name.</b>
                </div>
                    </div>
                </div>
                    <div class="boxee">
                        <label for="cls1">Class
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
                        </select></label>
                        <label for="adn">Admission Number 
                            <input id="adn" name="an" type="text" class="sel" placeholder="Ad.No"/> </label>
                            <div class="sc" id="ADE">
                    <div class="ui-state-error" >
            <span class="ui-icon ui-icon-alert" style="float:left;margin-left: 3px;"></span>
            <b>Alert : Invalid Admission No.</b>
                </div>
                    </div>
                        <label for="pw1">Password 
                            <input id="pw1" type="password" name="p" placeholder="Password"/>
                        </label>
                        <label for="pw2">Repeat Password
                            <input id="pw2" type="password" name="p2" placeholder="Repeat"/>
                        </label>
                        <button class="btn btn-inverse" type="button"  id="sub">Register</button>
                    </div>
                    </fieldset>
            </form>
        </div>
        
    </div>
