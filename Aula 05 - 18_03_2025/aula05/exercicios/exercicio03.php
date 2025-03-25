<?php

    $jsonProdutos = file_get_contents("produtos.json");
    $produtos = json_decode($jsonProdutos, true);

    $produtoNovo = array("nome" => "Nokia", "preco" => 99.90, "quantidade" => 20);
    $produtos[] = $produtoNovo;

    $jsonAtualizado = json_encode($produtos, JSON_PRETTY_PRINT);
    file_put_contents("produtos.json", $jsonAtualizado);

    echo "Produto adicionado!";

?>
