<?php

require('connectdb.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    global $db;

    $email = htmlspecialchars($_POST['email']);

    $query = "SELECT * FROM user_pass WHERE email= '" . $email . "'" ;
    $statement = $db->prepare($query);
    $statement->execute();

    if ($statement->rowCount() > 0) {
        echo "Account Already Exists";
    }

    $statement->closeCursor();
}
