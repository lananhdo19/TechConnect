<?php

//this is for the database functions to be used on the homepage
//it'll go to the table listing and get all the information
//can also delete a listing from the database


function deleteTask($item_id)
{
    global $db;

    echo $item_id;
	
	$query = "DELETE FROM listing WHERE item_id=$item_id";
	////$query = "DELETE FROM $t WHERE `listing`.`item_id`=:item_id";
	$statement = $db->prepare($query);
	//$statement->bindValue(':item_id', $item_id);
	$statement->execute();
	$statement->closeCursor();
	//DELETE FROM `listing` WHERE `listing`.`item_id` = 1
}


function getAllTasks()
{
    global $db;
    global $t;
    $t = "listing";

	$query = "SELECT * FROM $t";
	$statement = $db->prepare($query);
	$statement->execute();
	
	// fetchAll() returns an array for all of the rows in the result set
	$results = $statement->fetchAll();
	
	// closes the cursor and frees the connection to the server so other SQL statements may be issued
	$statement->closecursor();
	
	return $results;
}

function getListing($listtype)
{
    global $db;
    global $t;
    $t = "listing";

	$query = "SELECT * FROM $t where type = :listtype";
	$statement = $db->prepare($query);
	$statement->bindValue(":listtype", $listtype);
	$statement->execute();
	
	// fetchAll() returns an array for all of the rows in the result set
	$results = $statement->fetchAll();
	
	// closes the cursor and frees the connection to the server so other SQL statements may be issued
	$statement->closecursor();
	
	return $results;
}

function getPrice() 
{
    global $db;
    global $t;
    $t = "listing_brand";

	$query = "SELECT * FROM $t";
	$statement = $db->prepare($query);
	$statement->execute();
	
	// fetchAll() returns an array for all of the rows in the result set
	$results = $statement->fetchAll();
	
	// closes the cursor and frees the connection to the server so other SQL statements may be issued
	$statement->closecursor();
	
	return $results;
}


function getTaskInfo_by_id($item_id)
{
	global $db;
	global $t;
    $t = "listing";
	// echo "in getTaskInfo_by_id " . $id ;
	
	$query = "SELECT * FROM $t where item_id = :item_id";
	$statement = $db->prepare($query);
	$statement->bindValue(':item_id', $item_id);
	$statement->execute();
	
	// fetchAll() returns an array for all of the rows in the result set
	// fetch() return a row
	$results = $statement->fetch();
	
	// closes the cursor and frees the connection to the server so other SQL statements may be issued
	$statement->closecursor();
	
	return $results;
}

function sort_table()
{

}

function createMessage($username_1, $username_2, $text)
{
	global $db;
	$query = "INSERT INTO `messages` (`username_1`, `username_2`, `text`) VALUES (:username_1, :username_2, :text)";
	//INSERT INTO `messages` (`username_1`, `username_2`, `text`) VALUES ('', '', NULL)
	$statement = $db->prepare($query);
	echo $query;
	$statement->bindValue(':username_1', $username_1);
	$statement->bindValue(':username_2', $username_2);
	$statement->bindValue(':text', $text);
	$statement->execute(); 
	
	$statement->closeCursor();
}

function create_table()
{	
   global $db;
   $query = "CREATE TABLE IF NOT EXISTS messages2 (
            username_1 VARCHAR(40),
            username_2 VARCHAR(40),
            message VARCHAR(100),
        PRIMARY KEY (username_1)
		PRIMARY KEY (username_2)";
   $statement = $db->prepare($query);
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