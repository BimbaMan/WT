<!doctype html>
<html lang="en">
  <head>
  
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    

    <title>Lab 4</title>
  </head>
  <body>
  <div class="container" id="mainDiv">
<?php
//error_reporting(E_ERROR | E_PARSE);
class humanAge{
    function __construct($birthday){
      setlocale(LC_TIME, 'ru_RU.utf8');
      $now = time(); 
      $your_date = strtotime($birthday);
      $datediff = floor(abs(($now - $your_date)/(60*60*24)));
      $years=floor($datediff/365);
      $days=$datediff % 365;
      echo "{$years} Лет {$days} Дней";
    }
}

        $task=new humanAge('16.08.2003');
       
?>
  </div>


    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


</body>
</html>