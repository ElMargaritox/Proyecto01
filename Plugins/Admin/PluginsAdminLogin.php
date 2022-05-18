<?php

include "../../Database/DatabaseManager.php";


$databaseManager = new DatabaseManager("127.0.0.1", "root", "", "accounts");

 $username = null;
 $password = null;

 if($_POST){


    $username = (isset($_POST['name']))?$_POST['name']:"echo Usuario Incorrecto";
    $password = (isset($_POST['password']))?$_POST['password']:"Contraseña incorrecta";

    $data = $databaseManager->ReadWhere("account", $username);
    
    if($data == null){

    }else{

        if($data["Password"] == $password){
            echo "LOGEADO CORRECTAMENTE";
            session_start();

            $_SESSION["usuario"]="$username";
            $_SESSION["status"]="logeado";

        }else{
            echo "CONTRASEÑA INCORRECTA";
        }
    }
    


    }



?>

<form action="PluginsAdminLogin.php" method="post">

    
    <input type="name" name="name" id="name" >
    <label:login> <- Tu Usuario</label:login> <br> <br>
    <input type="password" name="password" id="password" >
    <label:login> <- Tu Contraseña</label:login> <br> <br>
    <button type="submit">Iniciar Sesion</button>

</form>