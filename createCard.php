<?php

require('connectdb.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $cardNum = htmlspecialchars($_POST['cardNum']);
    $cardType = htmlspecialchars($_POST['cardType']);
    $user = htmlspecialchars($_POST['user']);

    $query = "Insert into card_info values (:cardNum, :cardType, :user)";

    $statement = $db->prepare($query);
    $statement->bindValue(':cardNum', $cardNum);
    $statement->bindValue(':cardType', $cardType);
    $statement->bindValue(':user', $user);
    $statement->execute();
    $statement->closeCursor();

}
