<?php
    function fatorialNum($n) {
        if ($n < 0) {
            return "Fatorial não definido para números negativos.";
        } elseif ($n === 0) {
            return 1;
        } else {
            $resultado = 1;
            for ($i = 1; $i <= $n; $i++) {
                $resultado *= $i;
            }
            return $resultado;
        }
    }
    
    echo fatorialNum(5);
?>