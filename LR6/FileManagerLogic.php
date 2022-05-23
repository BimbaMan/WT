<?php

class FileManagerLogic
{

    private $uploadDir = 'serverFolder';

    public function downloadFile($fileName)
    {
        $path = $this->rootDir. $fileName;
        if (file_exists($path))
        {
            $type = filetype($path);
            $file = $path;
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header("Content-Type: $type");
            header('Content-Disposition: attachment; filename="' . "$fileName" . '"');
            header('Content-Length: ' . filesize($file));
            ob_clean();
            flush();
            readfile($file);
        }
    }


    public function console_log($data){ // сама функция
        if(is_array($data) || is_object($data)){
            echo("<script>console.log('php_array: ".json_encode($data)."');</script>");
        } else {
            echo("<script>console.log('php_string: ".$data."');</script>");
        }
    }

    public function deleteFile($postArr)
    {
        $folder = './serverFolder/';
        $file = 'file1';
        $path = $folder.$file;
//        $path = './serverFolder/'.$fileName;
        unlink($path);
    }

    public function deleteFile1($fileName)
    {
        //$uploadDir = '.';
        //$path = $uploadDir.'/'.$fileName;
        $path = $this->uploadDir . "/" . $fileName;
        echo 'PATH = ' . $path . '<br>';
        if (file_exists($path))
        {
            if (unlink($path)){
                echo 'Success'.PHP_EOL;
                $this->console_log('Success');}
            else{
                echo 'Error'.PHP_EOL;
                $this->console_log('Error');}
            echo '<br>';
        }


        sleep(2);

    }

    public function uploadFiles($file)
    {
        //upload file to rootDir
        $path = $this->rootDir.$file['name'];
        if (move_uploaded_file($file['tmp_name'], $path))
            echo 'Success';
        else
            echo 'Error';
    }
}