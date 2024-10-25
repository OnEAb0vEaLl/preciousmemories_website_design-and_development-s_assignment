<?php
include '../admin/db.php';
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Luckiest+Guy&display=swap" rel="stylesheet"> 
    <style>
        body {
            font-family: 'Luckiest Guy', cursive;
            background-color: #e8f0f2; 
            color: #000;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        header {
            background: #a0d5e5; 
            color: #000;
            padding: 30px 0;
            text-align: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-size: 2.5rem;
            margin: 0;
        }

        nav ul {
            list-style: none;
            display: flex;
            justify-content: center;
            gap: 15px;
            padding: 0;
        }

        nav li {
            display: inline;
        }

        nav a {
            color: #333;
            text-decoration: none;
            background-color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        nav a:hover {
            background-color: #558f8d;
        }


        main {
            padding: 40px 20px;
            text-align: center;
            flex-grow: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 40px;
        }

        h2 {
            color: #333; 
            font-size: 2rem;
            margin-bottom: 10px;
        }

        p {
            font-size: 1.2rem;
            max-width: 600px;
            color: #666; 
        }

        .image-container {
            flex-shrink: 0;
        }

        .image-container img {
            width: 400px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        footer {
    display: flex;
    justify-content: center; 
    align-items: center; 
    padding: 20px 0;
    background: #a0d5e5; 
    color: #333; 
    margin-top: auto;
    width: 100%;
    box-shadow: 0 -2px 5px rgba(0, 0, 0, 0.1);
}

    </style>
</head>
<body>
    <header>
        <h1>Admin Dashboard</h1>
        <nav>
            <ul>
                <li><a href="portfolio.php">Manage Portfolio</a></li>
                <li><a href="gallery.php">Manage Gallery</a></li>
                <li><a href="experience.php">Manage Experience</a></li>
                <li><a href="messages.php">Messages</a></li>
                <li><a href="index.php">Logout</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <div class="image-container">
            <img src="https://cdni.iconscout.com/illustration/premium/thumb/business-planning-illustration-download-in-svg-png-gif-file-formats--admin-dashboard-manager-user-management-monitor-people-illustrations-3356780.png?f=webp" alt="Welcome Image">
        </div>
        <div>
            <h2>Welcome to the Admin Panel</h2>
            <p>The admin panel is designed to streamline content management for your website. It allows you to easily manage portfolios, galleries, and messages. With the intuitive navigation menu at the top, you can quickly access different sections to add, edit, or delete content as needed. Each section is tailored for efficient updates, ensuring your site remains up-to-date with minimal effort. Whether you're organizing a gallery or handling messages, the panel offers a user-friendly experience that simplifies the entire process. This centralized system helps you maintain full control over your website's content with ease</p>
        </div>
    </main>
    <footer>
        <p>&copy; 2024 Precious Memories</p>
    </footer>
</body>
</html>
