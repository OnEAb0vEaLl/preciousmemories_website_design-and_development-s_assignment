<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Precious Memories</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Luckiest+Guy&display=swap" rel="stylesheet"> <!-- Importing Luckiest Guy -->
    <style>
        * {
            box-sizing: border-box;
        }

        html, body {
            height: 100%;
            margin: 0;
            font-family: 'Luckiest Guy', cursive; 
            color: #000;
            line-height: 1.6;
            background-color: #e8f0f2; 
            display: flex;
            flex-direction: column;
        }

        header {
            background: #a0d5e5; 
            color: #000; 
            padding: 30px 0;
            text-align: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        h1 {
            margin: 0;
            font-size: 2.8rem;
            letter-spacing: 1px;
        }

        main {
            flex: 1;
            padding: 50px 20px; 
            text-align: center;
            background-color: #ffffff; 
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            margin: 20px;
        }

        h2 {
            color: #333; 
            font-size: 2.4rem;
            margin-bottom: 40px; 
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .admin-options {
            list-style: none;
            padding: 0;
            display: flex;
            justify-content: center;
            gap: 30px; 
        }

        .admin-options li {
            margin: 0;
        }

        a {
            display: inline-block;
            padding: 15px 30px; 
            color: #333; 
            background-color: #66b3b1;
            text-decoration: none;
            font-weight: bold;
            border-radius: 5px;
            transition: background-color 0.3s, transform 0.2s, box-shadow 0.3s;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15); 
        }
        a:hover {
            background-color: #558f8d; 
            transform: translateY(-3px);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2); 
        }

        footer {
            text-align: center;
            padding: 20px 0;
            background: #a0d5e5; 
            color: #000; 
            margin-top: auto;
            width: 100%;
            box-shadow: 0 -2px 5px rgba(0, 0, 0, 0.1);
        }

        
        @media (max-width: 600px) {
            h1 {
                font-size: 2rem;
            }

            h2 {
                font-size: 1.8rem;
            }

            a {
                padding: 10px 20px; 
        }
    </style>
</head>
<body>

    <header>
        <h1>Welcome to Precious Memories Admin Panel</h1>
    </header>

    <main>
        <section>
            <h2>Admin Options</h2>
            <ul class="admin-options">
                <li><a href="login.php">Login as Admin</a></li>
                <li><a href="create_admin.php">Create New Admin User</a></li>
            </ul>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 Precious Memories</p>
    </footer>
</body>
</html>
