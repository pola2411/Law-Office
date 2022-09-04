<?php
function test($condation,$message){
if($condation){
echo  "<div class='alert alert-success' role='alert'>
    true $message
</div> ";
}
else{
    echo  "<div class='alert alert-danger' role='alert'>
    false $message
</div> ";


}}
function go($path){
    echo "<script>
    window.location.replace('/layer_company/$path')
    
    
    </script>";
    
    }
    function auther(){
        if(isset( $_SESSION['user'] )){
    
        }
        else{
            go("/user_login.php");
        }
    
    }
    auther();