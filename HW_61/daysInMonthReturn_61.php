<?php

    function daysInFebuary($year){
        
        if($year %4 == 0 && ($year %100 != 0 || $year %400 == 0)){
            $days = 29;            
        }else{
            $days = 28;  
        }
        return $days;
    }

    function daysInMonth($month, $year){
        $months = [
            "January" => 31,
            "March" => 31,
            "April" => 30,
            "May" => 31,
            "June" => 30,
            "July" => 31,
            "August" => 31,
            "September" => 30,
            "October" => 31,
            "November" => 30,
            "December" => 31
        ];
        foreach ($months as $key => $value) {
            if($month === $key){
                $numOfDays = $value;
            }elseif($month === "Febuary"){
                $numOfDays = daysInFebuary($year);
            }
        }
        return $numOfDays;
    }

$year = $_POST['year'];
$month = $_POST['month'];

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
</head>
<body>
    <div class="container">
        <header class="jumbotron text-center">
            <h1>Days In <?= $month, " ", $year ?></h1>
        </header>

        <div>
            <div class="col-sm-12 well text-center"><h1><?= daysInMonth($month, $year) ?></h1></div>
        </div>
    </div>
</body>
</html>