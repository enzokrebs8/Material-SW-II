<?php

    function verifPosNeg($n){
        if ($n > 0){
            echo $n. " é Positivo";
        }
        else if($n == 0){
            echo $n. " é 0";
        }
        else{
            echo $n. " é Negativo";
        }
    }

    verifPosNeg(100);
?>