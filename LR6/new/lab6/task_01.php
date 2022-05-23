<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Simple File Manager</title>
</head>
<body>
    <form enctype="multipart/form-data" action="task_01.php" method="POST">
       
        <input type="hidden" name="10485760" value="30000" />
        <input type="file" name="selectedFiles[]" multiple>
        <br>
        
        Имя файла, который вы хотите скачать или удалить: <input type="text" name="downloadFileName"><br />
        <input type="submit" name="upload" value="Загрузить файл" />
        <input type="submit" name="download" value="Скачать файл" />
        <input type="submit" name="delete" value="Удалить файл" />
        <br>
    </form>
</body>
</html>

<?php

class FileManager 
{
    private string $uploadDir;

    public function deleteFile($fileName)
    {   
        $path = $this->uploadDir . "/" . $fileName;
        echo 'PATH = ' . $path . '<br>';
        if (file_exists($path))
        {
            if (unlink($path))
                echo 'Success';
            else
                echo 'Error';
            echo '<br>';
        }
    }
    
    public function printUploadDir()
    {
        $iterator = new FilesystemIterator($this->uploadDir);
	foreach($iterator as $entry)
	{
	    if ($entry->isFile())
	        echo $entry->getFilename() . '<br>';
        }
    }    

    public function downloadFile($fileName)
    {
        $path = $this->uploadDir . "/" . $fileName;   
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

    public function __construct(string $uploadDir)
    {
        $this->uploadDir = $uploadDir; 
    }
    
    public function uploadFiles(array &$filesRec)
    {
        if ($filesRec['name'][0] != "")
        {
            for ($i = 0; $i < count($filesRec['name']); ++$i)
            {
                $path = $this->uploadDir . "/" . basename($filesRec['name'][$i]);
                if (!move_uploaded_file($filesRec['tmp_name'][$i], $path))
                    echo "Uploading error" . "<br>"; 
            }
        }
    }
}

echo '<pre>';

$fileManager = new FileManager("/home/konstantin/Work/");
echo 'Файлы на сервере:<br>';
$fileManager->printUploadDir();

if (isset($_POST['upload']))
{
    $fileManager->uploadFiles($_FILES['selectedFiles']);
    header("Location: task_01.php");
} elseif (isset($_POST['download']))
{
    if ((isset($_POST['downloadFileName'])) && ($_POST['downloadFileName'] != ""))
    {
        $name = $_POST['downloadFileName'];
        $fileManager->downloadFile($name);
    }
} elseif (isset($_POST['delete']))
{
     if ((isset($_POST['downloadFileName'])) && ($_POST['downloadFileName'] != ""))
    {
        $name = $_POST['downloadFileName'];
        $fileManager->deleteFile($name);
        header("Location: task_01.php");
    }
}

echo '</pre>';

?>
