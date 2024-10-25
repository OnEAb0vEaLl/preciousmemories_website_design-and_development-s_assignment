<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Precious Memories - Experience</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=IM+Fell+Double+Pica&display=swap" rel="stylesheet">
    <style>
        body { 
            font-family: 'IM Fell Double Pica', serif;
            color: black;
            margin: 0;
            padding: 0;
            background-color: #ffcab0;
            line-height: 1.8;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        header {
            background-color: #ffcab0;
            border-bottom: 1px solid #e5e5e5;
            padding: 20px 0;
            text-align: center;
        }

        header h1 {
            margin: 0;
            font-size: 2.5rem;
            letter-spacing: 1.5px;
            color: #333;
        }

        nav ul {
            margin: 20px 0;
            padding: 0;
            list-style: none;
            text-align: center;
        }

        nav ul li {
            display: inline-block;
            margin: 0 20px;
        }

        nav ul li a {
            color: #333;
            text-decoration: none;
            font-size: 1.2rem;
            padding: 10px 15px;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        nav ul li a:hover {
            background-color: #333;
            color: #fff;
        }
        header h1:hover {
            transform: scale(1.05);
        }

        main {
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 20px;
    flex: 1;
}

footer {
    text-align: center;
    padding: 20px 0;
    background: #ffcab0;
    color: #333;
    font-size: 0.9rem;
    border-top: 1px solid #e5e5e5;
    margin-top: auto;
    width: 100%;
}

.experience-container {
    margin: 20px auto;
    padding: 20px;
    background-color: #fff;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    border-radius: 5px;
    max-width: 800px;
    width: 90%;
}

.experience-item {
    margin-bottom: 25px;
    border-bottom: 1px solid #ccc;
    padding-bottom: 20px;
    display: flex; 
    flex-direction: column; 
    align-items: center; 
    transition: transform 0.3s ease, box-shadow 0.3s ease; 
}

.experience-item:hover {
    transform: scale(1.05); 
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2); 
}

.experience-item img {
    width: 100%;
    max-width: 300px;
    border-radius: 5px;
    margin-bottom: 10px;
}

.experience-item h3 {
    margin-top: 10px;
    font-size: 1.5rem;
    color: #333;
    text-align: center; 
}

.experience-item p {
    margin: 5px 0;
    line-height: 1.6;
    text-align: center; 
}

        @media (min-width: 600px) {
            .experience-item {
                flex-direction: row; 
                align-items: flex-start; 
                justify-content: space-between; 
            }

            .experience-item img {
                margin-bottom: 0; 
                margin-right: 20px; 
            }

            .experience-item h3,
            .experience-item p {
                text-align: left; 
            }
        }
    </style>
</head>
<body>
    <header>
        <h1>Precious Memories</h1>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="portfolio.php">Portfolio</a></li>
                <li><a href="gallery.php">Gallery</a></li>
                <li><a href="experience.php">Experience</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <h2>Experience and Skills</h2>

        <div class="experience-container">
            <?php
            include 'db.php';
            $query = "SELECT description, skills, image FROM Experience";
            $result = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_assoc($result)) {
                $base64Image = base64_encode($row['image']);
                $imageSrc = 'data:image/jpeg;base64,' . $base64Image;
                ?>
                <div class="experience-item">
                    <img src="<?php echo $imageSrc; ?>" alt="Experience Image">
                    <div>
                        <h3>Skills:</h3>
                        <p><?php echo htmlspecialchars($row['skills']); ?></p>
                        <h3>Description:</h3>
                        <p><?php echo htmlspecialchars($row['description']); ?></p>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </main>
    <footer>
        <p>&copy; 2024 Precious Memories</p>
    </footer>
</body>
</html>
