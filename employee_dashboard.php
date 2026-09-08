<?php

session_start();

if (
    !isset($_SESSION["role"]) ||
    $_SESSION["role"] !== "employee"
) {
    header("Location: login.php");
    exit;
}

include "db.php";

$id = $_SESSION["employee_id"];

$stmt = $conn->prepare(
    "SELECT id,name,email,phone,department,position,created_at
     FROM employees
     WHERE id = ?"
);

$stmt->bind_param("i", $id);
$stmt->execute();

$result = $stmt->get_result();

$employee = $result->fetch_assoc();

?>

<!DOCTYPE html>
<html>

<head>

<title>Employee Dashboard</title>

<style>

* {
    box-sizing: border-box;
    font-family: Arial;
}

body {
    margin: 0;
    background: #f2f6fa;
}

nav {
    background: #123c69;
    color: white;
    padding: 18px 8%;
    display: flex;
    justify-content: space-between;
}

nav a {
    color: white;
    text-decoration: none;
}

.container {
    width: 800px;
    max-width: 90%;
    margin: 50px auto;
}

.card {
    background: white;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 5px 20px #ddd;
}

h1 {
    color: #123c69;
}

.info {
    display: grid;
    grid-template-columns: 150px 1fr;
    gap: 15px;
    margin-top: 25px;
}

.label {
    font-weight: bold;
    color: #555;
}

</style>

</head>

<body>

<nav>

<strong>ABC Technologies</strong>

<a href="logout.php">
Logout
</a>

</nav>

<div class="container">

<div class="card">

<h1>
Welcome, <?php echo htmlspecialchars($employee["name"]); ?>
</h1>

<p>
Employee Dashboard
</p>

<div class="info">

<div class="label">Employee ID</div>
<div><?php echo $employee["id"]; ?></div>

<div class="label">Name</div>
<div><?php echo htmlspecialchars($employee["name"]); ?></div>

<div class="label">Email</div>
<div><?php echo htmlspecialchars($employee["email"]); ?></div>

<div class="label">Phone</div>
<div><?php echo htmlspecialchars($employee["phone"]); ?></div>

<div class="label">Department</div>
<div><?php echo htmlspecialchars($employee["department"]); ?></div>

<div class="label">Position</div>
<div><?php echo htmlspecialchars($employee["position"]); ?></div>

<div class="label">Joined</div>
<div><?php echo $employee["created_at"]; ?></div>

</div>

</div>

</div>

</body>

</html>
