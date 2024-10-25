<?php
require_once 'db.php'; 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

   
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    
    $stmt = $conn->prepare("INSERT INTO Admin (username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $hashedPassword); 

   
    if ($stmt->execute()) {
        $message = "Admin user created successfully.";
    } else {
        $message = "Error: " . $stmt->error;
    }

    
    $stmt->close();
}


$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Admin User</title>
    <link href="https://fonts.googleapis.com/css2?family=Luckiest+Guy&display=swap" rel="stylesheet"> 
    <style>
        body {
            font-family: 'Luckiest Guy', cursive; 
            color: #000;
            margin: 0;
            padding: 0;
            line-height: 1.6;
            background-color: #e8f0f2; 
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
            margin: 0;
            font-size: 2.8rem; 
            letter-spacing: 1px;
        }

        form {
            background: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            width: 300px; 
            text-align: center;
            margin: auto;
            margin-top: 40px; 
        }

        h2 {
            margin-bottom: 20px;
            color: #333; 
        }

        label {
            display: block;
            margin-bottom: 8px;
            text-align: left;
        }

        input[type="text"], input[type="password"] {
            width: 100%; 
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            font-family: 'Luckiest Guy', cursive;
            width: 100%;
            padding: 10px;
            background-color: #333; 
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #558f8d; 
        }

        .message {
            color: green;
            margin: 15px 0;
        }

        .error {
            color: red;
            margin: 15px 0;
        }

        .back-button {
            display: inline-block;
            margin-top: 10px; 
            padding: 10px 20px;
            background-color: #333; 
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .back-button:hover {
            background-color: #0056b3; 
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
    </style>
</head>
<body>

    <header>
        <h1>Welcome to Precious Memories Admin Panel</h1>
    </header>

    <form method="POST" action="">
        <h2>Create Admin User</h2>
        <?php if (isset($message)) { echo "<p class='message'>$message</p>"; } ?>
        <?php if (isset($error)) { echo "<p class='error'>" . htmlspecialchars($error) . "</p>"; } ?>
        <label for="username">Username:</label>
        <input type="text" name="username" required>
        
        <label for="password">Password:</label>
        <input type="password" name="password" required>
        
        <button type="submit">Create</button>
        <a href="index.php" class="back-button">Back to Home</a> 
    </form>

    <footer>
        <p>&copy; 2024 Precious Memories</p>
    </footer>
</body>
</html>
