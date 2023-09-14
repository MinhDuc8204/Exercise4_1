<?php
    $name=filter_input(INPUT_POST, "name");
    if($name==null){
        $error = "Invalid product data. Check all fields and try again.";
        include('error.php');
    }else{
        require_once('database.php');
        $query="insert into categories (categoryName) value ('".$name."');";
        $statement=$db->prepare($query);
        $statement->execute();
        $statement->closeCursor();

        include('category_list.php');
    }
?>