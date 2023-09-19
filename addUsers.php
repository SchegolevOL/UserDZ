<?php

use classes\User;
require_once __DIR__ . '/vendor/autoload.php';
if (isset($_POST['btn_reg'])) {
    $user = new User(login: $_POST['login'], email: $_POST['email'], password: $_POST['password']);
    $user->addUserOfDb();
}
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
<?php if (isset($_SESSION['error'])): ?>
    <h3 class="text-danger"><?= $_SESSION['error'] ?></h3>
<?php endif; ?>
<?php if (isset($_SESSION['success'])): ?>
    <h3 class="text-success"><?= $_SESSION['success'] ?></h3>
<?php endif; ?>
<a type="button" href="index.php" class="btn btn-primary">Index</a>
<a type="button" href="showUsers.php" class="btn btn-primary">Show Users</a>
</body>
</html>
