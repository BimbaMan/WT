<?php
    echo "Enter string:".PHP_EOL;
    $input = explode(' ', readline());
        $theLongest = '';
        foreach ($input as $item) {
            echo $item . " length: " . strlen($item) . PHP_EOL;
            if (strlen($item) > strlen($theLongest)) {
                $theLongest = $item;
            }
        }
    echo "The longest word is: " . $theLongest . PHP_EOL;
?>
