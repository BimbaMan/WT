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
<form method="get">
    <div class="container">
        <input type="text" name="collumns" id="collumns" placeholder="Enter amount of collumns">
        <input type="text" name="rows" id="rows" placeholder="Enter amount of rows">
        <button class="form-controller btn btn-submit">Build</button>
    </div>
</form>

<table class="table table-striped table-bordered">
    <?php
        $collumns = (int) $_GET['collumns'];
        $rows = (int) $_GET['rows'];
        $color = "";
        for ($i = 0; $i < $collumns; $i++){
            switch ($i){
                case 0:
                    $color = "red";
                    break;
                case 1:
                    $color = "blue";
                    break;
                case 2:
                    $color = "green";
                    break;
                case 3:
                    $color = "purple";
                    break;
                default:
                    $color = "yellow";
            }
            echo "<tr style='background: $color'>";
            for ($j = 0; $j < $rows; $j++){
                $el = rand(1, 100);
                echo "<td>$el</td>";
            }
            echo "</tr>";
        }
    ?>
</table>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
