<?php
    $dados = [
        "produto" => "Samsung",
        "preco" => 2230,
        "estoque" => 20
    ];
    
    $json = json_encode($dados, JSON_PRETTY_PRINT);
    file_put_contents("dados2.json", $json);

    echo "Produto: $dados[produto] salvo!"
?>