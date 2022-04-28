<!-- done -->
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Task 2</title>
</head>
<body>

    <form action="" method="get">
        <input type="text" name="string" placeholder="Enter string">
    </form>

    <?php
        $string = explode(' ', $_GET['string']);
        echo "<span>";
        for ($i = 0; $i < sizeof($string); $i++){
            if ($i % 3 == 2) {
                $string[$i] = strtoupper($string[$i]);
            }
            for ($j = 0; $j < strlen($string[$i]); $j++) {
                if ($j % 3 == 2) {
                    echo '<b style="color: purple">'.$string[$i][$j].'</b>';
                }
                else {
                    echo '<b>'.$string[$i][$j].'</b>';
                }
            }
            echo '<b> </b>';
        }
        echo "</span>";
    ?>
</body>
</html>