<?php

require_once "db.php";

$employee_id = $_POST['employee_id'];
$employee_name = $_POST['employee_name'];
$date_of_birth = !empty($_POST['date_of_birth'])
    ? $_POST['date_of_birth']
    : null;

$gender = $_POST['gender'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$department = $_POST['department'];
$designation = $_POST['designation'];
$date_of_joining = $_POST['date_of_joining'];

$salary = !empty($_POST['salary'])
    ? $_POST['salary']
    : null;

$address = $_POST['address'];


$sql = "INSERT INTO employees
        (
            employee_id,
            employee_name,
            date_of_birth,
            gender,
            email,
            phone,
            department,
            designation,
            date_of_joining,
            salary,
            address
        )
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";


$stmt = $conn->prepare($sql);


if (!$stmt) {

    die("Prepare failed: " . $conn->error);

}


$stmt->bind_param(
    "sssssssssds",
    $employee_id,
    $employee_name,
    $date_of_birth,
    $gender,
    $email,
    $phone,
    $department,
    $designation,
    $date_of_joining,
    $salary,
    $address
);


if ($stmt->execute()) {

    header("Location: employees.php?success=1");
    exit;

} else {

    echo "Error saving employee: " . $stmt->error;

}


$stmt->close();
$conn->close();

?>