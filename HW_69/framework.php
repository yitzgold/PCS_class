<?php 
class Framework{
    private static $top;
    private static $bottom;

    public function __construct(){
        Framework::$top = topSetup();
        Framework::$bottom = bottomSetup();
    }
    public static function getTop(){
        echo Framework::$top;
    }
    public static function getBottom(){
        echo Framework::$bottom;
    }
}
function topSetup(){
    return '
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
                    padding-bottom: 55px;
                }
            </style>
        </head>
        <body>
            <nav class="navbar navbar-default navbar-fixed-top">
                <div class="container">
                    <ul class="nav navbar-nav">
                        <li><a class="navbar-brand" href="home.php">Home</a></li>
                        <li><a href="page1.php">Page1</a></li>
                        <li><a href="page2.php">Page2</a></li>
                    </ul>
                </div>
            </nav>
        
            <div class="container">
                <header class="jumbotron text-center">
                    <h1>YITZI\'S SITE</h1>
                </header>'; 
}
function bottomSetup(){
    return '
            </div>
            <nav class="navbar navbar-fixed-bottom navbar-default">
                <div class="container">
                    <p>©yitzi goldman 2017</p>
                </div>
            </nav>     
        </body>
        </html>';
}

?>