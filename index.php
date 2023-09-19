<?php
error_reporting(-1);
use classes\User;
use classes\Db;
require_once __DIR__ . '/vendor/autoload.php';
//$user = new User('','','');

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
<form method="post" action="addUsers.php">
    <div class="container mt-5">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Login</label>
            <input name="login" type="text" class="form-control"  ">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input name="password" type="password" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <button name="btn_reg" type="submit" class="btn btn-primary">Submit</button>
</form>
<a type="button" href="showUsers.php" class="btn btn-primary">Show Users</a>
</div>
</body>
</html>

