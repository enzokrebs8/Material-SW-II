<?php

    function tabuada($n){
        for ($i = 1; $i <= 10; $i++) {
            $resul = $n * $i;
            echo $n . " x " . $i . " = " . $resul . "<br>";
        }
    }

    tabuada(4);
?>