<?php
    
    $json_str = '{"nome":"Enzo Krebs", "idade":17, "sexo": M}'; //Valor M deveria estar "M"

    $obj = json_decode($json_str);

    if (json_last_error() == 0) {
        echo '- Nao houve erro! O parsing foi perfeito';
    }	
    else {			
        echo 'Erro!</br>';
        switch (json_last_error()) {        
            case JSON_ERROR_DEPTH:
                echo ' - profundidade maxima excedida';
            break;
            case JSON_ERROR_STATE_MISMATCH:
                echo ' - state mismatch';
            break;
            case JSON_ERROR_CTRL_CHAR:
                echo ' - Caracter de controle encontrado';
            break;
            case JSON_ERROR_SYNTAX:
                echo ' - Erro de sintaxe! String JSON mal-formada!';
            break;
            case JSON_ERROR_UTF8:
                echo ' - Erro na codificação UTF-8';
            break;
            default:
                echo ' – Erro desconhecido';
            break;
        }
    }
?>