
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
class simpleArr{
    public $resArr;
    function convertToSimpleArray($array){
        if(is_array($array)){
            foreach($array as $below){
                $res = $this->convertToSimpleArray($below); 

            }
        }else{
            $this->resArr[] = $array; 
        }

    }
    
}
$arrayTest = [
    'country' => [
        'Russian Federation' => [
            'Округа' => [
                'Краснодарский край',
                'Чеченская республика',
                'Республика Дагестан'
            ],
            'Москва', 
            'Воронеж', 
            'Ростов-на-Дону'
        ],
        "United States of America" => [
            'Сиэтл', 
            'Вашингтон', 
            'Филадельфия'
        ],
        "China" => [
            'Шанхай', 
            'Пекин', 
            'Гон'
        ]
    ],

    'union' => [
        'СССР', 
        'Европейский союз'
    ], 

    'status' => 1, 

    'age' => 34
];
        echo print_r($arrayTest);
        $task=new simpleArr();
        $task->convertToSimpleArray($arrayTest);
        echo "<br>";
        echo "<br>";
        echo print_r($task->resArr);
?>
  </div>


    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


</body>
</html>