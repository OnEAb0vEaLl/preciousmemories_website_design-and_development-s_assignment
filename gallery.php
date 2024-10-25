<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Precious Memories - Gallery</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=IM+Fell+Double+Pica&display=swap" rel="stylesheet">
    <style>
        body { 
            font-family: 'IM Fell Double Pica', serif;
            color: black;
            margin: 0;
            padding: 0;
            background-color:  #ffebbb;
            line-height: 1.8;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        header {
            background-color:  #ffebbb;
            border-bottom: 1px solid #e5e5e5;
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
        
        footer {
            text-align: center;
            padding: 20px 0;
            background-color:  #ffebbb;
            color: #333;
            font-size: 0.9rem;
            border-top: 1px solid #e5e5e5;
            margin-top: auto;
            position: relative;
            bottom: 0;
            width: 100%;
        }

        .filter-container {
            text-align: center;
            margin: 20px 0;
        }

        .filter-container select {
            padding: 10px;
            font-size: 1rem;
            border-radius: 5px;
            border: 1px solid #ccc;
            background-color: #fff;
            transition: border-color 0.3s;
        }

        .filter-container select:hover {
            border-color: #333;
        }

        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
            padding: 20px;
            max-width: 1000px;
            margin: 0 auto;
        }
        
        .gallery-grid img {
            width: 100%;
            height: auto;
            border-radius: 5px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .gallery-grid img:hover {
            transform: scale(1.05);
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
        <h2>Gallery</h2>
        <div class="filter-container">
            <label for="category-filter">Filter by category:</label>
            <select id="category-filter" onchange="filterGallery()">
                <option value="all">All</option>
                <option value="wild photography">Wild Photography</option>
                <option value="festival">Festival</option>
                <option value="street photo">Street Photo</option>
                <option value="marriage">Marriage</option>
            </select>
        </div>
        <div class="gallery-grid" id="gallery">
            <?php
            include 'db.php';
            $query = "SELECT image, category FROM Gallery";
            $result = mysqli_query($conn, $query);
            $images = [];
            while ($row = mysqli_fetch_assoc($result)) {
                $base64Image = base64_encode($row['image']);
                $images[] = [
                    'src' => 'data:image/jpeg;base64,' . $base64Image,
                    'category' => htmlspecialchars($row['category'])
                ];
            }
            foreach ($images as $image) {
                echo "<img src='{$image['src']}' alt='Gallery Image' class='gallery-item' data-category='{$image['category']}'>";
            }
            ?>
        </div>
    </main>
    <footer>
        <p>&copy; 2024 Precious Memories</p>
    </footer>

    <script>
        function filterGallery() {
            const filter = document.getElementById('category-filter').value;
            const images = document.querySelectorAll('.gallery-item');
            images.forEach(img => {
                if (filter === 'all' || img.getAttribute('data-category') === filter) {
                    img.style.display = 'block';
                } else {
                    img.style.display = 'none';
                }
            });
        }
    </script>
</body>
</html>
