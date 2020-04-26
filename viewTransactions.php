<!-- Jason Chen (jc4rn) -->
<div class="movieHomePage">
    <?php
    /*
    * sample sql to add data to listing
    * "INSERT INTO user (item_id, image, brand, item_condition, type, description)
    VALUES ("0001", "", "apple", "good", "tablet, "its a good tablet")";
    */

    $query = "SELECT * FROM (SELECT * FROM transaction NATURAL JOIN makes WHERE Username=:user) t1 JOIN (SELECT * FROM lists NATURAL JOIN listing_type NATURAL JOIN listing) t2 ON t2.item_id=t1.item_id";
    $statement = $db->prepare($query);
    $statement->bindValue(':user', $_SESSION['user']);
    $statement->execute();
    $results = $statement->fetchAll();
    $statement->closeCursor();

    foreach ($results as $transaction):
        ?>

        <div class="row">
            <div class="column left-icon">
                <img class="itemPic" src="Static/Images/<?php echo $transaction['image']?>">
            </div>
            <div class="column right-icon">
                <h3> Transaction ID: <?php echo $transaction['transaction_id']?></h3>
                <h4><?php echo $transaction['brand'] ?> - <?php echo $transaction['type'] ?></h4>
                <h4>Price: $<?php echo $transaction['price'] ?></h4>
                <h4>Payment Used: <?php echo substr($results[0]['card_number'], 0, 4) . " " . substr($results[0]['card_number'], 4, 4) . " " . substr($results[0]['card_number'], 8, 4) . " " . substr($results[0]['card_number'], 12, 4) ?></h4>
            </div>
        </div>
    <?php endforeach; ?>
</div>