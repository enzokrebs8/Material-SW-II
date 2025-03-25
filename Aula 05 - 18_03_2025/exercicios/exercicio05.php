<?php
$produtos = json_decode(file_get_contents('produtos.json'), true);

$nomeProduto = 'Nokia';
$produtosAnteriores = $produtos;

$produtos = array_filter($produtos, function($produto) use ($nomeProduto) {
    return $produto['nome'] != $nomeProduto;
});

file_put_contents('produtos.json', json_encode(array_values($produtos), JSON_PRETTY_PRINT));

if (count($produtos) < count($produtosAnteriores)) {
    echo "Produto removido!";
} else {
    echo "Produto não encontrado ou não removido.";
}

?>