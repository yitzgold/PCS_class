<?php
include_once 'session.php';
if(!empty($_POST['logOut'])){
    $_SESSION['loggedIn'] = false;
}
include 'loginView.php';
?>