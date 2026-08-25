<?php
session_start();

$isLoggedIn = isset($_SESSION['user']);
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>
        <?php
        echo $isLoggedIn
            ? "Student Dashboard - CSE Department"
            : "CSE Department";
        ?>
    </title>


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


        /* ================= HEADER ================= */

        header {
            background: #123c69;
            color: white;

            padding: 18px 7%;

            display: flex;
            justify-content: space-between;
            align-items: center;
        }


        .logo {
            font-size: 22px;
            font-weight: bold;
        }


        nav a {
            color: white;
            text-decoration: none;

            margin-left: 20px;

            font-size: 16px;
        }


        nav a:hover {
            color: #ffd166;
        }


        /* ================= GUEST HOME ================= */

        .guest-hero {

            min-height: 450px;

            background:
            linear-gradient(
                rgba(18,60,105,0.88),
                rgba(18,60,105,0.88)
            ),
            url("https://images.unsplash.com/photo-1516321318423-f06f85e504b3")
            center/cover;

            display: flex;

            justify-content: center;
            align-items: center;

            text-align: center;

            color: white;

            padding: 30px;
        }


        .guest-hero h1 {
            font-size: 45px;
            margin-bottom: 15px;
        }


        .guest-hero p {
            font-size: 20px;
            margin-bottom: 30px;
        }


        .btn {

            display: inline-block;

            background: #ffd166;

            color: #222;

            padding: 13px 25px;

            text-decoration: none;

            border-radius: 6px;

            font-weight: bold;

            margin: 5px;
        }


        .btn:hover {
            background: #ffb703;
        }


        .btn-blue {

            background: #123c69;

            color: white;

            border: 2px solid white;
        }


        .btn-blue:hover {
            background: white;
            color: #123c69;
        }


        /* ================= SECTION ================= */

        .section {

            padding: 50px 8%;

            text-align: center;
        }


        .section h2 {

            color: #123c69;

            margin-bottom: 30px;
        }


        .cards {

            display: flex;

            justify-content: center;

            gap: 25px;

            flex-wrap: wrap;
        }


        .card {

            background: white;

            width: 280px;

            padding: 30px;

            border-radius: 10px;

            box-shadow:
            0 5px 15px rgba(0,0,0,0.1);
        }


        .card h3 {

            color: #123c69;

            margin-bottom: 15px;
        }


        .card p {

            line-height: 1.6;
        }


        /* ================= STUDENT DASHBOARD ================= */

        .dashboard {

            padding: 50px 8%;
        }


        .welcome-box {

            background:
            linear-gradient(
                135deg,
                #123c69,
                #1e6091
            );

            color: white;

            padding: 35px;

            border-radius: 12px;

            margin-bottom: 35px;

            box-shadow:
            0 5px 15px rgba(0,0,0,0.15);
        }


        .welcome-box h1 {

            font-size: 32px;

            margin-bottom: 10px;
        }


        .welcome-box p {

            font-size: 17px;

            line-height: 1.6;
        }


        .dashboard-grid {

            display: grid;

            grid-template-columns:
            repeat(auto-fit, minmax(220px, 1fr));

            gap: 25px;
        }


        .dashboard-card {

            background: white;

            padding: 30px;

            border-radius: 10px;

            box-shadow:
            0 5px 15px rgba(0,0,0,0.1);

            transition: 0.3s;

            text-align: center;
        }


        .dashboard-card:hover {

            transform: translateY(-5px);

            box-shadow:
            0 8px 20px rgba(0,0,0,0.15);
        }


        .dashboard-card .icon {

            font-size: 40px;

            margin-bottom: 15px;
        }


        .dashboard-card h3 {

            color: #123c69;

            margin-bottom: 10px;
        }


        .dashboard-card p {

            color: #555;

            line-height: 1.5;
        }


        .student-info {

            margin-top: 35px;

            background: white;

            padding: 30px;

            border-radius: 10px;

            box-shadow:
            0 5px 15px rgba(0,0,0,0.1);
        }


        .student-info h2 {

            color: #123c69;

            margin-bottom: 20px;
        }


        .student-info p {

            margin: 10px 0;

            font-size: 16px;
        }


        /* ================= FOOTER ================= */

        footer {

            background: #123c69;

            color: white;

            text-align: center;

            padding: 20px;

            margin-top: 50px;
        }


        /* ================= MOBILE ================= */

        @media(max-width: 700px) {

            header {

                flex-direction: column;

                gap: 15px;
            }


            nav {

                text-align: center;
            }


            nav a {

                margin: 5px;

                display: inline-block;
            }


            .guest-hero h1 {

                font-size: 32px;
            }


            .guest-hero p {

                font-size: 17px;
            }

        }

    </style>

</head>


<body>


<!-- ================= HEADER ================= -->

<header>

    <div class="logo">
        CSE Department
    </div>


    <nav>

        <a href="index.php">
            Home
        </a>


        <a href="about.php">
            About Us
        </a>


        <?php if ($isLoggedIn) { ?>

            <a href="logout.php">
                Logout
            </a>

        <?php } else { ?>

            <a href="login.php">
                Login
            </a>

            <a href="register.php">
                Register
            </a>

        <?php } ?>

    </nav>

</header>



<!-- ================================================= -->
<!--              BEFORE LOGIN                         -->
<!-- ================================================= -->

<?php if (!$isLoggedIn) { ?>


    <section class="guest-hero">

        <div>

            <h1>
                Computer Science & Engineering
            </h1>


            <p>
                Learn • Innovate • Build the Future
            </p>


            <a href="login.php" class="btn">
                Student Login
            </a>


            <a href="register.php"
               class="btn btn-blue">

                Register Now

            </a>

        </div>

    </section>



    <section class="section">

        <h2>
            Welcome to Our Department
        </h2>


        <div class="cards">


            <div class="card">

                <h3>
                    Quality Education
                </h3>

                <p>
                    Our department provides quality
                    education with strong theoretical
                    knowledge and practical experience.
                </p>

            </div>


            <div class="card">

                <h3>
                    Modern Technology
                </h3>

                <p>
                    Students learn programming,
                    artificial intelligence,
                    databases, web development and
                    modern technologies.
                </p>

            </div>


            <div class="card">

                <h3>
                    Career Development
                </h3>

                <p>
                    We prepare students with technical,
                    communication and problem-solving
                    skills required by today's industry.
                </p>

            </div>


        </div>

    </section>



    <section class="section">

        <h2>
            Our Programs
        </h2>


        <div class="cards">


            <div class="card">

                <h3>
                    Programming
                </h3>

                <p>
                    C, C++, Java, Python and
                    Web Development.
                </p>

            </div>


            <div class="card">

                <h3>
                    Artificial Intelligence
                </h3>

                <p>
                    Artificial Intelligence,
                    Machine Learning and intelligent
                    systems.
                </p>

            </div>


            <div class="card">

                <h3>
                    Data Science
                </h3>

                <p>
                    Data analysis, databases,
                    algorithms and modern
                    data technologies.
                </p>

            </div>


        </div>

    </section>



<!-- ================================================= -->
<!--              AFTER LOGIN                          -->
<!-- ================================================= -->

<?php } else { ?>


    <main class="dashboard">


        <div class="welcome-box">

            <h1>
                Welcome,
                <?php
                echo htmlspecialchars($_SESSION['user']);
                ?>! 👋
            </h1>


            <p>
                You have successfully logged in to
                the Computer Science & Engineering
                Department portal.
            </p>


            <p>
                This is your student dashboard.
                You can access your department
                information, courses and upcoming
                activities from here.
            </p>

        </div>



        <h2 style="
            color:#123c69;
            margin-bottom:25px;
        ">

            Student Dashboard

        </h2>



        <div class="dashboard-grid">


            <div class="dashboard-card">

                <div class="icon">
                    📚
                </div>

                <h3>
                    My Courses
                </h3>

                <p>
                    View your subjects and
                    course information.
                </p>

            </div>



            <div class="dashboard-card">

                <div class="icon">
                    📅
                </div>

                <h3>
                    Department Events
                </h3>

                <p>
                    Check upcoming seminars,
                    workshops and department events.
                </p>

            </div>



            <div class="dashboard-card">

                <div class="icon">
                    📝
                </div>

                <h3>
                    Assignments
                </h3>

                <p>
                    Keep track of your academic
                    assignments and activities.
                </p>

            </div>



            <div class="dashboard-card">

                <div class="icon">
                    💻
                </div>

                <h3>
                    Laboratories
                </h3>

                <p>
                    Access information about
                    programming and computer labs.
                </p>

            </div>



            <div class="dashboard-card">

                <div class="icon">
                    📢
                </div>

                <h3>
                    Announcements
                </h3>

                <p>
                    View important department
                    announcements and notices.
                </p>

            </div>



            <div class="dashboard-card">

                <div class="icon">
                    🎓
                </div>

                <h3>
                    Academic Information
                </h3>

                <p>
                    View academic information
                    and department resources.
                </p>

            </div>


        </div>



        <div class="student-info">

            <h2>
                My Account
            </h2>


            <p>
                <strong>
                    Student Name:
                </strong>

                <?php
                echo htmlspecialchars($_SESSION['user']);
                ?>

            </p>


            <p>
                <strong>
                    Account Status:
                </strong>

                Active
            </p>


            <p>
                <strong>
                    Department:
                </strong>

                Computer Science & Engineering
            </p>


            <a href="logout.php"
               class="btn"
               style="
               background:#c1121f;
               color:white;
               margin-top:15px;
               ">

                Logout

            </a>

        </div>


    </main>


<?php } ?>



<!-- ================= FOOTER ================= -->

<footer>

    <p>
        © 2026 Computer Science & Engineering Department
    </p>

</footer>



<script>

document.addEventListener(
    "DOMContentLoaded",
    function() {

        <?php if ($isLoggedIn) { ?>

            console.log(
                "Student dashboard loaded for <?php
                echo addslashes($_SESSION['user']);
                ?>"
            );

        <?php } else { ?>

            console.log(
                "Public department homepage loaded"
            );

        <?php } ?>

    }
);


</script>


</body>

</html>