<?php

include "../../Database/DatabaseManager.php";


session_start();

if(isset($_SESSION["usuario"])){
    echo 'PROXIMAMENTE CRUD :P';
}else{

    echo 'NO TIENES ACCESO';
}


?>

