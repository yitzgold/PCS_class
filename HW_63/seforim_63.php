<?php

    try {
        $db = new PDO("mysql:host=localhost;dbname=seforim", "me", "password", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        
        $seforim = $db->query('SELECT name FROM sefer_price')->fetchAll(PDO::FETCH_COLUMN, 0);
        $options = "";
        foreach ($seforim as $sefer) {
            $options .= '<option value="'. strtolower($sefer).'">'.  $sefer . '</option>';
            // '<option value="'.$three.'">'.$three.'</option>';
        }
    } catch(PDOException $e) {
        die("Something is wrong with your connection " . $e->getMessage()); 
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
            <h1>Check the price of a Sefer</h1>
        </header>

        <form class="form-horizontal" action="seferReturn_63.php" method="get">

            <div class="form-group">
                <label for="name" class="col-sm-3 control-label">Choose a Sefer:</label>
                <div class="col-sm-9">
                    <select class="form-control" name="name" id="name">
                        <?= $options ?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-10">
                    <button type="submit" class="btn btn-primary">Get Price</button>
                </div>
            </div>

        </form>
    </div>
</body>
</html>