<?php
    function somaArray($numeros) {
        $soma = 0;
        foreach ($numeros as $numero) {
            $soma += $numero;
        }
        return $soma;
    }

    $resul = somaArray([1, 2, 3, 4, 5]);
    echo "A soma dos elementos é: " . $resul;
?>