<?php
    $nota1 = 8.5;
    $nota2 = 10;
    $nota3 = 9;

    $media = (($nota1 + $nota2 + $nota3) /3 );
    
    if($media <= 5){
        $resul = "Reprovado!";
        echo "Nota 1: ", $nota1, "<br>";
        echo "Nota 2: ", $nota2, "<br>";
        echo "Nota 3: ", $nota3, "<br>";
        echo "Nota Final (Pode ter sido arredondada): ", round($media), "<br>", $resul;
    }
    elseif ($media >= 5 and $media <= 10) {
        $resul = "Aprovado!";
        echo "Nota 1: ", $nota1, "<br>";
        echo "Nota 2: ", $nota2, "<br>";
        echo "Nota 3: ", $nota3, "<br>";
        echo "Nota Final (Pode ter sido arredondada): ", round($media), "<br>", $resul;
    }
    else{
        echo "Nota 1: ", $nota1, "<br>";
        echo "Nota 2: ", $nota2, "<br>";
        echo "Nota 3: ", $nota3, "<br>";
        echo "Não foi possível calcular a média.", "<br>";
    }

    
    
?>