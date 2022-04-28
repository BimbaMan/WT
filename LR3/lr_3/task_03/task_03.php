<?php
$firstSeq = !empty($_POST['1stSeq']) ? $_POST['1stSeq'] : '';
$secondSeq = !empty($_POST['2ndSeq']) ? $_POST['2ndSeq'] : '';

//$arr1 = str_split((string)$firstSeq);
//$arr2 = str_split((string)$secondSeq);
$arr1 = explode(' ', (string)$firstSeq);
$arr2 = explode(' ', (string)$secondSeq);
$result = array_merge($arr1 ,array_diff($arr2, $arr1));

echo "<span>";
foreach ($result as $item) {
    echo "$item ";
}
echo "</span>";
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Received values</title>
</head>
<body>
    <p>
        Seq1:  <?= $firstSeq?>
        <br>
        Seq2:  <?= $secondSeq?>
    </p>
</body>
</html>