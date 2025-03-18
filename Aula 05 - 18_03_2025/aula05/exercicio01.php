<?php

    $produtos = array('produtos' =>array(
        array(
            "nome"=>"Iphone",
            "preço"=>3200.00,
            "quantidade"=>20
        ),
        array(
            "nome"=>"Xiaomi", 
            "preço"=>2300.00,
            "quantidade"=>20
        ),
        array(
            "nome"=>"Samsung",
            "preço"=>2900.00, 
            "quantidade"=>20
        )));

    $json = json_encode($produtos, JSON_PRETTY_PRINT);
    file_put_contents("produtos.json", $json);
?>