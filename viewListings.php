
<!-- Jason Chen (jc4rn) -->
<div class="movieHomePage">
    <?php
    /*
    * sample sql to add data to listing
    * "INSERT INTO user (item_id, image, brand, item_condition, type, description)
    VALUES ("0001", "", "apple", "good", "tablet, "its a good tablet")";
    */

    $query = "SELECT * FROM profile NATURAL JOIN lists NATURAL JOIN listing NATURAL JOIN listing_brand WHERE Username=:user";
    $statement = $db->prepare($query);
    $statement->bindValue(':user', $_SESSION['user']);
    $statement->execute();
    $results = $statement->fetchAll();
    $statement->closeCursor();

    foreach ($results as $listing): ?>

        <div class="row">
            <div class="column left-icon">
                <img class="itemPic" src="Static/Images/<?php echo $listing['image']?>">
            </div>
            <div class="column right-icon">
                <h3><?php echo $listing['brand'] ?> - <?php echo $listing['type'] ?></h3>
                <h4>Price: $<?php echo $listing['price'] ?></h4>
                <h4>Description: <?php echo $listing['description'] ?></h4>
            </div>
        </div>
    <?php endforeach; ?>
</div>