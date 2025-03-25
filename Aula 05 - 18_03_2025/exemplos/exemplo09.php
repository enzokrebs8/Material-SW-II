<?php
    $json = '{"nome": "Enzo Krebs", "idade": 17, "email": "enzokrebs8@email.com"}';

    $dados = json_decode($json, true); 
    print_r($dados);
?>