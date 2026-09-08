<?php

session_start();

if (
    !isset($_SESSION["role"]) ||
    $_SESSION["role"] !== "admin"
) {
    header("Location: login.php");
    exit;
}

include "db.php";

$result = $conn->query(
    "SELECT id,name,email,phone,department,position,created_at
     FROM employees
     ORDER BY id DESC"
);

?>

<!DOCTYPE html>
<html>

<head>

<title>Admin Dashboard</title>

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
    padding: 18px 5%;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

nav a {
    color: white;
    text-decoration: none;
}

.container {
    width: 95%;
    margin: 40px auto;
}

h1 {
    color: #123c69;
}

.table-container {
    background: white;
    padding: 20px;
    border-radius: 10px;
    overflow-x: auto;
    box-shadow: 0 5px 20px #ddd;
}

table {
    width: 100%;
    border-collapse: collapse;
    min-width: 900px;
}

th {
    background: #123c69;
    color: white;
}

th,
td {
    padding: 13px;
    border-bottom: 1px solid #ddd;
    text-align: left;
}

tr:hover {
    background: #f5f5f5;
}

.badge {
    background: #00a8e8;
    color: white;
    padding: 5px 10px;
    border-radius: 20px;
}

</style>

</head>

<body>

<nav>

<strong>ABC Technologies - ADMIN</strong>

<a href="logout.php">
Logout
</a>

</nav>

<div class="container">

<h1>Employee Management</h1>

<p>
Welcome, <?php echo htmlspecialchars($_SESSION["admin_username"]); ?>
</p>

<div class="table-container">

<table>

<thead>

<tr>

<th>ID</th>
<th>Name</th>
<th>Email</th>
<th>Phone</th>
<th>Department</th>
<th>Position</th>
<th>Joined</th>

</tr>

</thead>

<tbody>

<?php

if ($result->num_rows > 0) {

    while ($employee = $result->fetch_assoc()) {

?>

<tr>

<td>
<?php echo $employee["id"]; ?>
</td>

<td>
<?php echo htmlspecialchars($employee["name"]); ?>
</td>

<td>
<?php echo htmlspecialchars($employee["email"]); ?>
</td>

<td>
<?php echo htmlspecialchars($employee["phone"]); ?>
</td>

<td>
<span class="badge">
<?php echo htmlspecialchars($employee["department"]); ?>
</span>
</td>

<td>
<?php echo htmlspecialchars($employee["position"]); ?>
</td>

<td>
<?php echo $employee["created_at"]; ?>
</td>

</tr>

<?php

    }

} else {

?>

<tr>

<td colspan="7">
No employees registered yet.
</td>

</tr>

<?php

}

?>

</tbody>

</table>

</div>

</div>

</body>

</html>
