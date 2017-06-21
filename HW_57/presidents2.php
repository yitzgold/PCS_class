<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" 
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <title>Document</title>
</head>
<body>
                                        <!--QUESTION #1-->
    <?php
        $presidents = [
            [
                "Donald J Trump",
                "2017-"
            ],
            [
                "Barack Obama",
                "2009-2016"
            ],
            [
                "George W Bush",
                "2001-2008"
            ]
        ];
    ?>
    <div class="container">
        <table class="table table-striped table-bordered table-hover">
            <caption>
                <h3 class="text-center">Recent Presidents</h3>
            </caption>
            <thead>
                <tr>
                    <th>President</th>
                    <th>Years</th>           
                </tr>
            </thead>
            <tbody>
                <?php
                    $outerLength = count($presidents);
                    for ($i=0; $i < $outerLength; $i++) { 
                        echo "<tr>";
                        $innerLength = count($presidents[$i]);
                        for ($j=0; $j < $innerLength; $j++){ 
                            echo "<td>" .  $presidents[$i][$j] . "</td>";
                        }
                        echo"</tr>";
                    }
                ?>
            </tbody>
        </table>

                                            <!--QUESTION #2-->
    <?php
        $presidents2 = [
            [
                "name" => "Donald J Trump",
                "years" => "2017-"
            ],
            [
                "name" => "Barack Obama",
                "years" => "2009-2016"
            ],
            [
                "name" => "George W Bush",
                "years" => "2001-2008"
            ]
        ];
    ?>
        <table class="table table-striped table-bordered table-hover">
            <caption>
                <h3 class="text-center">Recent Presidents</h3>
            </caption>
            <thead>
                <tr>
                    <th>President</th>
                    <th>Years</th>           
                </tr>
            </thead>
            <tbody>
                <?php
                $length = count($presidents2);
                for ($i=0; $i < $length; $i++) { 
                    echo "<tr><td>" .  $presidents2[$i]["name"] . "</td><td>" .  $presidents2[$i]["years"] . "</td></tr>";
                }
                ?>
            </tbody>
        </table>

                                            <!--EXTRA CREDIT-->
    <?php
        $presidents3 = [
            [
                "name" => "Donald J Trump",
                "years" => "2017-",
                "age" => 70
            ],
            [
                "name" => "Barack Obama",
                "years" => "2009-2016",
                "age" => 45
            ],
            [
                "name" => "George W Bush",
                "years" => "2001-2008",
                "age" => 55
            ]
        ];
    ?>
        <table class="table table-striped table-bordered table-hover">
            <caption>
                <h3 class="text-center">Recent Presidents</h3>
            </caption>
            <thead>
                <tr>
                    <?php
                        foreach($presidents3[0] as $key=>$value){
                            echo "<th>" . $key . "</th>";
                        }    
                    ?>   
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($presidents3 as $president) {
                        echo "<tr>";
                        foreach($president as $key=>$value){
                            echo "<td>" . $value . "</td>";
                        }
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>          
    </div>
</body>
</html>