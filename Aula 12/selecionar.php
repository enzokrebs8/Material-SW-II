<?php
    include_once "conecta.php";

    // $resultado = $conexao->prepare("SELECT * FROM produtos WHERE id = :id");

    $resultado = $conexao->prepare("SELECT * FROM produtos");

    // $id = 1;

    // $resultado->bindValue(":id",1);
    
    $resultado->execute();
    $final = $resultado->fetchAll(PDO::FETCH_ASSOC);

    // var_dump($final);

    // echo "<pre>";
    // print_r($final);
    // echo "</pre>";

    foreach ($final as $key => $value) {
        echo "ID: {$value['id']}<br>";
        echo "Nome: {$value['nome']}<br>";
        echo "Preço: {$value['preco']}<br>";
        echo "Estoque: {$value['estoque']}<br>";
        echo "<hr>";
    }
?>