<?php

session_start();

include "db.php";

$message = "";


if(isset($_POST['login'])) {

    $email = trim($_POST['email']);
    $password = $_POST['password'];


    $stmt = $conn->prepare(
        "SELECT id, fullname, password
         FROM users
         WHERE email = ?"
    );

    $stmt->bind_param("s", $email);

    $stmt->execute();

    $result = $stmt->get_result();


    if($result->num_rows == 1) {

        $user = $result->fetch_assoc();


        if(password_verify($password, $user['password'])) {

            $_SESSION['user'] = $user['fullname'];
            $_SESSION['user_id'] = $user['id'];

            header("Location: index.php");

            exit();

        }

        else {

            $message = "Invalid email or password.";

        }

    }

    else {

        $message = "Invalid email or password.";

    }

}

?>


<!DOCTYPE html>

<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>Login</title>


<style>

* {
    box-sizing: border-box;
    font-family: Arial;
}

body {
    background: #eef3f8;
    margin: 0;
}

header {
    background: #123c69;
    padding: 18px 8%;
    color: white;
    display: flex;
    justify-content: space-between;
}

header a {
    color: white;
    text-decoration: none;
    margin-left: 20px;
}

.login-container {
    width: 380px;
    max-width: 90%;
    margin: 70px auto;
    background: white;
    padding: 35px;
    border-radius: 10px;
    box-shadow: 0 5px 20px rgba(0,0,0,.15);
}

h2 {
    text-align: center;
    color: #123c69;
    margin-bottom: 25px;
}

label {
    display: block;
    margin-top: 15px;
    margin-bottom: 5px;
}

input {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

button {
    width: 100%;
    padding: 12px;
    margin-top: 25px;
    background: #123c69;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

button:hover {
    background: #0b2948;
}

.error {
    background: #ffe5e5;
    color: #c00000;
    padding: 10px;
    text-align: center;
    margin-bottom: 15px;
    border-radius: 5px;
}

.register {
    text-align: center;
    margin-top: 20px;
}

.register a {
    color: #123c69;
}

</style>

</head>


<body>

<header>

<b>CSE Department</b>

<div>

<a href="index.php">Home</a>

<a href="about.php">About</a>

<a href="register.php">Register</a>

</div>

</header>


<div class="login-container">

<h2>Student Login</h2>


<?php if($message != "") { ?>

<div class="error">

<?php echo htmlspecialchars($message); ?>

</div>

<?php } ?>


<form method="POST"
      onsubmit="return validateLogin()">


<label>Email</label>

<input
type="email"
name="email"
id="email"
placeholder="Enter your email"
required>


<label>Password</label>

<input
type="password"
name="password"
id="password"
placeholder="Enter your password"
required>


<button type="submit" name="login">

Login

</button>

</form>


<div class="register">

Don't have an account?

<a href="register.php">
Create Account
</a>

</div>

</div>


<script>

function validateLogin() {

    let email =
        document.getElementById("email").value;

    let password =
        document.getElementById("password").value;


    if(email.trim() === "") {

        alert("Please enter your email.");

        return false;

    }


    if(password.trim() === "") {

        alert("Please enter your password.");

        return false;

    }


    return true;

}

</script>

</body>

</html>