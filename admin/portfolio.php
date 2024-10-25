<?php
include '../admin/db.php'; 


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['add'])) {
        
        $title = $_POST['title'];
        $description = $_POST['description'];
        $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
        
        $sql = "INSERT INTO Portfolio (title, description, image) VALUES ('$title', '$description', '$image')";
        $conn->query($sql);
    } elseif (isset($_POST['update'])) {
       
        $id = $_POST['id'];
        $title = $_POST['title'];
        $description = $_POST['description'];
        $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
        
        $sql = "UPDATE Portfolio SET title='$title', description='$description', image='$image' WHERE id=$id";
        $conn->query($sql);
    }
} elseif (isset($_GET['delete'])) {
   
    $id = $_GET['delete'];
    $sql = "DELETE FROM Portfolio WHERE id=$id";
    $conn->query($sql);
}


$result = $conn->query("SELECT * FROM Portfolio");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Portfolio</title>
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
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
        }

        form {
            background: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 600px;
            margin-bottom: 30px;
        }

        input[type="text"],
        textarea,
        input[type="file"] {
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
            border-collapse: collapse;
            margin-top: 30px;
        }

         td {
            padding: 15px;
            text-align: left;
            border: 1px solid #ccc;
            background-color: #fff;
        }

        th {
            padding: 15px;
            text-align: left;
            border: 1px solid #ccc;
            background-color: #8493e5;
            color: #333;
        }

        img {
            max-width: 100px;
            height: auto;
            border-radius: 5px;
        }

        footer {
            text-align: center;
            background-color: #a0d5e5;
            padding: 20px;
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
        
        <form action="portfolio.php" method="POST" enctype="multipart/form-data">
            <h2><?php echo isset($_GET['edit']) ? 'Edit Portfolio Item' : 'Add New Portfolio Item'; ?></h2>
            <input type="hidden" name="id" value="<?php echo isset($_GET['edit']) ? $_GET['edit'] : ''; ?>">
            <input type="text" name="title" placeholder="Title" required>
            <textarea name="description" placeholder="Description" required></textarea>
            <input type="file" name="image" required>
            <button type="submit" name="<?php echo isset($_GET['edit']) ? 'update' : 'add'; ?>">
                <?php echo isset($_GET['edit']) ? 'Update' : 'Add'; ?>
            </button>
        </form>

       
        <table>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo htmlspecialchars($row['title']); ?></td>
                <td><?php echo htmlspecialchars($row['description']); ?></td>
                <td><img src="data:image/jpeg;base64,<?php echo base64_encode($row['image']); ?>" alt="Portfolio Image" /></td>
                <td>
                    <a href="portfolio.php?delete=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to delete this item?');">Delete</a>
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
