<?php

require_once "db.php";

$sql = "SELECT * FROM employees ORDER BY id DESC";

$result = $conn->query($sql);

?>

<!DOCTYPE html>

<html>

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Employee List</title>

    <style>

        body {
            font-family: Arial, sans-serif;
            background: #f3f6fa;
            margin: 0;
            padding: 30px;
        }

        .container {
            max-width: 1300px;
            margin: auto;
        }

        .card {
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0,0,0,.08);
        }

        h1 {
            color: #1565c0;
        }

        .success {
            background: #d4edda;
            color: #155724;
            padding: 12px;
            margin-bottom: 20px;
            border-radius: 5px;
        }

        .add-button {
            display: inline-block;
            padding: 10px 18px;
            background: #1976d2;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        .table-container {
            overflow-x: auto;
            margin-top: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        th {
            background: #1976d2;
            color: white;
        }

        tr:hover {
            background: #f5f5f5;
        }

        .delete {
            color: #d32f2f;
            text-decoration: none;
        }

    </style>

</head>

<body>

<div class="container">

    <div class="card">

        <h1>Employee List</h1>


        <?php if (isset($_GET['success'])): ?>

            <div class="success">
                Employee saved successfully!
            </div>

        <?php endif; ?>


        <a
            href="index.php"
            class="add-button">

            + Add Employee

        </a>


        <div class="table-container">

            <table>

                <thead>

                    <tr>

                        <th>ID</th>
                        <th>Employee ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Department</th>
                        <th>Designation</th>
                        <th>Joining Date</th>
                        <th>Salary</th>
                        <th>Action</th>

                    </tr>

                </thead>


                <tbody>

                <?php while ($row = $result->fetch_assoc()): ?>

                    <tr>

                        <td>
                            <?= htmlspecialchars($row['id']) ?>
                        </td>

                        <td>
                            <?= htmlspecialchars($row['employee_id']) ?>
                        </td>

                        <td>
                            <?= htmlspecialchars($row['employee_name']) ?>
                        </td>

                        <td>
                            <?= htmlspecialchars($row['email']) ?>
                        </td>

                        <td>
                            <?= htmlspecialchars($row['phone']) ?>
                        </td>

                        <td>
                            <?= htmlspecialchars($row['department']) ?>
                        </td>

                        <td>
                            <?= htmlspecialchars($row['designation']) ?>
                        </td>

                        <td>
                            <?= htmlspecialchars($row['date_of_joining']) ?>
                        </td>

                        <td>
                            <?= htmlspecialchars($row['salary']) ?>
                        </td>

                        <td>

                            <a
                                class="delete"
                                href="delete_employee.php?id=<?= $row['id'] ?>"
                                onclick="return confirm('Are you sure you want to delete this employee?');">

                                Delete

                            </a>

                        </td>

                    </tr>

                <?php endwhile; ?>

                </tbody>

            </table>

        </div>

    </div>

</div>

</body>

</html>

<?php

$conn->close();

?>