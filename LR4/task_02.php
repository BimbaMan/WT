<?php
include "task_01.php";
include "task_03.php";

    class SafeFormBuilder extends FormBuilder {

        function update(){
            $loggerType = 'file';
            if (count($_GET)) {
                foreach ($_GET as $name => $value) {
                    if ($value != '') {
                        $this->addInput('text', $value, '');
                        if ($_POST['loggerOutput'] == 'ToConsole')
                            CustomLogger::printToConsole($value);
                        else if ($_POST['loggerOutput'] == 'ToFile')
                            CustomLogger::printToFile($value);
                    }
                }
            }
            if (count($_POST)) {
                foreach ($_POST as $name => $value) {
                    if ($value != '') {
                        $this->addInputWithValue('text', $value, '');
                        if ($_POST['loggerOutput'] == 'ToConsole')
                            CustomLogger::printToConsole($value);
                        else if ($_POST['loggerOutput'] == 'ToFile')
                            CustomLogger::printToFile($value);
                    }
                }
            }
        }
    }

    $safeFormBuilder = new SafeFormBuilder();
    if (count($_GET) or count($_POST)) {
        $safeFormBuilder->update();
    }
