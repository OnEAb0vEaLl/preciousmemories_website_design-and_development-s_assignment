<?php
include 'db.php'; 


$query = "SELECT title, description, image FROM Portfolio";
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio - Precious Memories</title>
    <link rel="stylesheet" href="styles.css">
    <meta name="description" content="Precious Memories offers professional photography services specializing in weddings, corporate events, and personal portraits. Capturing life's fleeting moments with timeless imagery.">
    
   
    <link href="https://fonts.googleapis.com/css2?family=IM+Fell+Double+Pica&display=swap" rel="stylesheet">
    
    <style>
        body { 
            font-family: 'IM Fell Double Pica', serif; 
            color: black;
            margin: 0;
            padding: 0;
            background-color: #fdffcd;
            line-height: 1.8;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        header {
            background-color: #fdffcd; 
            border-bottom: 1px solid #fdffcd;
            padding: 20px 0;
            text-align: center;
        }
        header h1:hover {
            transform: scale(1.05);
        }
        
        header h1 {
            margin: 0;
            font-family: 'IM Fell Double Pica', serif; 
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

        main {
            display: flex;
            flex-direction: column;
            align-items: center; 
            padding: 20px; 
            flex: 1; 
        }

        .portfolio-item {
            display: flex; 
            align-items: center; 
            margin-bottom: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            overflow: hidden; 
            width: 100%; 
            max-width: 1200px; 
            transition: transform 0.3s ease; 
        }

        .portfolio-item:hover {
            transform: scale(1.02); 
        }

        .portfolio-item img {
            width: 50%; 
            height: auto;
            transition: transform 0.3s ease; 
        }

        .portfolio-item:hover img {
            transform: scale(1.05); 
        }

        .portfolio-item .content {
            padding: 20px; 
            width: 50%; 
            display: flex;
            flex-direction: column; 
            justify-content: center; 
            border-left: 1px solid #e5e5e5; 
        }

        .portfolio-item h3 {
            font-size: 1.5rem;
            margin: 0 0 10px;
            color: #333;
            font-weight: bold;
        }

        .portfolio-item p {
            font-size: 1rem;
            color: #666;
            line-height: 1.4;
        }

        footer {
            text-align: center;
            padding: 20px 0;
            background-color: #fdffcd; 
            color: #333; 
            font-size: 0.9rem;
            border-top: 1px solid #e5e5e5;
        }

        
        @media (max-width: 768px) {
            .portfolio-item {
                flex-direction: column; 
            }

            .portfolio-item img {
                width: 100%; 
                border-radius: 8px 8px 0 0; 
            }

            .portfolio-item .content {
                width: 100%; 
                padding: 15px; 
                border-left: none; 
                border-top: 1px solid #e5e5e5; 
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
        <h2>Portfolio</h2>
        <?php
        
        $count = 0; 
        while ($row = mysqli_fetch_assoc($result)) {
            
            $base64Image = base64_encode($row['image']);
            $imageSrc = 'data:image/jpeg;base64,' . $base64Image;

            
            $isOdd = $count % 2; 
            ?>
            <div class="portfolio-item" style="flex-direction: <?php echo $isOdd ? 'row-reverse' : 'row'; ?>;">
                <img src="<?php echo $imageSrc; ?>" alt="<?php echo htmlspecialchars($row['title']); ?>">
                <div class="content">
                    <h3><?php echo htmlspecialchars($row['title']); ?></h3>
                    <p><?php echo htmlspecialchars($row['description']); ?></p>
                </div>
            </div>
            <?php
            $count++; 
        }
        ?>
    </main>
    <footer>
        <p>&copy; 2024 Precious Memories</p>
    </footer>
</body>
</html>
