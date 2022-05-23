<?php
    class FormBuilder {

        function addForm($method, $action) {
            echo sprintf("<form method='%s' action='%s'>", $method, $action);
        }

        function addInput($type, $name, $placeholder){
            echo sprintf("<input type='%s' name='%s' placeholder='%s'>".PHP_EOL, $type, $name, $placeholder);
        }

        function addInputWithValue($type, $value, $placeholder){
            echo sprintf("<input type='%s' value='%s' placeholder='%s'>".PHP_EOL, $type, $value, $placeholder);
        }

        function addButton($type, $name, $text){
            echo sprintf("<button type='%s' name='%s'>$text</button>".PHP_EOL, $type, $name, $text);
        }

        function addDropBoxMethod($name){
            echo sprintf("<select name='%s'>".PHP_EOL, $name);
            echo "<option value='ToFile'>To File</option>" .PHP_EOL;
            echo "<option value='ToConsole'>To Console</option>" .PHP_EOL;
            echo "</select>";
        }

        function break(){
            echo "<br>";
        }

        function endForm(){
            echo "</form>";
        }
    }

    $formBuilder = new FormBuilder();
    $formBuilder -> addForm('post', 'task_02.php');
    $formBuilder -> addInput('text', 'inp1', 'Not empty field');
    $formBuilder -> addInput('text', 'inp2', 'Default value');
    $formBuilder -> addInput('text', 'inp3', 'Default value');
    $formBuilder -> addButton('submit', 'submitBtn', 'submit');
    $formBuilder -> addDropBoxMethod('loggerOutput');
    $formBuilder -> endForm();




