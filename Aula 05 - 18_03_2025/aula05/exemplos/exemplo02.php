<?php
    $json_str = '{"empregados": '. 
    '[{"nome":"Enzo Krebs", "idade":17, "sexo": "M"},'.
    '{"nome":"Heloysa", "idade":16, "sexo": "F"},'.
    '{"nome":"Pedro", "idade":17, "sexo": "M"}'.
    ']}';

    $jsonObj = json_decode($json_str);
    $empregados = $jsonObj->empregados;

    foreach ( $empregados as $e )
    {
    echo "nome: $e->nome - idade: $e->idade - sexo: $e->sexo<br>"; 
    }
?>