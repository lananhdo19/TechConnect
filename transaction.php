<?php
require('connectdb.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $stmt = $db->prepare("select card_number from card_info where User= '" . $_SESSION['user'] . "'");
    $stmt->execute();
    $card_number = $stmt->fetch();

    $date = date("Y-m-d H:i:s");
    $stmt = $db->prepare("INSERT INTO transaction (item_id, date, card_number) VALUES  ( ? , ?, ?)");
    $stmt->execute([ $_POST['item_id'],  $date, $card_number[0]]);

    //SELECT transaction_id FROM transaction where date=2020-04-25 02:20:18
    $stmt = $db-> prepare("SELECT transaction_id FROM transaction where date= '$date'");
    $stmt->execute();
    $transaction = $stmt->fetch()[0];
    echo "Insert into makes VALUES ('". $_SESSION['user'] . "' , '$transaction')";

    $stmt = $db->prepare("Insert into makes VALUES ('". $_SESSION['user'] . "' , '$transaction')");
    $stmt->execute();

    $stmt->closeCursor();

    header("Location: user.php");
}
