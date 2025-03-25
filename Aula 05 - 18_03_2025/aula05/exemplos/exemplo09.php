<?php
    $json = '{"nome": "Enzo Krebs", "idade": 17, "email": "enzokrebs@email.com"}';

    $dados = json_decode($json, true); 
    print_r($dados);
?>