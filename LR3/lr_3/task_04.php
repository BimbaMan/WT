<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Тask 4</title>
</head>
<body>
<form method="get" action="">
    <input type="text" name="sequence" placeholder="Enter sequence">
</form>
<?php
    if (isset($_GET['sequence'])) {
        $sequence = explode(' ', $_GET['sequence']);
        for ($i = count($sequence) - 1; $i >= 0; $i--) {
            echo "$sequence[$i] ";
        }
    }
?>
</body>
</html>
