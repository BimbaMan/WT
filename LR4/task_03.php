<?php
    class CustomLogger {
        static function printToConsole($value){
            $current_date = date('Y-m-d H:i:s');
            $message = $current_date.' Created element with value: '.$value;
            echo "<script>console.log('$message')</script>";
        }

        static function printToFile($value){
            $current_date = date('Y-m-d H:i:s');
            $message = $current_date.' Created element with value: '.$value;
            $file = fopen(__DIR__."/logs.txt", "a+") or exit("<script>console.log('Unable to open file')</script>");
            fwrite($file, $message.PHP_EOL);
            fclose($file);
        }
    }
