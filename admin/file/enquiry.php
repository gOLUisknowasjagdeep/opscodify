<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Faxfare Enquiry</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('../background.png');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-color: #f4f4f4;
        }

        .navbar, .footer {
            display: flex;
            justify-content: center;
            background-color: black;
            padding: 10px;
        }

        .navbar .card, .footer .card {
            background-color: black;
            color: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            margin: 5px;
            padding: 10px 20px;
            text-align: center;
            transition: transform 0.3s, box-shadow 0.3s, background-color 0.3s;
        }

        .navbar .card:hover, .footer .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
            background-color: pink;
        }

        .navbar .card a, .footer .card a {
            color: white;
            text-decoration: none;
        }

        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
        }

        .card {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            margin: 20px;
            padding: 20px;
            text-align: center;
            transition: transform 0.3s, box-shadow 0.3s, background-color 0.3s;
            flex: 1 1 calc(33.333% - 40px); /* Three cards per row */
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
            background-color: #f9f9f9;
        }

        .card h3 {
            margin: 10px 0;
        }

        .card p {
            color: #777;
        }

        .delete-btn {
            display: inline-block;
            margin-top: 10px;
            padding: 10px 20px;
            background-color: #e74c3c;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s, transform 0.3s;
        }

        .delete-btn:hover {
            background-color: #c0392b;
            transform: translateY(-5px);
        }

        .cards-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        /* Responsive design adjustments */
        @media (max-width: 768px) {
            .card {
                flex: 1 1 calc(50% - 40px); /* Two cards per row */
            }
        }

        @media (max-width: 480px) {
            .card {
                flex: 1 1 calc(100% - 40px); /* One card per row */
            }

            .delete-btn {
                padding: 8px 15px;
            }
        }
    </style>
</head>
<body>
    <header class="navbar">
        <div class="card"><a href="javascript:history.back()">Back</a></div>
        <div class="card"><a href="../index.php">Home</a></div>
    </header>
    <div class="container">
        <h1><font color="white"><u>Enquiry</u></font> </h1>
        <div class="cards-container">
            <?php
                // Database connection details
                $servername = "localhost";
                $username = "root"; // Your MySQL username
                $password = ""; // Your MySQL password
                $dbname = "faxfare";

                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Delete record if delete button is clicked
                if (isset($_GET['delete'])) {
                    $id = $_GET['delete'];
                    $sql = "DELETE FROM contact_Us WHERE id=$id";
                    if ($conn->query($sql) === TRUE) {
                        echo "<p class='text-success'>Record deleted successfully</p>";
                    } else {
                        echo "<p class='text-danger'>Error deleting record: " . $conn->error . "</p>";
                    }
                }

                // Fetch all contact data
                $sql = "SELECT id, name, mobile, email, message FROM contact_form_submissions";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<div class='card'>";
                        echo "<h3>" . $row["name"] . "</h3>";
                        echo "<p>Mobile: " . $row["mobile"] . "</p>";
                        echo "<p>Email: " . $row["email"] . "</p>";
                        echo "<p>Message: " . $row["message"] . "</p>";
                        echo "<a href='?delete=" . $row["id"] . "' class='delete-btn'>Delete</a>";
                        echo "</div>";
                    }
                } else {
                    echo "<p>No contacts found.</p>";
                }

                // Close connection
                $conn->close();
            ?>
        </div>
    </div>

    <footer class="footer">
        <div class="card"><a href="#">© 2024 Faxfare School. All rights reserved.</a></div>
    </footer>
</body>
</html>
