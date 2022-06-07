<?php



function base_url(){
    return BASE_URL;
}

function getUri($page = ""){
    return base_url().$page;
}

function load($ruta =""){
    $view_header = $ruta;
        require_once($view_header);
}


function GetResositoryImages(){
    return 'Assets/pluginsData/img/';
}

function GetRespositoryConfigLink($file){
    return 'Assets/pluginsData/config/'.$file;
}

function GetRepositoryPermsLink($file){
    return 'Assets/pluginsData/perm/'.$file;
}

function GetRepositoryImagesLink($file){
    return base_url().'Assets/pluginsData/img/'.$file;
}

function check($jar, $size){

    if($jar == "image/jpeg" || $jar == "image/png" || $jar == "image/jpg"){
    
        if($size < 100000){
            return true;
        } 
    }
    return false;
}

function getConfig($file = ""){
    return base_url()."Assets/pluginsData/config/".$file.".txt";
}

function getPermissions($file = ""){
    return base_url()."Assets/pluginsData/perm/".$file.".txt";
}

function download($plugin = ""){
    return base_url()."Assets/pluginsData/dll/".$plugin.".dll";
}


// Easy Read Array
function dep($data){
    $format = print_r('<pre>');
    $format .= print_r($data);
    $format .= print_r('</pre>');
    return $format;
}

// Generator Password
function passGenerator($lenght = 8){
    $pass = "";
    $_lenght = $lenght;
    $cadena = "ABCDEFGHIJKLMNOPQRSTUVWXYabcdefgijklmnopqrstuvwxyz1234567890";
    $_cadena = strlen($cadena);

    for ($i=0; $i < $_cadena; $i++) { 
        
        $pos = rand(0, $_cadena-1);
        $pass .= substr($cadena, $pos,1);
    }
    return pass;
}

// Token

function token(){
    $r1 = bind2hex(random_bytes(10));
    $r2 = bind2hex(random_bytes(10));
    $r3 = bind2hex(random_bytes(10));
    $r4 = bind2hex(random_bytes(10));
    $token = r1.'-'.r2.'-'.r3.'-'.r4;
    return $token;
}

?>
