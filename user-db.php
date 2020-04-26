<?php
//this is for the database functions to be used on the homepage
//it'll go to the table listing and get all the information
//can also delete a listing from the database
function add_listing($brand, $item_condition, $type, $description, $price){
    global $db;
    //colon specifies a "fill in the blank"
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
function add_list($brand, $item_condition, $type, $description, $price, $username){
    global $db;
    //colon specifies a "fill in the blank"
    $query = "INSERT INTO lists (item_id, Username) VALUES ((SELECT item_id from listing where brand = :brand AND
    item_condition = :item_condition AND type = :type AND description = :description AND price = :price), :username);";
    $statement = $db->prepare($query);
    $statement->bindValue(':brand', $brand);
    $statement->bindValue(':item_condition', $item_condition);
    $statement->bindValue(':type', $type);
    $statement->bindValue(':description', $description);
    $statement->bindValue(':price', $price);
    $statement->bindValue(':username', $username);
    $statement->execute();
    $statement->closeCursor();
}

function updateBrand()
{
	global $db;
	$q = "SELECT COUNT(Brand) as c, Brand FROM listing GROUP BY Brand";
	$stmt = $db->prepare($q);
	$stmt->execute();
	$brands = $stmt->fetchAll();
    $stmt->closeCursor();

    $q2 = "DELETE FROM listing_brand";
    $stmt = $db->prepare($q2);
    $stmt->execute();
    $stmt->closeCursor();

    foreach ($brands as $brand):
		$stmt2 = $db->prepare("INSERT INTO listing_brand VALUES (:b, :c)");
	    $stmt2->bindValue(":b", $brand['Brand']);
	    $stmt2->bindValue(":c", $brand['c']);
		$stmt2->execute();
		$stmt2->closeCursor();
        
    endforeach;

	
	
	
}
?>