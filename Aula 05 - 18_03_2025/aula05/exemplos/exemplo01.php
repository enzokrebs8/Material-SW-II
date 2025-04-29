<?php
    
    $json_str = '{"nome": "Enzo Krebs", "idade": 17, "sexo":"M"}';
    

    $obj = json_decode($json_str);
   
    echo "nome: $obj->nome <br>";
    echo "idade: $obj->idade <br>";
    echo "sexo: $obj->sexo <br>";
?>