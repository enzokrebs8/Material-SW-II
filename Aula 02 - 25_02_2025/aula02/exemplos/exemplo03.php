<?php
    $vetor = ['Zuuh', 'Looh', 'Daa', 'Daan', 'Liibs'];
    // var_dump($vetor);    

    $qntd = count($vetor);
    echo $qntd;

    echo "<br>";
    echo $vetor[1];
    echo "<br>";

    for ($i=0; $i < $qntd ; $i++) { 
        echo $vetor[$i];
        echo "<br>";
    }
?>