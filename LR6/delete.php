<?php

    $folder = 'serverFolder';
    $file = $_POST['pathToFile'];
    echo $file.'<br>';
    //$filePath = realpath($folder.'/'.$file);
    $filePath = $folder.'/'.$file;
    echo $filePath.'<br>';
    if (unlink($filePath)) {
        echo "File $file deleted successfully".PHP_EOL;
    } else {
        echo "Error deleting $file".PHP_EOL;
    }

