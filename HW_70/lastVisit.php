<?php
setCookie("lastVisit", time(), time() + (10 * 365 * 24 * 60 * 60));
 if(!empty($_COOKIE["lastVisit"])) {
    ("F j, Y, g:i:s a");
    $message = "Welcome back!! your last visited our Site on " .  date("F j, Y, g:i:s a",$_COOKIE["lastVisit"]);
} else {
    $message = "Welcome to our Site!! this is your first time here";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1><?= $message ?></h1>
    <p>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum, qui! Explicabo voluptates nesciunt animi natus quam delectus possimus fuga perferendis quas architecto at quia nisi aspernatur unde culpa enim ullam inventore eum obcaecati placeat sequi, atque deleniti libero? Nobis optio impedit vero beatae itaque dolorem nihil deleniti aut atque! Similique accusamus dicta laboriosam autem fugiat excepturi deleniti necessitatibus iusto accusantium quasi deserunt atque, corporis sequi quam in recusandae provident distinctio beatae error a! Eum earum temporibus rerum velit, debitis dolores dolorem ipsam deleniti! Vitae ab dicta soluta nam unde libero sint eum. Quis optio, nihil reprehenderit nisi libero voluptates omnis.
    </p>
</body>
</html>