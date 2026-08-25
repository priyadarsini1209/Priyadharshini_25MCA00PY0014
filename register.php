<?php

include "db.php";

$message = "";

if(isset($_POST['register'])) {

    $fullname = trim($_POST['fullname']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];


    if(empty($fullname) || empty($email) || empty($password)) {

        $message = "Please fill all fields.";

    }

    elseif($password != $confirm_password) {

        $message = "Passwords do not match.";

    }

    elseif(strlen($password) < 6) {

        $message = "Password must contain at least 6 characters.";

    }

    else {

        $check = $conn->prepare(
            "SELECT id FROM users WHERE email = ?"
        );

        $check->bind_param("s", $email);

        $check->execute();

        $result = $check->get_result();


        if($result->num_rows > 0) {

            $message = "Email already registered.";

        }

        else {

            $hashed_password = password_hash(
                $password,
                PASSWORD_DEFAULT
            );


            $stmt = $conn->prepare(
                "INSERT INTO users (fullname,email,password)
                 VALUES (?,?,?)"
            );

            $stmt->bind_param(
                "sss",
                $fullname,
                $email,
                $hashed_password
            );


            if($stmt->execute()) {

                $message =
                "Registration successful! You can now login.";

            }

            else {

                $message = "Registration failed.";

            }

        }

    }

}

?>


<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>Registration</title>

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

.form-container {
    width: 400px;
    max-width: 90%;
    margin: 60px auto;
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

.message {
    text-align: center;
    margin-bottom: 15px;
    color: #d00000;
}

.login-link {
    text-align: center;
    margin-top: 20px;
}

.login-link a {
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

<a href="login.php">Login</a>

</div>

</header>


<div class="form-container">

<h2>Create Account</h2>


<?php if($message != "") { ?>

<div class="message">

<?php echo htmlspecialchars($message); ?>

</div>

<?php } ?>


<form method="POST"
      onsubmit="return validateForm()">


<label>Full Name</label>

<input
type="text"
name="fullname"
id="fullname"
placeholder="Enter your full name"
required>


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
placeholder="Minimum 6 characters"
required>


<label>Confirm Password</label>

<input
type="password"
name="confirm_password"
id="confirm_password"
placeholder="Confirm your password"
required>


<button type="submit" name="register">
Register
</button>

</form>


<div class="login-link">

Already have an account?

<a href="login.php">Login here</a>

</div>

</div>


<script>

function validateForm() {

    let password =
        document.getElementById("password").value;

    let confirmPassword =
        document.getElementById("confirm_password").value;


    if(password.length < 6) {

        alert("Password must contain at least 6 characters.");

        return false;

    }


    if(password !== confirmPassword) {

        alert("Passwords do not match.");

        return false;

    }


    return true;

}

</script>

</body>

</html>