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
    document.getElementById("name").innerText = document.getElementById("inputUsername").value;
    document.getElementById("age").innerText = document.getElementById("inputAge").value;
    document.getElementById("favMovie").innerText = document.getElementById("inputFavMovie").value;
    document.getElementById("favStar").innerText = document.getElementById("inputFavStar").value;
    document.getElementById("userBlurb").innerText = document.getElementById("inputBlurb").value;
    document.getElementById("closeUserModal").click();
    document.getElementById("updateProfileSuccessMessage").style.display = "block";
    setTimeout(function() {
        document.getElementById("updateProfileSuccessMessage").style.display = "none";
    }, 9000);
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