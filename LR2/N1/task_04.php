<?php

for ($i = 1; $i < $argc; ++$i) 
{  
    $item = $argv[$i];
    $digits = str_split($item);
    $sum = array_sum($digits);
    echo "Sum of the digits of number $item is $sum";
    echo "\n";
}  

exit(0);

?>
