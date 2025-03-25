<?php

    $json_str = '{"empregados": '. 
    '[{"nome":"Enzo Krebs", "idade":17, "sexo": "M", "dependentes": ["Antônio Carlos Silva", "Ruth de Moraes Krebs"]},'.
    '{"nome":"Heloysa", "idade":16, "sexo": "F"},'.
    '{"nome":"Pedro", "idade":17, "sexo": "M"}'.
    '],
    "data": "23/03/2025"}';

    $jsonObj = json_decode($json_str);


    $empregados = $jsonObj->empregados;

    echo "<b>data do arquivo</b>: $jsonObj->data<br/>";
    foreach ( $empregados as $e ){
        echo "nome: $e->nome - idade: $e->idade - sexo: $e->sexo<br/>";
        if (property_exists($e, "dependentes")) { 
            $deps = $e->dependentes;
            echo "dependentes: <br/>";
            foreach ( $deps as $d ) echo "- $d<br/>";
        }
    }
?>