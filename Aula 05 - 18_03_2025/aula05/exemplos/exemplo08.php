<?php
    $dados = [
        "nome" => "Enzo Krebs",
        "idade" => 17,
        "email" => "enzokrebs@email.com"
    ];
    
    $json = json_encode($dados, JSON_PRETTY_PRINT);
    echo $json;
?>