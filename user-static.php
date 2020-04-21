<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Jason Chen (jc4rn)-->

    <meta charset="UTF-8">
    <title>User Page</title>
    <link rel="stylesheet" href="Static/user.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

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

<!-- Profile Section -->
<div class="row">
    <div class="column left">
        <img class="profilePic" src="Static/Images/default-user.png" alt="name">
    </div>
    <div class="column right">
        <button type="buttton" id="createListing" data-toggle="modal" data-target="#createListingModal">Add Listing</button>

        <h1 id="name">Hi, Username</h1>
        <h3><b>Email:</b> <span id="email">email@gmail.com</span></h3>
        <h3><b>Payment Method:</b> <span id="favMovie">Payment Name</span></h3>

        <button type="buttton" id="editProfile" data-toggle="modal" data-target="#editProfileModal">Edit Information</button>
    </div>
</div>

<!-- Section -->
<div class="tabs">
    <button class="tablinks" id="defaultOpen">Listings</button>
    <button class="tablinks">Messages</button>
</div>

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
                <form class="profileForm">
                    <div class="form-group">
                        <label for="inputUsername">Username</label>
                        <input type="text" class="form-control" id="inputUsername">
                    </div>
                    <div class="form-group">
                        <label for="inputEmail">Email</label>
                        <input type="text" class="form-control" id="inputEmail">
                    </div>
                    <div class="form-group">
                        <label for="inputOldPassword">Old Password</label>
                        <input type="password" class="form-control" id="inputOldPassword">
                    </div>
                    <div class="form-group">
                        <label for="inputNewPassword">New Password</label>
                        <input type="password" class="form-control" id="inputNewPassword">
                    </div>
                    <div class="form-group">
                        <label for="inputConfirmNewPassword">Confirm New Password</label>
                        <input type="password" class="form-control" id="inputConfirmNewPassword">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary" onclick="updateUserInfo()">Submit</button>
            </div>


        </div>
    </div>
</div>

<!-- Create Listing Entry Modal -->
<div class="modal fade" id="createListingModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create A New Item Listing!
                    <button type="button" class="close" id="closeMovieModal" data-dismiss="modal" aria-label="Close">
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

                    <div class="form-group">
                        <label for="inputItemPic">Upload Images</label>
                        <input type="file" class="form-control" id="inputItemPic">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="resetModal()">Cancel</button>
                <button type="submit" class="btn btn-primary" onclick="listingValidation()">Submit</button>
            </div>
        </div>
    </div>
</div>

</body>
</html>