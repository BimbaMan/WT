<?php
class CryptoManager{
    public function __construct($key, $cipherMethod)
    {
        echo "<form>";
        if ($_POST["action"] === "cipher")
            $this->cipher($_POST["Text"], $key, $cipherMethod);
        else $this->decipher($_POST["Text"], $key, $cipherMethod);
    }

    function endForm(){
        echo "</form>";
    }


    function decipher(string $cipherText, string $key, string $ciphering){
        echo "Original String: " . $cipherText. "\n";
        echo "<br>";
        echo "Key: " . $_POST["key"];
        echo "<br>";
        $decryption_iv = '1234567891011121';
        $options = 0;
        $decryption = openssl_decrypt ($cipherText, $ciphering,
            $key, $options, $decryption_iv);
        echo "Decrypted String: " . $decryption. "\n";
    }

    function cipher(string $plainText, string $key, string $ciphering){
        echo "Original String: " . $plainText. "\n";
        echo "<br>";
        echo "Key: " . $_POST["key"];
        echo "<br>";
        $iv_length = openssl_cipher_iv_length($ciphering);
        $options = 0;
        $encryption_iv = '1234567891011121';
        $encryption = openssl_encrypt($plainText, $ciphering, $key, $options, $encryption_iv);
        echo "Encrypted String: " . $encryption . "\n";
    }
}
$cipherManager = new CryptoManager($_POST["key"], $_POST["methods"]);
$cipherManager -> endForm();
