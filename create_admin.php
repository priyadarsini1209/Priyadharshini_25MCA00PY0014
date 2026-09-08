<?php

include "db.php";

$username = "admin";
$password = "admin123";

$hashed_password = password_hash($password, PASSWORD_DEFAULT);

$stmt = $conn->prepare(
    "UPDATE admins SET password = ? WHERE username = ?"
);

$stmt->bind_param("ss", $hashed_password, $username);

if ($stmt->execute()) {
    echo "Admin password updated successfully.";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();

?>
