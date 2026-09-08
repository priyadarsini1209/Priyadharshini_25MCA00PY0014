<?php

include "db.php";

if (!isset($_GET["id"])) {
    header("Location: index.php");
    exit;
}

$id = intval($_GET["id"]);

$stmt = $conn->prepare(
    "SELECT * FROM contacts WHERE id = ?"
);

$stmt->bind_param("i", $id);
$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows != 1) {
    header("Location: index.php");
    exit;
}

$contact = $result->fetch_assoc();

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $phone = trim($_POST["phone"]);
    $address = trim($_POST["address"]);

    if ($name == "" || $email == "" || $phone == "") {

        $message = "Please fill all required fields.";

    } else {

        $update = $conn->prepare(
            "UPDATE contacts
             SET name = ?, email = ?, phone = ?, address = ?
             WHERE id = ?"
        );

        $update->bind_param(
            "ssssi",
            $name,
            $email,
            $phone,
            $address,
            $id
        );

        if ($update->execute()) {

            header("Location: index.php");
            exit;

        } else {

            $message = "Error updating contact.";

        }

        $update->close();
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Edit Contact</title>

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
}

.error {
    color: red;
    background: #ffe5e5;
    padding: 10px;
    text-align: center;
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

<div class="form-box">

<h1>Edit Contact</h1>

<?php if ($message != ""): ?>

<div class="error">
<?php echo htmlspecialchars($message); ?>
</div>

<?php endif; ?>

<form method="POST">

<label>Name *</label>

<input
type="text"
name="name"
value="<?php echo htmlspecialchars($contact['name']); ?>"
required
>

<label>Email *</label>

<input
type="email"
name="email"
value="<?php echo htmlspecialchars($contact['email']); ?>"
required
>

<label>Phone *</label>

<input
type="text"
name="phone"
value="<?php echo htmlspecialchars($contact['phone']); ?>"
required
>

<label>Address</label>

<textarea
name="address"
><?php echo htmlspecialchars($contact['address']); ?></textarea>

<button type="submit">
Update Contact
</button>

</form>

</div>

</body>

</html>