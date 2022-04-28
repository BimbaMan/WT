<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>task_2</title>
</head>
<body>
<form method="get" action="">
    <input type="text" name="prarameters" id="prarameters" placeholder="Enter parameters">
</form>
    <?php
        $parameters = explode(' ', $_GET['prarameters']);
        foreach ($parameters as $parameter){
            if (is_numeric($parameter)){
                $int = (int)$parameter;
                $float = (float)$parameter;
                $val = ($int == $float) ? $int : $float;
                echo "<h3>Type of ".$parameter." is: ".gettype($val)."</h3><br>";
            }
            else {
                echo "<h3>Type of ".$parameter." is: ".gettype($parameter)."</h3><br>";
            }
        }

    ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </body>
    </html>