<?php

    function yearOptionSetup(){
        $options = "";
        for ($i=1900; $i < 2051; $i++) { 
            $options .= "<option value='$i'> $i </option>";
        }
        return $options;
    }

    function monthOptionSetup(){
        $months = [
            "January",
            "Febuary",
            "March",
            "April",
            "May",
            "June",
            "July",
            "August",
            "September",
            "October",
            "November",
            "December"
        ];
        $options = "";
        foreach ($months as $month) {
            $options .= "<option value='$month'> $month </option>";
        }
        return $options;
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
</head>
<body>
    <div class="container">
        <header class="jumbotron text-center">
            <h1>DAYS IN A MONTH</h1>
        </header>

        <form class="form-horizontal" action="daysInMonthReturn_61.php" method="post">
            <div>
                <h3 class="text-center">Choose a Year and month</h3> 
            </div>
            <div class="form-group">
                <label for="color" class="col-sm-2 control-label">Year:</label>
                <div class="col-sm-10">
                    <select class="form-control" name="year">
                        <?= yearOptionSetup() ?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="fontFamily" class="col-sm-2 control-label">Month:</label>
                <div class="col-sm-10">
                    <select class="form-control" name="month">
                        <?= monthOptionSetup() ?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary">submit</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>