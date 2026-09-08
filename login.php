<?php

session_start();

include "db.php";

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = trim($_POST["email"]);
    $password = $_POST["password"];
    $role = $_POST["role"];

    if ($role == "employee") {

        $stmt = $conn->prepare(
            "SELECT * FROM employees WHERE email = ?"
        );

        $stmt->bind_param("s", $email);
        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows == 1) {

            $employee = $result->fetch_assoc();

            if (password_verify($password, $employee["password"])) {

                session_regenerate_id(true);

                $_SESSION["employee_id"] = $employee["id"];
                $_SESSION["employee_name"] = $employee["name"];
                $_SESSION["role"] = "employee";

                header("Location: employee_dashboard.php");
                exit;

            } else {

                $message = "Invalid employee password.";

            }

        } else {

            $message = "Employee account not found.";

        }

    } elseif ($role == "admin") {

        $stmt = $conn->prepare(
            "SELECT * FROM admins WHERE username = ?"
        );

        $stmt->bind_param("s", $email);
        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows == 1) {

            $admin = $result->fetch_assoc();

            if (password_verify($password, $admin["password"])) {

                session_regenerate_id(true);

                $_SESSION["admin_id"] = $admin["id"];
                $_SESSION["admin_username"] = $admin["username"];
                $_SESSION["role"] = "admin";

                header("Location: admin_dashboard.php");
                exit;

            } else {

                $message = "Invalid admin password.";

            }

        } else {

            $message = "Admin account not found.";

        }
    }
}

?>

<!DOCTYPE html>
<html>

<head>

<title>Login</title>

<style>

* {
    box-sizing: border-box;
    font-family: Arial;
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

.login-box {
    width: 420px;
    max-width: 90%;
    background: white;
    margin: 70px auto;
    padding: 35px;
    border-radius: 10px;
    box-shadow: 0 5px 20px #ccc;
}

h2 {
    text-align: center;
    color: #123c69;
}

input,
select {
    width: 100%;
    padding: 12px;
    margin: 8px 0 18px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

button {
    width: 100%;
    padding: 13px;
    background: #123c69;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

button:hover {
    background: #1d70a2;
}

.error {
    color: red;
    text-align: center;
    margin-bottom: 15px;
}

</style>

</head>

<body>

<nav>

<h2>ABC Technologies</h2>

<div>
<a href="index.php">Home</a>
<a href="register.php">Register</a>
</div>

</nav>

<div class="login-box">

<h2>Login</h2>

<?php if ($message != "") { ?>

<div class="error">
<?php echo htmlspecialchars($message); ?>
</div>

<?php } ?>

<form method="POST">

<label>Login As</label>

<select name="role" required>

<option value="employee">
Employee
</option>

<option value="admin">
Admin
</option>

</select>

<label>Email / Username</label>

<input
type="text"
name="email"
placeholder="Enter email or username"
required
>

<label>Password</label>

<input
type="password"
name="password"
placeholder="Enter password"
required
>

<button type="submit">
Login
</button>

</form>

</div>

</body>

</html>
