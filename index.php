<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Employee Management</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f3f6fa;
        }

        .container {
            width: 90%;
            max-width: 1000px;
            margin: 40px auto;
        }

        .card {
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        }

        h1 {
            margin-top: 0;
            margin-bottom: 30px;
            color: #1565c0;
            text-align: center;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        label {
            font-weight: bold;
            margin-bottom: 7px;
            color: #333;
        }

        input,
        select {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 15px;
            background: white;
        }

        input:focus,
        select:focus {
            border-color: #1976d2;
            outline: none;
            box-shadow: 0 0 0 2px rgba(25, 118, 210, 0.1);
        }

        .buttons {
            margin-top: 30px;
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        button,
        .view-button {
            padding: 12px 25px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 15px;
            text-decoration: none;
            display: inline-block;
        }

        .save {
            background: #1976d2;
            color: white;
        }

        .save:hover {
            background: #125ca8;
        }

        .reset {
            background: #ddd;
            color: #333;
        }

        .reset:hover {
            background: #c7c7c7;
        }

        .view-button {
            background: #43a047;
            color: white;
        }

        .view-button:hover {
            background: #348638;
        }

        @media (max-width: 650px) {

            .form-grid {
                grid-template-columns: 1fr;
            }

            .container {
                width: 95%;
                margin: 20px auto;
            }

            .card {
                padding: 20px;
            }

            .buttons {
                flex-direction: column;
            }

            button,
            .view-button {
                width: 100%;
                text-align: center;
            }
        }
    </style>
</head>

<body>

<div class="container">

    <div class="card">

        <h1>Employee Details</h1>

        <form id="employeeForm" action="save_employee.php" method="POST">

            <div class="form-grid">

                <!-- Employee ID -->
                <div class="form-group">
                    <label for="employee_id">Employee ID *</label>

                    <input
                        type="text"
                        id="employee_id"
                        name="employee_id"
                        placeholder="EMP001"
                        required>
                </div>

                <!-- Employee Name -->
                <div class="form-group">
                    <label for="employee_name">Employee Name *</label>

                    <input
                        type="text"
                        id="employee_name"
                        name="employee_name"
                        placeholder="Enter employee name"
                        required>
                </div>

                <!-- Date of Birth -->
                <div class="form-group">
                    <label for="date_of_birth">Date of Birth</label>

                    <input
                        type="date"
                        id="date_of_birth"
                        name="date_of_birth">
                </div>

                <!-- Gender -->
                <div class="form-group">
                    <label for="gender">Gender</label>

                    <select
                        id="gender"
                        name="gender">

                        <option value="">Select Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>

                    </select>
                </div>

                <!-- Email -->
                <div class="form-group">
                    <label for="email">Email *</label>

                    <input
                        type="email"
                        id="email"
                        name="email"
                        placeholder="employee@example.com"
                        required>
                </div>

                <!-- Phone -->
                <div class="form-group">
                    <label for="phone">Phone</label>

                    <input
                        type="text"
                        id="phone"
                        name="phone"
                        placeholder="Phone number">
                </div>

                <!-- Department -->
                <div class="form-group">
                    <label for="department">Department *</label>

                    <select
                        id="department"
                        name="department"
                        required>

                        <option value="">Select Department</option>
                        <option value="HR">HR</option>
                        <option value="IT">IT</option>
                        <option value="Finance">Finance</option>
                        <option value="Sales">Sales</option>
                        <option value="Marketing">Marketing</option>
                        <option value="Operations">Operations</option>

                    </select>
                </div>

                <!-- Designation -->
                <div class="form-group">
                    <label for="designation">Designation</label>

                    <input
                        type="text"
                        id="designation"
                        name="designation"
                        placeholder="Software Engineer">
                </div>

                <!-- Date of Joining -->
                <div class="form-group">
                    <label for="date_of_joining">Date of Joining *</label>

                    <input
                        type="date"
                        id="date_of_joining"
                        name="date_of_joining"
                        required>
                </div>

                <!-- Salary -->
                <div class="form-group">
                    <label for="salary">Salary</label>

                    <input
                        type="number"
                        id="salary"
                        name="salary"
                        min="0"
                        step="0.01"
                        placeholder="50000">
                </div>

            </div>

            <!-- Buttons -->
            <div class="buttons">

            

                <!-- SAVE BUTTON -->
                <button
                    type="submit"
                    class="save">
                    Save Employee
                </button>

                <!-- VIEW EMPLOYEES -->
                <a
                    href="employees.php"
                    class="view-button">
                    View Employees
                </a>

            </div>

        </form>

    </div>

</div>

<!-- Reset JavaScript -->
<script>
    function resetForm() {
        document.getElementById("employeeForm").reset();
    }
</script>

</body>
</html>