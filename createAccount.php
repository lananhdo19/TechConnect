<?php

require('connectdb.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = htmlspecialchars($_POST['email']);
    $password = password_hash(htmlspecialchars($_POST['password']), PASSWORD_BCRYPT);
    //$first_name = htmlspecialchars($_POST['first_name']);
    //$last_name = htmlspecialchars($_POST['last_name']);

    $user = strstr($email, '@', true);
    $query = "call newAccount(:email, :password, :user);";
    $statement = $db -> prepare($query);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':user', $user);
    $statement->bindValue(':password', $password);
   // $statement->bindValue(':first_name', $first_name);
  //  $statement->bindValue(':last_name', $last_name);
    $statement->execute();
    $statement->closeCursor();


}
