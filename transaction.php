<?php
require('connectdb.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
   // echo $_POST['item_id'];
   // echo date("m/d/Y");
    //echo $_SESSION['user'] ;
    //echo $card_number[0];

    $stmt = $db->prepare("select card_number from card_info where User= '" . $_SESSION['user'] . "'");
    $stmt->execute();
    $card_number = $stmt->fetch();

    $stmt = $db->prepare("INSERT INTO transaction (item_id, date, card_number) VALUES  ( ? , ?, ?)");
    $stmt->execute([ $_POST['item_id'],  date("Y-m-d H:i:s"), $card_number[0]]);
    $stmt->closeCursor();

    header("Location: user.php");


}
