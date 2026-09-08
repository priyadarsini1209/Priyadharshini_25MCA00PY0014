<?php

include "db.php";

$result = $conn->query("SELECT * FROM contacts ORDER BY id DESC");

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Contact Management</title>

<style>

* {
    box-sizing: border-box;
    font-family: Arial, sans-serif;
}

body {
    margin: 0;
    background: #f4f7fb;
    color: #222;
}

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

.container {
    width: 90%;
    max-width: 1100px;
    margin: 40px auto;
}

.header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 25px;
}

.header h1 {
    color: #123c69;
}

.add-btn {
    background: #123c69;
    color: white;
    padding: 12px 20px;
    text-decoration: none;
    border-radius: 5px;
}

.add-btn:hover {
    background: #1d70a2;
}

table {
    width: 100%;
    border-collapse: collapse;
    background: white;
    box-shadow: 0 5px 15px #ddd;
}

th {
    background: #123c69;
    color: white;
    padding: 14px;
}

td {
    padding: 13px;
    border-bottom: 1px solid #ddd;
    text-align: center;
}

tr:hover {
    background: #f1f7fc;
}

.edit {
    background: #f0ad4e;
    color: white;
    padding: 7px 12px;
    text-decoration: none;
    border-radius: 4px;
}

.delete {
    background: #d9534f;
    color: white;
    padding: 7px 12px;
    text-decoration: none;
    border-radius: 4px;
}

.no-data {
    text-align: center;
    padding: 30px;
    background: white;
}

@media (max-width: 700px) {

    table {
        font-size: 13px;
    }

    th,
    td {
        padding: 8px;
    }

    .header {
        flex-direction: column;
        gap: 15px;
    }

}

</style>

</head>

<body>

<nav>

<h2>Contact Manager</h2>

<div>
<a href="index.php">Home</a>
<a href="add.php">Add Contact</a>
</div>

</nav>

<div class="container">

<div class="header">

<h1>Contact List</h1>

<a href="add.php" class="add-btn">
+ Add Contact
</a>

</div>

<?php if ($result->num_rows > 0): ?>

<table>

<thead>

<tr>
<th>ID</th>
<th>Name</th>
<th>Email</th>
<th>Phone</th>
<th>Address</th>
<th>Actions</th>
</tr>

</thead>

<tbody>

<?php while ($row = $result->fetch_assoc()): ?>

<tr>

<td>
<?php echo $row["id"]; ?>
</td>

<td>
<?php echo htmlspecialchars($row["name"]); ?>
</td>

<td>
<?php echo htmlspecialchars($row["email"]); ?>
</td>

<td>
<?php echo htmlspecialchars($row["phone"]); ?>
</td>

<td>
<?php echo htmlspecialchars($row["address"]); ?>
</td>

<td>

<a
href="edit.php?id=<?php echo $row['id']; ?>"
class="edit"
>
Edit
</a>

<a
href="delete.php?id=<?php echo $row['id']; ?>"
class="delete"
onclick="return confirmDelete();"
>
Delete
</a>

</td>

</tr>

<?php endwhile; ?>

</tbody>

</table>

<?php else: ?>

<div class="no-data">
    <h3>No contacts found.</h3>
    <p>Click "Add Contact" to create your first contact.</p>
</div>

<?php endif; ?>

</div>

<script>

function confirmDelete() {

    return confirm(
        "Are you sure you want to delete this contact?"
    );

}

</script>

</body>

</html>
