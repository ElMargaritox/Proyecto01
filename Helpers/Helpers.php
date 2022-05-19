<?php



function base_url(){
    return BASE_URL;
}

function load($ruta =""){
    $view_header = $ruta;
        require_once($view_header);
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
