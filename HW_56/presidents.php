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
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <caption>
                        <h3 class="text-center">Recent Presidents</h3>
                    </caption>
                    <thead>
                        <tr>
                            <th>President</th>
                            <th>Year</th>           
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td> <?= $name1 = "George Bush"; "$name1" ?> </td>
                            <td> <?= $year1 = 2000; "$year1" ?> </td>
                        </tr>
                        <tr>
                            <td> <?= $name2 = "Barack Obama"; "$name2" ?> </td>
                            <td> <?= $year2 = 2008; "$year2" ?> </td>
                        </tr>
                        <tr>
                            <?php
                                $name3 = "Donald Trump"; 
                                echo "<td> $name3 </td>"; 
                                $year3 = 2017;
                                echo "<td> $year3 </td>"; 
                            ?>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>