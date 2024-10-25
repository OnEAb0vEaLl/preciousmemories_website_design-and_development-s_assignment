<?php
include '../admin/db.php'; 


$result = $conn->query("SELECT * FROM messages"); 

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql = "DELETE FROM messages WHERE id=$id";
    $conn->query($sql);
    header("Location: messages.php"); 
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Messages</title>
    <link href="https://fonts.googleapis.com/css2?family=Luckiest+Guy&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: Georgia, serif;
            background-color: #e8f0f2; 
            color: #000;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        header {
            font-family: 'Luckiest Guy', cursive;
            width:105%;
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

        .content {
            flex: 1;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

       
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 600px;
            margin-bottom: 20px;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            background-color: #3f51b5;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #303f9f;
        }

        
        table {
            width: 100%;
            max-width: 800px;
            border-collapse: collapse;
            margin-top: 20px;
        }

        td {
            padding: 15px;
            text-align: left;
            border: 1px solid #ccc;
        }

        th {
            padding: 15px;
            text-align: left;
            border: 1px solid #ccc;
            background-color: #8493e5;
            color: #333;
        }

        td {
            background-color: #fff;
        }

        tr:nth-child(even) td {
            background-color: #f2f2f2;
        }

        footer {
            text-align: center;
            background-color: #a0d5e5;
            padding: 20px;
            width: 100%;
            box-shadow: 0 -2px 5px rgba(0, 0, 0, 0.1);
            margin-top: auto;
        }
    </style>
</head>
<body>
    <header>
        <h1>Admin Dashboard</h1>
        <nav>
            <ul>
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="portfolio.php">Manage Portfolio</a></li>
                <li><a href="gallery.php">Manage Gallery</a></li>
                <li><a href="experience.php">Manage Experience</a></li>
                <li><a href="messages.php">Messages</a></li>
                <li><a href="index.php">Logout</a></li>
            </ul>
        </nav>
    </header>

    <div class="content">
        
        <form>
            <h2>Search Messages</h2>
            <input type="text" placeholder="Enter name or email">
            <button type="submit">Search</button>
        </form>

       
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Message</th>
                <th>Actions</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo htmlspecialchars($row['id']); ?></td>
                <td><?php echo htmlspecialchars($row['name']); ?></td>
                <td><?php echo htmlspecialchars($row['email']); ?></td>
                <td><?php echo htmlspecialchars($row['message']); ?></td>
                <td>
                    <a href="messages.php?delete=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to delete this message?');">Delete</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </table>
    </div>

    <footer>
        <p>&copy; 2024 Precious Memories</p>
    </footer>
</body>
</html>

<?php closeConnection($conn); ?>
