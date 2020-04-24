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
        <li class="liBottomNav"><a href="#contact">About</a></li>
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
                    $query = "SELECT * FROM profile NATURAL JOIN payment_stored NATURAL JOIN credit_debit WHERE Username=:user";
                    $statement = $db->prepare($query);
                    $statement->bindValue(':user', $_SESSION['user']);
                    $statement->execute();
                    $results = $statement->fetchAll();
                    $statement->closeCursor();
                    if($results) {
                        echo $results[0]['card_number'];
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

            $query = "UPDATE user_pass SET email=:email WHERE email=:curEmail";
            $statement = $db->prepare($query);
            $statement->bindValue(':curEmail', $_SESSION['email']);
            $statement->bindValue(':email', $_POST['email']);
            $statement->execute();
            $statement->closeCursor();

            $query2 = "UPDATE profile SET Username=:username, email=:email WHERE email=:curEmail";
            $statement = $db->prepare($query2);
            $statement->bindValue(':curEmail', $_SESSION['email']);
            $statement->bindValue(':email', $_POST['email']);
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
                if (password_verify($results[0]['password'], $_POST['oldPwd'])) {
                    $password = password_hash(htmlspecialchars($_POST['newPwd']), PASSWORD_BCRYPT);
                    $query3 = "UPDATE user_pass SET password=:password WHERE email=:curEmail";
                    $statement = $db->prepare($query3);
                    $statement->bindValue(':curEmail', $_SESSION['email']);
                    $statement->bindValue(':password', $_POST['oldPwd']);
                    $statement->execute();
                    $statement->closeCursor();
                }
            }

            //$_SESSION['user'] = $_POST['username'];
            //$_SESSION['email'] = $_POST['email'];
            //header('Location: user.php)
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
    if (! empty($_POST['create'])){
        if(! empty($_POST['inputBrand']) & ! empty($_POST['inputCondition']) & ! empty($_POST['inputType']) & ! empty( $_POST['inputDescription']) & ! empty( $_POST['inputPrice']) ){
            add_listing($_POST['inputBrand'], $_POST['inputCondition'], $_POST['inputType'], $_POST['inputDescription'], $_POST['inputPrice']);
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
                    <form class="listingForm">
                        <div class="form-group">
                            <label for="inputItemName">Item Name</label>
                            <input type="text" class="form-control" id="inputItemName">
                            <div class="invalid-feedback" id="itemNameError">
                                Please enter an item name
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputBrand">Brand</label>
                                <input type="text" class="form-control" id="inputBrand">
                                <div class="invalid-feedback" id="brandError">
                                    Please enter a brand name
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="inputPrice">Price</label>
                                <input type="text" class="form-control" id="inputPrice">
                                <div class="invalid-feedback" id="priceError">
                                    Please enter a price
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputCondition">Condition</label>
                                <select id="inputCondition" class="form-control">
                                    <option selected>Choose...</option>
                                    <option>New</option>
                                    <option>Excellent</option>
                                    <option>Good</option>
                                    <option>Fair</option>
                                    <option>Broken</option>
                                </select>
                                <div class="invalid-feedback" id="conditionError">
                                    Please choose a condition
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="inputType">Type</label>
                                <select id="inputType" class="form-control">
                                    <option selected>Choose...</option>
                                    <option>Accessories</option>
                                    <option>Desktops</option>
                                    <option>Headphones</option>
                                    <option>Laptops</option>
                                    <option>Phones</option>
                                    <option>Tablets</option>
                                    <option>TV</option>
                                </select>
                                <div class="invalid-feedback" id="typeError">
                                    Please choose a type
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputDescription">Item Description</label>
                            <textarea type="textarea" class="form-control" id="inputDescription"></textarea>
                            <div class="invalid-feedback" id="descriptionError">
                                Please enter an item description
                            </div>
                        </div>

                        <!-- <div class="form-group">
                            <label for="inputItemPic">Upload Images</label>
                            <input type="file" class="form-control" id="inputItemPic">
                        </div> -->
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="resetModal()">Cancel
                    </button>
                    <button type="submit" id ="create" class="btn btn-primary" onclick="listingValidation()">Submit</button>
                </div>
            </div>
        </div>
    </div>

    <?php
}
?>

</body>
</html>