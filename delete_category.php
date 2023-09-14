<?php
    require_once("database.php");

    $categoryName=filter_input(INPUT_POST, "nameCate", FILTER_VALIDATE_INT);

    if($categoryName!=false){
        $query="DELETE FROM categories WHERE categoryID= ".$categoryName."";
        $statement=$db->prepare($query);
        $statement->execute();
        $statement->closeCursor();        
    }

    include("category_list.php");
?>