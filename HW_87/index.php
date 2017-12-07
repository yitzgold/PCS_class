<?php include "recipeNames.php" ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body {
            text-align: center;
        }

        #picture{
            width: 450px;
            height: 350px;
        }

        #recipeDisplay{
            display: none;
        }
    </style>
</head>

<body>
    <h1>MY FAVORITE RECIPES</h1>
   
    <form id="form">
        <label>Choose a recipe:</label>
        <?php 
            if(!empty($recipeNames)){
                foreach($recipeNames as $recipeName){
                    echo"<input type='radio' name='recipe' value={$recipeName['id']}> {$recipeName['name']} </input>";
                }
            }else{
                echo "<h4>NO RECIPES AVALIBLE</h4>";
            }
        ?>
    </form>
   
    <div id="recipeDisplay">
        <h2 id="name"></h2>
        <image id="picture"/>
        <h3>Ingredients:</h3>
        <div id="ingredients"></div>
    </div>

    <script src="/jquery-1.12.4.min.js"></script>
    <script src="recipes.js"></script>
</body>

</html>