<?php

include "db.php";

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $phone = trim($_POST["phone"]);
    $address = trim($_POST["address"]);

    if ($name == "" || $email == "" || $phone == "") {

        $message = "Please fill all required fields.";

    } else {

        $stmt = $conn->prepare(
            "INSERT INTO contacts (name, email, phone, address)
             VALUES (?, ?, ?, ?)"
        );

        $stmt->bind_param(
            "ssss",
            $name,
            $email,
            $phone,
            $address
        );

        if ($stmt->execute()) {

            header("Location: index.php");
            exit;

        } else {

            $message = "Error adding contact.";

        }

        $stmt->close();
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Add Contact</title>

<style>

* {
    box-sizing: border-box;
    font-family: Arial, sans-serif;
}

body {
    margin: 0;
    background: #eef3f8;
}

nav {
    background: #123c69;
    padding: 18px 8%;
    display: flex;
    justify-content: space-between;
}

nav h2 {
    color: white;
    margin: 0;
}

nav a {
    color: white;
    text-decoration: none;
    margin-left: 20px;
}

.form-box {
    width: 500px;
    max-width: 90%;
    background: white;
    margin: 50px auto;
    padding: 35px;
    border-radius: 10px;
    box-shadow: 0 5px 20px #ccc;
}

h1 {
    text-align: center;
    color: #123c69;
    margin-bottom: 25px;
}

label {
    display: block;
    font-weight: bold;
    margin-top: 12px;
}

input,
textarea {
    width: 100%;
    padding: 12px;
    margin-top: 7px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

textarea {
    height: 100px;
    resize: vertical;
}

button {
    width: 100%;
    padding: 13px;
    margin-top: 20px;
    background: #123c69;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
}

button:hover {
    background: #1d70a2;
}

.error {
    background: #ffe5e5;
    color: red;
    padding: 10px;
    text-align: center;
    border-radius: 5px;
}

</style>

</head>

<body>

<nav>

<h2>Contact Manager</h2>

<div>
<a href="index.php">Home</a>
</div>

</nav>

<div class="form-box">

<h1>Add Contact</h1>

<?php if ($message != ""): ?>

<div class="error">
<?php echo htmlspecialchars($message); ?>
</div>

<?php endif; ?>

<form method="POST" onsubmit="return validateForm();">

<label>Name *</label>

<input
type="text"
name="name"
id="name"
placeholder="Enter full name"
>

<label>Email *</label>

<input
type="email"
name="email"
id="email"
placeholder="Enter email"
>

<label>Phone *</label>

<input
type="text"
name="phone"
id="phone"
placeholder="Enter phone number"
>

<label>Address</label>

<textarea
name="address"
placeholder="Enter address"
></textarea>

<button type="submit">
Add Contact
</button>

</form>

</div>

<script>

function validateForm() {

    let name = document.getElementById("name").value.trim();
    let email = document.getElementById("email").value.trim();
    let phone = document.getElementById("phone").value.trim();

    if (name === "") {
        alert("Please enter the contact name.");
        return false;
    }

    if (email === "") {
        alert("Please enter the email.");
        return false;
    }

    if (phone === "") {
        alert("Please enter the phone number.");
        return false;
    }

    return true;
}

</script>

</body>

</html>
