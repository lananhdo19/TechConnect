<?php

//this is for the database functions to be used on the homepage
//it'll go to the table listing and get all the information
//can also delete a listing from the database
function add_listing($brand, $item_condition, $type, $description, $price){
    global $db;
    //collon specifies a "fill in the blank"
    $query = "INSERT INTO listing (brand, item_condition, type, description, price) VALUES (:brand, :item_condition, :type, :description, :price);";
    $statement = $db->prepare($query);
    $statement->bindValue(':brand', $brand);
    $statement->bindValue(':item_condition', $item_condition);
    $statement->bindValue(':type', $type);
    $statement->bindValue(':description', $description);
    $statement->bindValue(':price', $price);
    $statement->execute();
    $statement->closeCursor();
}
?>