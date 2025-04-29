<?php

    $empregados = array('empregados' => array(
        array(
            'nome' => 'Enzo Krebs',
            'idade' => 17,
            'sexo' => 'M'
        ),
        array(
            'nome' => 'Heloysa',
            'idade' => 16,
            'sexo' => 'F'
        ),
        array(
            'nome' => 'Pedro',
            'idade' => 17,
            'sexo' => 'M'
        )));

    $json_str = json_encode($empregados);

    echo "$json_str";
?>