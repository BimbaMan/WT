<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>Sign in</title>
</head>
<body style="background: #e1e3e6">
<div class="container">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card border-0 shadow rounded-3 my-5">
                <div class="card-body p-4 p-sm-5">
                    <h5 class="card-title text-center mb-5 fw-light fs-5">Please, sign in</h5>
                    <form action="/WT/LR6/login.php" method="post">
                        <div class="form-floating mb-3">
                            <input type="username" class="form-control" id="username" name="username" placeholder="Username">
                            <label for="username">Username</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                            <label for="password">Password</label>
                        </div>
                        <div class="d-grid">
                            <button class="btn btn-primary btn-login text-uppercase fw-bold" type="submit">Sign in</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

<?php

if (isset($_POST['username']) && isset($_POST['password'])) {
    loginUser();
}

function loginUser() {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $conn = connectToDB();
    if(findUserInDB($conn, $username, $password)) {
        session_start();
        setcookie("session_id", session_id(), time() + 60 * 60 * 24 * 30);
        header('Location: /WT/LR6/fileManagerView.php');
    }
    else {
        header("Location: login.php");
    }
}

function connectToDB () {
    $DB_HOST = 'localhost';
    $DB_USER = 'ivan';
    $DB_PASS = 'My_pass125';
    $DB_NAME = 'testTable';

    $conn = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        //return null;
    }
    else {
        return $conn;
    }
}

function findUserInDB ($conn, $name, $pass) {
    $sql = "SELECT * FROM user_data WHERE username = '$name' AND password = '$pass'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        return true;
    }
    else {
        return false;
    }
}

