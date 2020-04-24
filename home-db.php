<?php

//this is for the database functions to be used on the homepage
//it'll go to the table listing and get all the information
//can also delete a listing from the database


function deleteTask($item_id)
{
    global $db;
    global $t;
    $t = "listing";
	
	$query = "DELETE FROM $t WHERE item_id=:item_id";
	$statement = $db->prepare($query);
	$statement->bindValue(':item_id', $item_id);
	$statement->execute();
	$statement->closeCursor();
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
?>