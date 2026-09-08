<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>PU Technologies</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
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
        }

        nav a {
            color: white;
            text-decoration: none;
            margin-left: 25px;
            font-weight: bold;
        }

        nav a:hover {
            color: #66d9ff;
        }

        .hero {
            min-height: 80vh;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            background: linear-gradient(135deg, #123c69, #1d70a2);
            color: white;
            padding: 40px;
        }

        .hero-content {
            max-width: 800px;
        }

        .hero h1 {
            font-size: 50px;
            margin-bottom: 20px;
        }

        .hero p {
            font-size: 20px;
            margin-bottom: 30px;
            line-height: 1.6;
        }

        .btn {
            display: inline-block;
            padding: 14px 25px;
            margin: 8px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: bold;
        }

        .register {
            background: #fff;
            color: #123c69;
        }

        .login {
            background: #00a8e8;
            color: white;
        }

        footer {
            text-align: center;
            padding: 20px;
            background: #102a43;
            color: white;
        }
    </style>
</head>

<body>

<nav>
    <h2>PU Technologies</h2>

    <div>
        <a href="index.php">Home</a>
        <a href="register.php">Register</a>
        <a href="login.php">Login</a>
    </div>
</nav>

<section class="hero">

    <div class="hero-content">

        <h1>Welcome to PU Technologies</h1>

        <p>
            Employee Management System
        </p>

        <p>
            Manage employee information securely and efficiently.
        </p>

        <a href="employee_register.php" class="btn register">
            Employee Registration
        </a>

        <a href="login.php" class="btn login">
            Login
        </a>

    </div>

</section>

<footer>
    © 2026 PU Technologies. All Rights Reserved.
</footer>

</body>
</html>
