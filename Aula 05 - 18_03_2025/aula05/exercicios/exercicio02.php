<?php

    $jsonUsuarios = file_get_contents("usuarios.json");

    $usuarios = json_decode($jsonUsuarios, true);

    foreach ($usuarios as $usuario) {
        echo "Nome: $usuario[nome] <br> Email: $usuario[email]\n <br><br>";
    }

?>