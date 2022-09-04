<?php
function testmessage($condation,$message){
if($condation){
echo  "<div class='alert alert-success' role='alert'>
    true $message
</div> ";
}
else{
    echo  "<div class='alert alert-danger' role='alert'>
    false $message
</div> ";


}


}
function go($path){
echo "<script>
window.location.replace('/layer_company/$path')


</script>";

}
function auth(){
    if(isset( $_SESSION['admin'])){

    }
    else{
        go("/user_login.php");
    }

}
auth();

function role($role1=0,$role2=0,$role3=0){
    if($_SESSION['role']==$role1||$_SESSION['role']==$role2||$_SESSION['role']==$role3){

    }
    else{
        go("/index.php");

    }
}


?>