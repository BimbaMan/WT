<?php

error_reporting(0);
session_start();

if(isset($_POST['sub']))
{
    $login = htmlspecialchars(strip_tags(trim($_POST['login'])));
    $pass = htmlspecialchars(strip_tags(trim($_POST['pass'])));
    $fp = fopen("authorization.txt", "r");
    
    if ($fp)
    {
        while (!feof($fp))
        {
            $str = explode('::',fgets($fp, 999));
            
            if(trim($str[0]) == $login && trim($str[1]) == $pass)
            {
                $_SESSION['login'] = $login;
                header('Location:task_01.php');
                exit();
            }
            
            $mess = 'Неверный логин или пароль';
        }
    }
    else
        echo 'Ошибка при открытии файла' . '<br><br>';

    fclose($fp);
}
?>

<title>task_02</title>
<form method="post" action="" class="form">
    <div class="login">
        <label>Логин</label>
        <input class ="l" type="text" name="login">
    </div>

    <div class="pass">
        <label>Пароль</label>
        <input class ="l" type="password" name="pass">
    </div>
    
    <input id="sub" type="submit" name="sub" value="Войти">
</form>

<?php if(isset($mess)){ ?>
<div class="invalid"><p><?php echo $mess;?></p></div>
<?php }?>
