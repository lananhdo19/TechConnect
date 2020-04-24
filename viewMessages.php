<!-- Jason Chen (jc4rn) -->
<div class="movieHomePage">
    <?php
    /*
    * sample sql to add data to listing
    * "INSERT INTO user (item_id, image, brand, item_condition, type, description)
    VALUES ("0001", "", "apple", "good", "tablet, "its a good tablet")";
    */

    $query = "SELECT * FROM messages WHERE username_1=:user OR username_2=:user";
    $statement = $db->prepare($query);
    $statement->bindValue(':user', $_SESSION['user']);
    $statement->execute();
    $results = $statement->fetchAll();
    $statement->closeCursor();

    foreach ($results as $message): ?>

        <div class="row">
            <div class="column left-icon">
                <img class="itemPic" src="Static/Images/<?php if ($message['username_1']==$_SESSION['user']){ echo "sent.png"; }else{ echo "receive.png"; }?>">
            </div>
            <div class="column right-icon">
                <h3>From: <?php echo $message['username_1'] ?></h3>
                <h3>To: <?php echo $message['username_2'] ?></h3>
                <h4>Message: <?php echo $message['text'] ?></h4>
            </div>
        </div>
    <?php endforeach; ?>
</div>