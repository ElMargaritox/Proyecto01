<?php

CONST BASE_URL = "http://localhost/HTML/";
CONST DISCORD_LINK = "https://discord.gg";
//CONEXION A LA BASE DE DATOS
CONST DB_HOST = "localhost";
CONST DB_NAME = "envyhosting";
CONST DB_USER = "root";
CONST DB_PASSWORD = "";
CONST DB_CHARSET = "charset=utf8";


session_start();

// COOKIES
setcookie("cookieNombre", "", time() + 3600, "/", BASE_URL, 1);
setcookie("cookiePrecio", " ", time() + 3600, "/", BASE_URL, 1);

$_SESSION["pageSelected"] = "";
?>