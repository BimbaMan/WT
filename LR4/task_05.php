<?php

class CryptoManagerForm{

    function __construct($method, $action) {
        echo sprintf("<form method='%s' action='%s'>", $method, $action);
    }

    function addInputPlaintext($type, $name, $placeholder){
        echo sprintf("<input type='%s' value='plaintext' name='%s' placeholder='%s'>".PHP_EOL, $type, $name, $placeholder);
    }

    function addInputKey($type, $name, $placeholder){
        echo sprintf("<input type='%s' value='somekey' name='%s' placeholder='%s'>".PHP_EOL, $type, $name, $placeholder);
    }

    function addDropboxAlgorithm($name, &$cipherMethods){

        echo sprintf("<select name='%s'>".PHP_EOL, $name);
        foreach ($cipherMethods as $item){
            echo "<option value='$item'> $item</option>" .PHP_EOL;
        }
        echo "</select>";
    }

    function addDropBoxMethod($name){
        echo sprintf("<select name='%s'>".PHP_EOL, $name);
        echo "<option value='cipher'> Cipher</option>" .PHP_EOL;
        echo "<option value='decipher'> Decipher</option>" .PHP_EOL;
        echo "</select>";
    }

    function addButton($type, $name, $text){
        echo sprintf("<button type='%s' name='%s'>$text</button>".PHP_EOL, $type, $name, $text);
    }

    function break(){
        echo "<br>";
    }

    function endForm(){
        echo "</form>";
    }

}

$cryptoManager = new CryptoManagerForm('post', 'task_05_result.php', );
$cryptoManager ->addInputPlaintext('text', 'Text', 'Default plain text');
$cryptoManager -> addInputKey('text', 'key', 'Default key');
$ciphers = openssl_get_cipher_methods();
$ciphers = array_filter( $ciphers, function($n) { return stripos($n,"ecb")===FALSE; } );
$ciphers = array_filter( $ciphers, function($c) { return stripos($c,"des")===FALSE; } );
$ciphers = array_filter( $ciphers, function($c) { return stripos($c,"rc2")===FALSE; } );
$ciphers = array_filter( $ciphers, function($c) { return stripos($c,"rc4")===FALSE; } );
$ciphers = array_filter( $ciphers, function($c) { return stripos($c,"md5")===FALSE; } );
$cryptoManager -> addDropboxAlgorithm('methods', $ciphers);
$cryptoManager -> addDropBoxMethod('action');
$cryptoManager -> break();
$cryptoManager -> addButton('submit', 'submit', 'submit');
$cryptoManager -> endForm();

