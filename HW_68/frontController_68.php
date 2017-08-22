<?php
$action = "home";
$categoryFilter = "all";
if(!empty($_GET['action'])) {
    $action = $_GET['action'];
}
if(!empty($_POST['updateID']) || !empty($_POST['hiddenID'])){
    $action = "update";
}
if(!empty($_POST['IdDelete'])){
    $action = "deleteWarning";
}

switch($action) {
    case 'home':
        include 'controllers/homeSeforimController_68.php';
        exit;
    case 'insert':
        include 'controllers/insertSeferController_68.php';
        exit;
    case 'update':
        include 'controllers/updateSeferController_68.php';
        exit;
    case 'deleteWarning':
        $IdDelete = $_POST['IdDelete'];
        $nameDelete = $_POST['nameDelete'];
        include 'views/deleteWarningView_68.php';
        exit;
    default:
        $error = "unknown link- $action";
        include 'views/unknownLinkError_68.php';
        exit;
}

?>