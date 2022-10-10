<?php 

function logged_only(){
    if(session_status() == PHP_SESSION_NONE){
        session_start();
    }
}


    ?>