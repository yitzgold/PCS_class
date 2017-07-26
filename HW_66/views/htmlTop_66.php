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
        body {
            padding-top: 45px;
        }
        .form-inline{
            padding-bottom: 20px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <ul class="nav navbar-nav">
                <li><a class="navbar-brand" href="frontController_66.php?category=<?= $categoryFilter ?>">Home</a></li>
                <li><a href="frontController_66.php?action=insert&category=<?= $categoryFilter ?>">Insert A Sefer</a></li>
                <li><a href="frontController_66.php?action=delete&category=<?= $categoryFilter ?>">Delete A Sefer</a></li>
            </ul>
        </div>
    </nav>
  
    <div class="container">