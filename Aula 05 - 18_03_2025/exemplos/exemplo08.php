<?php
    $dados = [
        "nome" => "Enzo Krebs",
        "idade" => 17,
        "email" => "enzokrebs8@email.com"
    ];
    
    $json = json_encode($dados, JSON_PRETTY_PRINT);
    echo $json;
?>