<?php

include 'utils/db.php';

$rowsPerPage = 4;
try {
    $query = "SELECT COUNT(*) FROM houses";
    $results = $db->query($query);
    $numOfRows = $results->fetch(PDO::FETCH_COLUMN);
    $numOfPages =  ($numOfRows % $rowsPerPage == 0? ($numOfRows/$rowsPerPage)  :  (int)($numOfRows/$rowsPerPage)+1);                            
} catch (PDOException $e) {
    $error = "Something went wrong " . $e->getMessage();
}

if(empty($_GET['nextPg'])){
   $pageNum = 1;
   $lastRow = 0;

}

if(!empty($_GET['prevPg'])){
    if($_GET['prevPg'] > $numOfPages || $_GET['prevPg'] < 1 || !is_numeric($_GET['prevPg'])){
        $pageNum = 1;
    }else{
        $pageNum = $_GET['prevPg'];
    }
}

if(!empty($_GET['nextPg'])){
    if($_GET['nextPg'] > $numOfPages || $_GET['nextPg'] < 1 || !is_numeric($_GET['nextPg'])){
        $pageNum = 1;
    }else{
        $pageNum = $_GET['nextPg'];
    }
}
$lastRow = ($pageNum-1) * $rowsPerPage;

?>