<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Jason Chen (jc4rn)-->

    <meta charset="UTF-8">
    <title>User Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="Static/user.css">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <Script src="JS/user.js"></Script>

</head>

<body>

<!-- Success Message for updating profile and creating movie entry -->
<div class="alert alert-success alert-dismissible fade in" id="successMessage">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    Listing Created Successfully!
</div>

<?php
session_start();
if (isset($_SESSION['user'])) {
    require('connectdb.php');
    require('user-db.php');
    global $db;
    ?>

    <ul class="ulBottomNav">
        <li class="liBottomNav"><a class="active" href="home.php">Home</a></li>
        <li class="liBottomNav"><a href="logout.php">Logout</a></li>
    </ul>

    <!-- Profile Section -->
    <div class="row">
        <div class="column left">
            <img class="profilePic" src="Static/Images/default-user.png" alt="name">
        </div>
        <div class="column right">
            <button type="buttton" id="createListing" data-toggle="modal" data-target="#createListingModal">Add
                Listing
            </button>

            <h1 id="username">Hi, <?php echo $_SESSION['user'] ?></h1>
            <h3><b>Email:</b> <span id="email"><?php echo $_SESSION['email'] ?></span></h3>
            <h3><b>Payment Stored:</b> <span>
                    <?php
                    $query = "SELECT * FROM card_info WHERE User=:user";
                    $statement = $db->prepare($query);
                    $statement->bindValue(':user', $_SESSION['user']);
                    $statement->execute();
                    $results = $statement->fetchAll();
                    $statement->closeCursor();
                    if($results) {
                        echo substr($results[0]['card_number'], 0, 4) . " " . substr($results[0]['card_number'], 4, 4) . " " . substr($results[0]['card_number'], 8, 4) . " " . substr($results[0]['card_number'], 12, 4) . " (" . $results[0]['type'] . ")";
                    }
                    else {
                        echo "(No payment stored)";
                    }
                    ?>
                </span></h3>

            <button type="buttton" id="editProfile" data-toggle="modal" data-target="#editProfileModal">Edit
                Information
            </button>
        </div>
    </div>

    <!-- Section -->
    <div class="tabs">
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#listings">Listings</a></li>
            <li><a data-toggle="tab" href="#messages">Messages</a></li>
        </ul>
    </div>
    <div class="tab-content">
        <div id="listings" class="tab-pane fade in active">
            <h3><strong>All of your current listings</strong></h3>
            <div>
                <?php
                include('viewListings.php');
                ?>
            </div>
        </div>
        <div id="messages" class="tab-pane fade">
            <h3><strong>All of your messages</strong></h3>
            <div>
                <?php
                include('viewMessages.php');
                ?>
            </div>
        </div>
    </div>


    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (!empty($_POST['action']) && $_POST['action'] == 'update') {

            //update user_pass
            $query = "UPDATE user_pass SET email=:email WHERE email=:curEmail";
            $statement = $db->prepare($query);
            $statement->bindValue(':curEmail', $_SESSION['email']);
            $statement->bindValue(':email', $_POST['email']);
            $statement->execute();
            $statement->closeCursor();

            //update profile
            $query2 = "UPDATE profile SET Username=:username, email=:email WHERE email=:curEmail";
            $statement = $db->prepare($query2);
            $statement->bindValue(':curEmail', $_SESSION['email']);
            $statement->bindValue(':email', $_POST['email']);
            $statement->bindValue(':username', $_POST['username']);
            $statement->execute();
            $statement->closeCursor();

            //update messages
            $query3 = "UPDATE messages SET username_1=:username WHERE username_1=:curUser";
            $statement = $db->prepare($query3);
            $statement->bindValue(':curUser', $_SESSION['user']);
            $statement->bindValue(':username', $_POST['username']);
            $statement->execute();
            $statement->closeCursor();

            $query4 = "UPDATE messages SET username_2=:username WHERE username_2=:curUser";
            $statement = $db->prepare($query4);
            $statement->bindValue(':curUser', $_SESSION['user']);
            $statement->bindValue(':username', $_POST['username']);
            $statement->execute();
            $statement->closeCursor();

            //update lists
            $query5 = "UPDATE lists SET Username=:username WHERE Username=:curUser";
            $statement = $db->prepare($query5);
            $statement->bindValue(':curUser', $_SESSION['user']);
            $statement->bindValue(':username', $_POST['username']);
            $statement->execute();
            $statement->closeCursor();

            //update card_info
            $query5 = "UPDATE card_info SET User=:username WHERE User=:curUser";
            $statement = $db->prepare($query5);
            $statement->bindValue(':curUser', $_SESSION['user']);
            $statement->bindValue(':username', $_POST['username']);
            $statement->execute();
            $statement->closeCursor();

            if (!empty($_POST['oldPwd'])) { // when password is not updated
                $query = "SELECT * FROM user_pass WHERE email=:email";
                $statement = $db->prepare($query);
                $statement->bindValue(':email', $_SESSION['email']);
                $statement->execute();
                $results = $statement->fetchAll();
                $statement->closeCursor();
                if (password_verify($_POST['oldPwd'], $results[0]['password'])) {
                    $password = password_hash(htmlspecialchars($_POST['newPwd']), PASSWORD_BCRYPT);
                    $query3 = "UPDATE user_pass SET password=:password WHERE email=:curEmail";
                    $statement = $db->prepare($query3);
                    $statement->bindValue(':curEmail', $_SESSION['email']);
                    $statement->bindValue(':password', $password);
                    $statement->execute();
                    $statement->closeCursor();
                }
            }

            $_SESSION['user'] = $_POST['username'];
            $_SESSION['email'] = $_POST['email'];
            header('Location: user.php');
        }
    }
    ?>
    <!-- Edit Profile Modal -->
    <div class="modal fade" id="editProfileModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editProfileTitle">What Information Would You Like To Change?
                        <button type="button" class="close" id="closeUserModal" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </h5>
                </div>
                <div class="modal-body">
                    <form class="profileForm" onsubmit="return updateUserInfo()" method="POST">
                        <div class="form-group">
                            <label for="inputUsername">Username</label>
                            <input type="text" class="form-control" id="inputUsername" name="username" value="<?php echo $_SESSION['user']?>">
                            <p id="usernameError" style="color: red"></p>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail">Email</label>
                            <input type="email" class="form-control" id="inputEmail" name="email" value="<?php echo $_SESSION['email']?>">
                            <p id="emailError" style="color: red"></p>
                        </div>
                        <div class="form-group">
                            <label for="inputOldPassword">Old Password</label>
                            <input type="password" class="form-control" id="inputOldPassword" name="oldPwd">
                            <p id="oldPasswordError" style="color: red"></p>
                        </div>
                        <div class="form-group">
                            <label for="inputNewPassword">New Password</label>
                            <input type="password" class="form-control" id="inputNewPassword" name="newPwd">
                            <p id="newPasswordError" style="color: red"></p>
                        </div>
                        <div class="form-group">
                            <label for="inputConfirmNewPassword">Confirm New Password</label>
                            <input type="password" class="form-control" id="inputConfirmNewPassword" name="confirmNewPwd">
                            <p id="confirmNewPasswordError" style="color: red"></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary" name="action" value="update"  >Submit</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['action']) && $_POST['action'] == 'add' )
        {
            echo "does this work";
            if (!empty($_POST['inputBrand']) && !empty($_POST['inputType']) && !empty($_POST['inputDescription'])&& !empty($_POST['inputCondition'])&& !empty($_POST['inputPrice'])){
                add_listing($_POST['inputBrand'],$_POST['inputCondition'], $_POST['inputType'], $_POST['inputDescription'], $_POST['inputPrice']);
            }

            else {
                $msg = "Enter all information to add listing";
            }
        }
    ?>
    <!-- Create Listing Entry Modal -->
    <div class="modal fade" id="createListingModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create A New Item Listing!
                        <button type="button" class="close" id="closeMovieModal" data-dismiss="modal"
                                aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </h5>
                </div>
                <div class="modal-body">
                    <form class="listingForm" method="POST">
                        <div class="form-group">
                            <label for="inputItemName">Item Name</label>
                            <input type="text" class="form-control" id="inputItemName" name="inputItemName">
                            <div class="invalid-feedback" id="itemNameError">
                                Please enter an item name
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputBrand">Brand</label>
                                <input type="text" class="form-control" id="inputBrand" name="inputBrand">
                                <div class="invalid-feedback" id="brandError">
                                    Please enter a brand name
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="inputPrice">Price</label>
                                <input type="text" class="form-control" id="inputPrice" name="inputPrice">
                                <div class="invalid-feedback" id="priceError">
                                    Please enter a price
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputCondition">Condition</label>
                                <select id="inputCondition" name="inputCondition" class="form-control">
                                    <option selected>Choose...</option>
                                    <option value = "New">New</option>
                                    <option value = "Excellent">Excellent</option>
                                    <option value = "Good">Good</option>
                                    <option value = "Fair">Fair</option>
                                    <option value = "Broken">Broken</option>
                                </select>
                                <div class="invalid-feedback" id="conditionError">
                                    Please choose a condition
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="inputType">Type</label>
                                <select id="inputType" name="inputType" class="form-control">
                                    <option selected>Choose...</option>
                                    <option value = "laptop">laptop</option>
                                    <option value = "headphones">headphones</option>
                                    <option value = "tv">tv</option>
                                    <option value = "gaming">gaming</option>
                                    <option value = "tablet">tablet</option>
                                    <option value = "desktop">desktop</option>
                                </select>
                                <div class="invalid-feedback" id="typeError">
                                    Please choose a type
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputDescription">Item Description</label>
                            <textarea type="textarea" class="form-control" id="inputDescription" name="inputDescription"></textarea>
                            <div class="invalid-feedback" id="descriptionError">
                                Please enter an item description
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="resetModal()">Cancel
                            </button>
                            <button type="submit" class="btn btn-primary" name="action" value="add" id ="listing_submit" onclick="listingValidation()">Submit</button>
                        </div>

                    </form>
                </div>
                <div class="modal-footer" method="post">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="resetModal()">Cancel
                    </button>
                    <button type="submit" class="btn btn-primary" name="listing_submit" onclick="listingValidation()">Submit</button>
                </div>
            </div>
        </div>
    </div>

    <?php
}
?>

</body>
</html>
