<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>About Us</title>

<style>

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial;
}

body {
    background: #f4f7fb;
}

header {
    background: #123c69;
    color: white;
    padding: 18px 8%;
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
}

nav a:hover {
    color: #ffd166;
}

.container {
    max-width: 900px;
    margin: 50px auto;
    background: white;
    padding: 40px;
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0,0,0,.1);
}

h1 {
    color: #123c69;
    margin-bottom: 20px;
}

h2 {
    color: #123c69;
    margin-top: 25px;
    margin-bottom: 10px;
}

p {
    line-height: 1.7;
}

ul {
    margin: 15px 0 15px 25px;
    line-height: 2;
}

footer {
    background: #123c69;
    color: white;
    text-align: center;
    padding: 20px;
    margin-top: 80px;
}

</style>

</head>

<body>

<header>

<div class="logo">
CSE Department
</div>

<nav>

<a href="index.php">Home</a>

<a href="about.php">About Us</a>

<a href="login.php">Login</a>

<a href="register.php">Register</a>

</nav>

</header>


<div class="container">

<h1>About Our Department</h1>

<p>
The Department of Computer Science and Engineering
provides students with strong theoretical knowledge
and practical skills in computer science and
information technology.
</p>


<h2>Our Vision</h2>

<p>
To become a center of excellence in computer science
education and research and prepare students for
future technological challenges.
</p>


<h2>Our Mission</h2>

<ul>

<li>Provide quality technical education.</li>

<li>Develop programming and problem-solving skills.</li>

<li>Encourage innovation and research.</li>

<li>Prepare students for industry requirements.</li>

<li>Develop responsible technology professionals.</li>

</ul>


<h2>Areas of Study</h2>

<ul>

<li>Programming</li>

<li>Web Development</li>

<li>Database Management</li>

<li>Artificial Intelligence</li>

<li>Machine Learning</li>

<li>Data Structures and Algorithms</li>

</ul>

</div>


<footer>

© 2026 CSE Department

</footer>


<script>

document.addEventListener("DOMContentLoaded", function() {

    console.log("About page loaded");

});

</script>

</body>

</html>