<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--<link rel="stylesheet" href="/bootstrap-3.3.7-dist/css/bootstrap.min.css">-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" 
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <title>Document</title>
    <style>
        body{
            margin-top: 55px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <ul class="nav navbar-nav">
                <li><a class="navbar-brand" href="home.php">Home</a></li>
                <li><a href="loginView.php">Login</a></li>
                <li><a href="addUserView.php">Add User</a></li>
            </ul>
        </div>
    </nav>
    <div class="container">
        <header class="jumbotron text-center">
            <h1>YITZ'S SECRET SITE</h1>
        </header>
        <?php if(isset($errors)) : ?>
        <div class="alert alert-danger text-center">
            <?php foreach($errors as $error) : ?>
            <h3><?=$error?></h3>
            <?php endforeach ?>
        </div>
        <?php endif ?> 