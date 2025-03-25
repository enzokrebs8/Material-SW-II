<?php
    
    $json_str = '{"nome": "Enzo", "idade": 17, "sexo":"M"}';
    

    $obj = json_decode($json_str);
   
    //imprime o conteúdo do objeto
    echo "nome: $obj->nome <br>";
    echo "idade: $obj->idade <br>";
    echo "sexo: $obj->sexo <br>";
?>