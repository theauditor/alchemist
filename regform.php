<form>
    <legend>Register</legend>
    <script>
    function bak(){
        $("#Base").html($hold);
    }
    </script>
    <style>
        .kb{
            width:50px;
            font-size: larger;
        }
        .hd{
            text-align: center;
        }
        
       
    </style>
    
    <a class="btn btn-link" onclick="bak()"><-- Back</a>
    <div>
        <script>
        var $k1x;
        var $k2x;
        var $k3x;
        function subKey(){
            
        }
    
        </script>
        
        <div class="hd">
            <h5>Enter Key Number</h5>
            <form></form>
        <input type="text" id="k1" maxlength="5" class="kb" onkeyup="k10()" placeholder="00000" />-
        <input type="text" id="k2" maxlength="5" class="kb" onkeyup="k20()" placeholder="00000"/>-
        <input type="text" id="k3" maxlength="5" class="kb" placeholder="00000"/>
        <div id="alt" style="height:0px;width:0px;overflow: hidden">
        </div>
        <div id="bt1">
            <button class="btn btn-inverse" onclick="subKey()">Register</button>
        </div> 
    </div>
        <div class="ui-state-info">
        <span class="ui-icon ui-icon-info" style="float:left;margin-left: 3px;"></span>
        <b>Note: </b> Use the key number provided to you from your school,you can only register once with
        a giving key number. If system rejects the key number please contact your school for a new one.</div> 
       
    
</form>
