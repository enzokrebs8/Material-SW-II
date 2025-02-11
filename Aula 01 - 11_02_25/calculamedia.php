<?php
    $nota1 = 8.5;
    $nota2 = 10;
    $nota3 = 9;

    $media = (($nota1 + $nota2 + $nota3) /3 );
    
    if($media <= 5){
        $resul = "Reprovado!";
    }
    else {
        $resul = "Aprovado!";
    }

    echo "Nota:", round($media), "<br>", $resul;


?>