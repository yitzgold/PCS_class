<?php
include_once "https.php";
include_once 'session.php';
include 'top.php'; 
if($_SESSION['loggedIn'] === true): ?>
    <h1>My secret Page</h1>
    <form action="logOut.php" method="post">
        <input type="hidden" name="logOut" value="loggedOut">
        <button type="submit" class="btn btn-primary">log out</button>
    </form>
<?php else : ?>
    <div class="alert alert-danger text-center">
        <h3>You are not logged in</h3>
        <a href="loginView.php">Log In</a>
    </div>
<?php endif;

include 'bottom.php'; ?>