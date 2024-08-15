<!DOCTYPE html>
<html lang="en">
<?php
session_start();

if (!isset($_SESSION['IS_LOGIN'])) {
    // Redirect to login page if user is not logged in
    header("Location: ../login.php");
    die();
}
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Webpage with Cards</title>
    <link rel="stylesheet" href="styles.css">
    <STYLE>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
        }

        section {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            width: 100%;
            background: url('../background.png');
            /* background: url('background.png'); */
            background-position: center;
            background-size: cover;
        }

        nav {
            background-color: black;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem;
        }

        nav .logo {
            font-size: 1.5rem;
        }

        nav .nav-links {
            list-style: none;
            display: flex;
            gap: 1rem;
        }

        nav .nav-links li {
            padding: 0.5rem 1rem;
        }

        nav .nav-links li a {
            color: white;
            text-decoration: none;
        }

        .cards-section {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
            padding: 2rem;
        }

        .card {
            background-color: gold;
            padding: 1rem;
            border-radius: 5px;
            box-shadow: 0 24px 6px white;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 12px rgba(0, 0, 0, 0.2);
        }

        .card h3 {
            margin-bottom: 1rem;
        }

        .card button {
            padding: 0.5rem 1rem;
            background-color: #333;
            color: white;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .card button a {
            color: white;
            text-decoration: none;
        }

        .card button:hover {
            background-color: #555;
        }

        footer {
            background-color: black;
            color: white;
            text-align: center;
            padding: 1rem;
            position: fixed;
            width: 100%;
            bottom: 0;
        }

        @media (max-width: 768px) {
            nav .nav-links {
                flex-direction: column;
            }
        }
    </STYLE>
</head>

<body>
    <nav>
        <div class="logo">Faxfare admin</div>
        <ul class="nav-links">
        <li><a href="../logout.php">Log Out</a></li>
        </ul>
    </nav>

    <section class="cards-section">
        <div class="card">
            <h3>Enquiry</h3>
            <button><a href="enquiry.php">Click Me</a></button>
        </div>
        <div class="card">
            <h3>Registration</h3>
            <button><a href="student/RegistrationForm/fromsec.php">Click Me</a></button>
        </div>
        <div class="card">
            <h3>View Students Data</h3>
            <button><a href="student/RegistrationForm/viewdatasec.php">Click Me</a></button>
        </div>
    </section>

    <footer>
        <p>&copy; 2024 Faxfare School. All rights reserved.</p>
    </footer>
</body>
</html>
