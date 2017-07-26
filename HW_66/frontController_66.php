<?php
$action = "home";
$categoryFilter = "all";
if(!empty($_GET['action'])) {
    $action = $_GET['action'];
}

switch($action) {
    case 'home':
        include 'controllers/selectSeferController_66.php';
        exit;
    case 'insert':
        include 'controllers/insertSeferController_66.php';
        exit;
    case 'delete':
        include 'controllers/deleteSeferController_66.php';
        exit;
    default:
        $error = "unknown link- $action";
        include 'views/unknownLinkError_66.php';
        exit;
}

?>