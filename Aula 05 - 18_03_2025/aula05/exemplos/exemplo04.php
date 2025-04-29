<?php

    $json_str = '{"Enzo Krebs":17,"Heloya":16,"Pedro":17}';

    $json_arr = json_decode($json_str, true);

    var_dump($json_arr);
?>