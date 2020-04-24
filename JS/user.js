let resetModal = () => {
    document.getElementById("inputItemName").style.removeProperty("border-color");
    document.getElementById("inputBrand").style.removeProperty("border-color");
    document.getElementById("inputPrice").style.removeProperty("border-color");
    document.getElementById("inputCondition").style.removeProperty("border-color");
    document.getElementById("inputType").style.removeProperty("border-color");
    document.getElementById("inputDescription").style.removeProperty("border-color");
    document.getElementById("itemNameError").style.display = "none";
    document.getElementById("brandError").style.display = "none";
    document.getElementById("priceError").style.display = "none";
    document.getElementById("conditionError").style.display = "none";
    document.getElementById("typeError").style.display = "none";
    document.getElementById("descriptionError").style.display = "none";
    document.getElementById("inputItemName").value = "";
    document.getElementById("inputBrand").value = "";
    document.getElementById("inputPrice").value = "";
    document.getElementById("inputCondition").value = "Choose...";
    document.getElementById("inputType").value = "Choose...";
    document.getElementById("inputDescription").value = "";
    document.getElementById("inputItemPic").value = "";

}


//updates the user info
function updateUserInfo() {
    let username =  document.getElementById("inputUsername").value;
    let email =  document.getElementById("inputEmail").value;
    let oldPwd = document.getElementById("inputOldPassword").value;
    let newPwd = document.getElementById("inputNewPassword").value;
    let confirmNewPwd = document.getElementById("inputConfirmNewPassword").value;

    let valid = true;

    if (username == "") {
        valid = false;
        document.getElementById("usernameError").innerText = "Please enter an username";
    }
    else {
        document.getElementById("usernameError").innerText = "";
    }
    if (email == "") {
        valid = false;
        document.getElementById("emailError").innerText = "Please enter a valid email";
    }
    else {
        document.getElementById("emailError").innerText = "";
    }
    if(newPwd != "" || confirmNewPwd != "") {
        if (oldPwd == "") {
            valid = false;
            document.getElementById("oldPasswordError").innerText = "Please enter your old password before creating a new password"
        }
        else {
            document.getElementById("oldPasswordError").innerText = "";
        }
        if (newPwd != confirmNewPwd) {
            valid = false;
            document.getElementById("newPasswordError").innerText = "New password don't match";
            document.getElementById("confirmNewPasswordError").innerText = "New password don't match";
        }
        else {
            document.getElementById("newPasswordError").innerText = "";
            document.getElementById("confirmNewPasswordError").innerText = "";
        }
    }
    return valid;
}

// Makes sure all parts of movie is acceptable
function listingValidation() {
    var name = document.getElementById("inputItemName").value;
    var brand = document.getElementById("inputBrand").value;
    var price = document.getElementById("inputPrice").value;
    var condition = document.getElementById("inputCondition").value;
    var type = document.getElementById("inputType").value;
    var desc = document.getElementById("inputDescription").value;

    let valid = true;

    if(name == "") {
        valid = false;
        document.getElementById("inputItemName").style.borderColor = "red";
        document.getElementById("itemNameError").style.display = "block";
    }
    else {
        document.getElementById("inputItemName").style.borderColor = "#32CD32";
        document.getElementById("itemNameError").style.display = "none";
    }

    if(brand == "") {
        valid = false;
        document.getElementById("inputBrand").style.borderColor = "red";
        document.getElementById("brandError").style.display = "block";
    }
    else {
        document.getElementById("inputBrand").style.borderColor = "#32CD32";
        document.getElementById("brandError").style.display = "none";
    }

    let pat = /[0-9]/;
    if(price == "" || !pat.test(price)) {
        valid = false;
        document.getElementById("inputPrice").style.borderColor = "red";
        document.getElementById("priceError").style.display = "block";
    }
    else {
        document.getElementById("inputPrice").style.borderColor = "#32CD32";
        document.getElementById("priceError").style.display = "none";
    }

    if(condition == "Choose...") {
        valid = false;
        document.getElementById("inputCondition").style.borderColor = "red";
        document.getElementById("conditionError").style.display = "block";
    }
    else {
        document.getElementById("inputCondition").style.borderColor = "#32CD32";
        document.getElementById("conditionError").style.display = "none";
    }

    if(type == "Choose...") {
        valid = false;
        document.getElementById("inputType").style.borderColor = "red";
        document.getElementById("typeError").style.display = "block";
    }
    else {
        document.getElementById("inputType").style.borderColor = "#32CD32";
        document.getElementById("typeError").style.display = "none";
    }

    if(desc == "") {
        valid = false;
        document.getElementById("inputDescription").style.borderColor = "red";
        document.getElementById("descriptionError").style.display = "block";
    }
    else {
        document.getElementById("inputDescription").style.borderColor = "#32CD32";
        document.getElementById("descriptionError").style.display = "none";
    }

    if (valid) {
        document.getElementById("closeMovieModal").click();
        document.getElementById("successMessage").style.display = "block";
        setTimeout(function() {
            $("#successMessage").fadeOut(1000);
        }, 4000);
        return true;
    }
    return false;

}