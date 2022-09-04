<?php
function auth(){
    if(isset( $_SESSION['admin'])){

    }
    else{
        go("/login.php");
    }

}

?>