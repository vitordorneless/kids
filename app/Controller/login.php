<?php

function __autoload($files) {
    if (file_exists('../Model/' . $files . '.php'))
        require_once('../Model/' . $files . '.php');
    else
        exit('O arquivo ' . $files . ' não foi encontrado!');
}
$usuario = new Usuarios();
$usuario->login = filter_input(INPUT_GET, 'user', FILTER_SANITIZE_STRING);
$usuario->pass = filter_input(INPUT_GET, 'pass', FILTER_SANITIZE_STRING);

$confirm = $usuario->logar($usuario->login, $usuario->pass);
if ($confirm === TRUE) {    
    echo '1';
} else {
    echo '2';
}