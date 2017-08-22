<?php
    include_once 'dbConnection_68.php';
    include 'controllers/pagingHelper_68.php';
    $db = new DbConnection();
    try{
        $query = "SELECT id, name, price, category FROM sefer_price";
            if(!empty($categoryFilter) && in_array($categoryFilter, $categorys)) {
                $query .= " WHERE category = :categoryFilter";
            }
        $query .= " LIMIT :lastRow, :rowsPerPage";

        $statement = $db->getDB()->prepare($query);
            if (!empty($categoryFilter) && in_array($categoryFilter, $categorys)) { 
                $statement->bindValue('categoryFilter', $categoryFilter);
            }
        $statement->bindValue('lastRow', $lastRow, PDO::PARAM_INT);
        $statement->bindValue('rowsPerPage', $rowsPerPage, PDO::PARAM_INT);
        $statement->execute();
        $seforim = $statement->fetchAll(PDO::FETCH_ASSOC);
    } catch(PDOException $e) {
        die("Something is wrong with your connection " . $e->getMessage()); 
    }
?>
 