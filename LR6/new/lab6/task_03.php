<title>task_03</title>
<form method="post" action="" class="form">
    <div class="login">
        <label>Логин</label>
        <input class ="l" type="text" name="login">
    </div>

    <div class="pass">
        <label>Пароль</label>
        <input class ="l" type="password" name="password">
    </div>
    
    <input id="sub" type="submit" name="submit" value="Войти">
</form>

<?php

error_reporting(0);

class SqliUser
{
    public $mysqli;
    public string $dbName;
    
    
    function getData() 
    {
        $result = $this->mysqli->query("SELECT * From Users");
        $rowsCount = $result->num_rows;
        
        echo "<p>Всего аккаунтов в базе данных: $rowsCount</p>";

        foreach($result as $row)
        {
            $id = $row["id"];
            $username = $row["login"];
            $password = $row["password"];

            echo "<br>", "$id". "   " . "$username". "   " .  "$password", "<br>";
        }
    }
    
    
    function addToDb($login, $password)
    {
        $sql = "INSERT INTO Users (login, password) VALUES ('{$login}', '{$password}')";
        $this->mysqli->query($sql);
    }
    

    function __construct()
    {
        $this->mysqli = new mysqli("localhost", "konstantin", "3ed815");
        
        if($this->mysqli->connect_error)
            die("Ошибка: " . $this->mysqli->connect_error);

        $this->dbName = "tetsTable";
        
        if (! $this->mysqli->select_db($this->dbName))
        {
            $this->mysqli->query("CREATE DATABASE $this->dbName");
        }
    }
}

echo "<pre>";

$sqlUser = new SqliUser();
$query = $sqlUser->mysqli->query("CHECK TABLE Users");

if(isset($_POST['submit']))
{

    $sql = sprintf("SELECT password FROM Users WHERE login='%s'", $sqlUser->mysqli->real_escape_string($_POST['login']));

    $data = $sqlUser->mysqli->query($sql);
    $result = $data->fetch_assoc();

    if (isset($result))
    {
        if($result['password'] === $_POST['password'])
        {
            //header("Location: task_03.php"); 
            //exit();
            echo 'Success' . '<br>';
        }
        else
            echo "<div class=\"invalid\"><p>Вы ввели неправильный логин или пароль</p></div>";
    }
    else
        echo "<div class=\"invalid\"><p>Вы ввели неправильный логин или пароль</p></div>";
}
echo "</pre>";
?>

