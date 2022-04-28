<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>task_5</title>
</head>
<body>
<form method="get">
    <div class="container">
        <input type="text" name="columns" id="columns" placeholder="Enter amount of columns">
        <input type="text" name="rows" id="rows" placeholder="Enter amount of rows">
        <button class="form-controller btn btn-submit">Build</button>
    </div>
</form>

<table class="table table-striped table-bordered">

<?php

$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

function generate_string($input, $strength) {
    $input_length = strlen($input);
    $random_string = '';
    for($i = 0; $i < $strength; $i++) {
        $random_character = $input[mt_rand(0, $input_length - 1)];
        $random_string .= $random_character;
    }
    return $random_string;
}

function random_float ($min,$max) {
    return ($min+lcg_value()*(abs($max-$min)));
}

$columns = (int) $_GET['columns'];
$rows = (int) $_GET['rows'];
$color = "";
for ($i = 0; $i < $columns; $i++){
    echo "<tr style='background: $color'>";
    for ($j = 0; $j < $rows; $j++){
        $k = rand(1, 3);
        switch ($k){
            case 1:
                $elint = rand(0, 100);
                $elint = $elint * 2;
                echo "<td>$elint</td>";
                break;

            case 2:
                $elstr = generate_string($permitted_chars, rand(2, 16));
                $elstr = strtoupper($elstr);
                echo "<td>$elstr</td>";
                break;

            case 3:
                $elfloat = random_float(0, 50);
                $elfloat = round($elfloat, 2);
                echo "<td>$elfloat</td>";
                break;

            default:
                echo "error";
        }
    }
    echo "</tr>";
}

?>


</table>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
