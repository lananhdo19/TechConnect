<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="author" content="Lan Anh Do">
    <meta name="description" content="TechConnect - a website for buying and selling tech">

    <title>TechConnect</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="Static/login-signup.css" />
</head>
<body>

<div class="totalPage d-md-flex h-md-100 align-items-center">

    <!-- Logo with Description Half -->
    <div class="col-md-6 p-0">
        <div class=" align-items-center h-100 text-center justify-content-center">
            <h1>TechConnect</h1>
            <div class="pt-5 pb-5" style="color: white;">
                Buy and Sell Your Tech
            </div>
        </div>
    </div>

    <!-- Form Half -->
    <div class="col-md-6 p-0 h-md-100">
        <div class="d-md-flex align-items-center h-md-100 p-5 justify-content-center">

            <div class="containerLoginSignUp">
                <!-- Sign Up Form Default-->
                <!--<form action="" method="post">
                <div class="signup-form form-group">
                    <h3>Create an Account</h3>
                    <span id="name-msg" class="error"></span>
                    <div class="row">
                        <div class="col-6">
                            <input type="text" name="firstName" placeholder="First Name" class="inputP" id="firstName" autofocus required><br />
                        </div>
                        <div class="col-6">
                            <input type="text" name="lastName" placeholder="Last Name" class="inputP" id="lastName" required><br />
                        </div>
                    </div>

                    <input type="email" name="emailSign" placeholder="Email" class="inputP" id="emailSign" required><br />
                    <span id="password-msg" class="error"></span>
                    <input type="password" name="passwordSign" placeholder="Password" class="inputP" id="passwordSign" required><br />
                    <button class="btn btn-primary" name="action" value="signUp" id="signUpButton" >Sign Up</button>
                    <p>Already have an account? <a class="loginTab">Login</a></p>
                </div>
               </form> -->
                <!-- Login Form -->
                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
                <div class="login-form form-group">
                    <h3>Login</h3>
                    <?php function error($message){?>
                      <span id="email-msg-login" class="error"><?php echo $message;?> </span>
                    <?php }?>
                    <input type="email" name="emailLogin" placeholder="Email" class="inputP" id="emailLogin" autofocus required><br />
                    <span id="pass-msg-login" class="error"></span>
                    <input type="password" name="passwordLogin" placeholder="Password" class="inputP" id="passwordLogin" required><br />
                    <button class="btn btn-primary" name="action" value="login" id="loginButton">Submit</button>
                    <p>Don't have an account? <a class="signUpTab">Sign Up</a></p>
                </div>
                </form>
            </div>
        </div>
    </div>

</div>

</body>

<script
    src="https://code.jquery.com/jquery-3.4.1.js"
    integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
    crossorigin="anonymous">

</script>
<script src="JS/login-signup.js"></script>
</html>

<?php
require('connectdb.php');

global $db;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = htmlspecialchars($_POST['emailLogin']);
    $password = htmlspecialchars($_POST['passwordLogin']);

    $query = "Select * FROM user_pass where email=:email";
    $statement = $db->prepare($query);
    $statement->bindValue(':email', $email);
    $statement->execute();

    if ($statement->rowCount() > 0) {
        $tuple = $statement->fetch();
        $pass = $tuple[1];

        if (password_verify($password, $pass)) {
            // echo "true";
            session_start();
            $_SESSION['email'] = $email;
            $_SESSION['first_name'] = $tuple[2];
            $_SESSION['last_name'] = $tuple[3];
            //header("Location: home.php");
        } else {
            error( "Incorrect password.");
        }
    } else  error( "Email does not have an account.");


    $statement->closeCursor();
}
?>
