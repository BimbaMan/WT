<?php
    echo "Enter elements:".PHP_EOL;
    $input = explode(' ', readline());
    foreach ($input as $item){
        if (is_numeric($item)){
            $int = (int)$item;
            $float = (float)$item;
            $val = ($int == $float) ? $int : $float;
            echo "Type of ".$item." is: ".gettype($val).PHP_EOL;
        }
        else {
            echo "Type of ".$item." is: ".gettype($item).PHP_EOL;
        }
    }
?>
