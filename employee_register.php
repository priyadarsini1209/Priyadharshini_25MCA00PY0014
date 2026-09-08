<?php

include "db.php";

$message = "";
$messageType = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Get form values
    $name = trim($_POST["name"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $phone = trim($_POST["phone"] ?? "");
    $department = trim($_POST["department"] ?? "");
    $position = trim($_POST["position"] ?? "");
    $password = $_POST["password"] ?? "";

    // Validation
    if (
        empty($name) ||
        empty($email) ||
        empty($phone) ||
        empty($department) ||
        empty($position) ||
        empty($password)
    ) {

        $message = "Please fill in all fields.";
        $messageType = "error";

    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

        $message = "Please enter a valid email address.";
        $messageType = "error";

    } elseif (strlen($password) < 6) {

        $message = "Password must contain at least 6 characters.";
        $messageType = "error";

    } else {

        // Check whether email already exists
        $check = $conn->prepare(
            "SELECT id FROM employees WHERE email = ?"
        );

        if (!$check) {
            die("Database error: " . $conn->error);
        }

        $check->bind_param("s", $email);
        $check->execute();

        $result = $check->get_result();

        if ($result->num_rows > 0) {

            $message = "This email is already registered.";
            $messageType = "error";

        } else {

            // Hash password
            $hashedPassword = password_hash(
                $password,
                PASSWORD_DEFAULT
            );

            // Insert employee
            $stmt = $conn->prepare(
                "INSERT INTO employees
                (name, email, phone, department, position, password)
                VALUES (?, ?, ?, ?, ?, ?)"
            );

            if (!$stmt) {
                die("Database error: " . $conn->error);
            }

            $stmt->bind_param(
                "ssssss",
                $name,
                $email,
                $phone,
                $department,
                $position,
                $hashedPassword
            );

            if ($stmt->execute()) {

                $message = "Registration successful! You can now login.";
                $messageType = "success";

            } else {

                $message = "Registration failed: " . $stmt->error;
                $messageType = "error";
            }

            $stmt->close();
        }

        $check->close();
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Employee Registration -PU Technologies</title>

<style>

* {
    box-sizing: border-box;
    font-family: Arial, sans-serif;
}

body {
    margin: 0;
    background: #eef3f8;
}

/* Navigation */

nav {
    background: #123c69;
    padding: 18px 8%;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

nav h2 {
    color: white;
    margin: 0;
}

nav a {
    color: white;
    text-decoration: none;
    margin-left: 20px;
    font-weight: bold;
}

nav a:hover {
    color: #66d9ff;
}

/* Registration container */

.container {
    width: 500px;
    max-width: 92%;
    margin: 40px auto;
    background: white;
    padding: 30px;
    border-radius: 12px;
    box-shadow: 0 5px 20px rgba(0,0,0,0.15);
}

.container h2 {
    text-align: center;
    color: #123c69;
    margin-bottom: 25px;
}

/* Form */

label {
    display: block;
    font-weight: bold;
    margin-top: 10px;
    color: #333;
}

input,
select {
    width: 100%;
    padding: 12px;
    margin-top: 7px;
    margin-bottom: 12px;
    border: 1px solid #ccc;
    border-radius: 6px;
    font-size: 15px;
}

input:focus,
select:focus {
    outline: none;
    border-color: #123c69;
    box-shadow: 0 0 4px rgba(18,60,105,0.3);
}

/* Button */

button {
    width: 100%;
    padding: 13px;
    margin-top: 10px;
    background: #123c69;
    color: white;
    border: none;
    border-radius: 6px;
    font-size: 16px;
    font-weight: bold;
    cursor: pointer;
}

button:hover {
    background: #1d70a2;
}

/* Messages */

.message {
    padding: 12px;
    border-radius: 6px;
    text-align: center;
    margin-bottom: 20px;
    font-weight: bold;
}

.success {
    background: #d4edda;
    color: #155724;
}

.error {
    background: #f8d7da;
    color: #721c24;
}

/* Mobile */

@media (max-width: 600px) {

    nav {
        padding: 15px;
        flex-direction: column;
        gap: 12px;
    }

    nav a {
        margin: 0 8px;
    }

    .container {
        margin-top: 25px;
        padding: 22px;
    }

}

</style>

</head>

<body>

<nav>

    <h2>PU Technologies</h2>

    <div>
        <a href="index.php">Home</a>
        <a href="login.php">Login</a>
    </div>

</nav>

<div class="container">

    <h2>Employee Registration</h2>

    <?php if ($message !== ""): ?>

        <div class="message <?php echo $messageType; ?>">
            <?php echo htmlspecialchars($message); ?>
        </div>

    <?php endif; ?>

    <form method="POST" onsubmit="return validateForm()">

        <label for="name">
            Full Name
        </label>

        <input
            type="text"
            name="name"
            id="name"
            placeholder="Enter your full name"
            required
        >

        <label for="email">
            Email
        </label>

        <input
            type="email"
            name="email"
            id="email"
            placeholder="Enter your email"
            required
        >

        <label for="phone">
            Phone
        </label>

        <input
            type="tel"
            name="phone"
            id="phone"
            placeholder="Enter your phone number"
            required
        >

        <label for="department">
            Department
        </label>

        <select
            name="department"
            id="department"
            required
        >

            <option value="">
                Select Department
            </option>

            <option value="IT">
                IT
            </option>

            <option value="HR">
                HR
            </option>

            <option value="Finance">
                Finance
            </option>

            <option value="Marketing">
                Marketing
            </option>

            <option value="Sales">
                Sales
            </option>

        </select>

        <label for="position">
            Position
        </label>

        <input
            type="text"
            name="position"
            id="position"
            placeholder="Enter your position"
            required
        >

        <label for="password">
            Password
        </label>

        <input
            type="password"
            name="password"
            id="password"
            placeholder="Create password"
            required
        >

        <button type="submit">
            Register Employee
        </button>

    </form>

</div>

<script>

function validateForm() {

    const name =
        document.getElementById("name").value.trim();

    const email =
        document.getElementById("email").value.trim();

    const phone =
        document.getElementById("phone").value.trim();

    const password =
        document.getElementById("password").value;

    if (name.length < 3) {

        alert("Name must contain at least 3 characters.");

        return false;
    }

    if (phone.length < 7) {

        alert("Please enter a valid phone number.");

        return false;
    }

    if (password.length < 6) {

        alert("Password must contain at least 6 characters.");

        return false;
    }

    return true;
}

</script>

</body>

</html>
