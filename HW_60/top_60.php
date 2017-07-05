<?php
    $color = "#20df4b";
    if(!empty($_GET["color"])) {
        $color = $_GET["color"];
    }
    $fontFamily = "Arial Black";
    if(!empty($_GET["fontFamily"])) {
        $fontFamily = $_GET["fontFamily"];
    }

    $fonts = [
        "Arial Black", "Times New Roman","Impact", "Courier New","Minion Web", "Comic Sans MS", "sans-serif", "cursive", "Webdings", "Symbol"
    ];
    foreach($fonts as $key=>$font){
        $slot = ($key+1);
        $styles[] = "option:nth-child($slot) {
        font-family: $font;
        }";
    }
?>

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
            color: <?= $color ?>;            
            font-family: <?= $fontFamily ?>; 
        }

        <?php 
            foreach($styles as $style) {
                echo $style;
            }
        ?>

        article{
            margin-bottom: 60px;
        }
        footer .navbar-text {
            margin-left: 0;
        }
    </style>
</head>
<body>
    
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <ul class="nav navbar-nav">
                <li><a class="navbar-brand" href="home_60.php">Home</a></li>
                <li><a href="link1_60.php">Link 1</a></li>
                <li><a href="link2_60.php">Link 2</a></li>
            </ul>
        </div>
    </nav>

     <div class="container">
        <header class="jumbotron text-center">
            <h1>HW_60</h1>
        </header>

        <form class="form-horizontal" method="get">
            <div>
                <h3 class="text-center">Choose the Color and Font that you want to display this page</h3> 
            </div>
            <div class="form-group">
                <label for="color" class="col-sm-2 control-label">Color:</label>
                <div class="col-sm-10">
                    <input type="color" class="form-control" id="color" name="color" placeholder="color"
                        value="<?= $color ?>"
                    >    
                </div>
            </div>

            <div class="form-group">
                <label for="fontFamily" class="col-sm-2 control-label">Font-Family:</label>
                <div class="col-sm-10">
                    <select class="form-control" name="fontFamily">
                        <?php foreach($fonts as $font) : ?>
                            <option value="<?= $font ?>"
                                <?php if ($font === $fontFamily) echo "selected" ?>
                            >
                                <?= $font ?> 
                            </option>
                        <?php endforeach ?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary">submit</button>
                </div>
            </div>
            
        </form>

