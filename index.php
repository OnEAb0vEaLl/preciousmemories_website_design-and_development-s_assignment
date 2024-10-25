<?php
include 'db.php'; 


$query = "SELECT image FROM Gallery";
$result = mysqli_query($conn, $query);
$images = [];
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        
        $base64Image = base64_encode($row['image']);
        $images[] = "data:image/jpeg;base64," . $base64Image;
    }
} else {
    
    echo "Error fetching images: " . mysqli_error($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Precious Memories - Professional Photography Services</title>
    <meta name="description" content="Precious Memories offers professional photography services specializing in weddings, corporate events, and personal portraits. Capturing life's fleeting moments with timeless imagery.">
    
    
    <meta property="og:title" content="Precious Memories - Professional Photography Services">
    <meta property="og:description" content="Capture life's moments with Precious Memories, your trusted photography service for weddings and events.">
    <meta property="og:image" content="URL_TO_DEFAULT_IMAGE"> 
    <meta property="og:url" content="http://yourwebsite.com/gallery.php">
    <meta property="og:type" content="website">

   
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Precious Memories - Professional Photography Services">
    <meta name="twitter:description" content="Capture life's moments with Precious Memories, your trusted photography service for weddings and events.">
    <meta name="twitter:image" content="URL_TO_DEFAULT_IMAGE"> 

    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=IM+Fell+Double+Pica&display=swap" rel="stylesheet"> 
    <style>
        body { 
            font-family: 'IM Fell Double Pica', serif;
            color: black;
            margin: 0;
            padding: 0;
            background-color: #e0ffcd;
            line-height: 1.8;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        header {
            background-color: #e0ffcd;
            border-bottom: 1px solid #e5e5e5;
            padding: 20px 0;
            text-align: center;
        }
        header h1:hover {
            transform: scale(1.05);
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

        main {
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 20px;
    flex: 1;
}

.main-content {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    margin: 40px auto;
    max-width: 1200px;
    flex-grow: 1;
    width: 100%;
}

.welcome {
    flex: 2.5;
    margin-right: 30px;
    padding: 30px;
    background: #fff;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    border-radius: 12px;
    transition: transform 0.3s ease; 
}

.welcome:hover {
    transform: scale(1.05); 
}

.welcome h2 {
    color: #444;
    font-size: 2.5rem;
    margin-bottom: 20px;
    transition: color 0.3s ease; 
}

.welcome p {
    color: #666;
    font-size: 1.2rem;
    margin-bottom: 15px;
    transition: color 0.3s ease; 
}

.welcome:hover h2,
.welcome:hover p {
    color: #333; 
}

.right-column {
    flex: 1.5;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

.slider {
    max-width: 600px;
    height: 235px;
    margin-bottom: 40px;
    border-radius: 20px;
    overflow: hidden;
    position: relative;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease; 
}

.slider:hover {
    transform: scale(1.02);
}

.slider-container {
    display: flex;
    transition: transform 0.6s ease-in-out;
}

.slide {
    min-width: 100%;
    height: 100%;
}

.slide img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.prev, .next {
    cursor: pointer;
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    background-color: rgba(0, 0, 0, 0.4);
    color: white;
    padding: 16px;
    font-size: 24px;
    border: none;
    border-radius: 50%;
}

.next {
    right: 10px;
}

.prev {
    left: 10px;
}

.prev:hover, .next:hover {
    background-color: rgba(0, 0, 0, 0.6);
}

.review-section {
    background: #fff;
    padding: 20px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    border-radius: 12px;
    transition: transform 0.3s ease; 
}

.review-section:hover {
    transform: scale(1.02);
}

.review-section h2 {
    font-size: 2.2rem;
    margin-bottom: 20px;
    color: #444;
    text-align: center;
    transition: color 0.3s ease; 
}

.review-section:hover h2 {
    color: #333; 
}

.review {
    border-top: 1px solid #e5e5e5;
    padding: 10px 0;
}

.review p {
    color: #666;
    font-size: 1.2rem;
    margin: 5px 0;
    transition: color 0.3s ease; 
}

.review:hover p {
    color: #444; 
}

footer {
    text-align: center;
    padding: 20px 0;
    background-color: #e0ffcd;
    color: #333;
    font-size: 1rem;
    border-top: 1px solid #e5e5e5;
}


       
        @media (max-width: 1200px) {
            .main-content {
                flex-direction: column;
                margin: 20px;
            }

            .welcome {
                margin-right: 0;
                margin-bottom: 20px;
                width: 100%; 
            }

            .right-column {
                flex: 1; 
                margin-top: 20px; 
            }

            .slider {
                max-width: 100%; 
            }

            .slider img {
                height: auto; 
            }

            nav ul li {
                margin: 0 10px; 
            }

            header h1 {
                font-size: 2rem; 
            }

            nav ul li a {
                font-size: 1rem; 
            }

            .review-section h2 {
                font-size: 1.8rem; 
            }

            .review p {
                font-size: 1rem; 
            }
        }

        @media (max-width: 768px) {
            .slider {
                height: 200px; 
            }

            .welcome h2 {
                font-size: 2rem; 
            }

            .welcome p {
                font-size: 1rem; 
            }

            .review-section h2 {
                font-size: 1.6rem; 
            }
        }

        @media (max-width: 480px) {
            .welcome {
                padding: 15px; 
            }

            .review-section {
                padding: 10px; 
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

    <main class="main-content">
        
        <section class="welcome">
            <h2>Welcome to Precious Memories</h2>
            <p>At Precious Memories, we believe that life is a collection of beautiful moments worth preserving. Our dedicated team of experienced photographers specializes in capturing the essence of these fleeting instances, providing you with heartfelt images that you can cherish for a lifetime.</p>
            <p>Whether it’s the joy of a wedding day, the laughter shared at a family reunion, or the professionalism required for corporate events, our expertise allows us to document each occasion with artistry and care. We take pride in creating a comfortable environment where you can be yourself, ensuring that your true emotions shine through in every shot.</p>
            <p>We understand that photography is not just about taking pictures; it’s about creating memories that tell your unique story. Our commitment is to make your photography experience enjoyable, engaging, and memorable. From the initial consultation to the final delivery of your images, we are here to guide you every step of the way.</p>
            <p>Join us at Precious Memories, where we transform your moments into timeless treasures.</p>
        </section>

        
        <div class="right-column">
            
            <section class="slider">
                <div class="slider-container">
                    <?php foreach ($images as $index => $imageSrc): ?>
                        <div class="slide">
                            <img src="<?php echo $imageSrc; ?>" alt="Gallery Image <?php echo $index + 1; ?>">
                        </div>
                    <?php endforeach; ?>
                </div>
                <button class="prev" onclick="changeSlide(-1)">&#10094;</button>
                <button class="next" onclick="changeSlide(1)">&#10095;</button>
            </section>

            
            <section class="review-section">
                <h2>What Our Clients Say</h2>
                <div class="review">
                    <p>"Precious Memories captured our wedding day perfectly. The photos are breathtaking!" - Sarah & Mike</p>
                </div>
                <div class="review">
                    <p>"Amazing experience! The photographers were professional." - Jessica L.</p>
                </div>
                <div class="review">
                    <p>"We hired Precious Memories for our corporate event. The quality was great!" - Thomas R.</p>
                </div>
            </section>
        </div>
    </main>

    <footer>
        <p>&copy; 2024 Precious Memories</p>
    </footer>

    <script>
        let slideIndex = 0;
        const slides = document.querySelectorAll('.slide');
        showSlide(slideIndex);

        function changeSlide(n) {
            slideIndex = (slideIndex + n + slides.length) % slides.length;
            showSlide(slideIndex);
        }

        function showSlide(n) {
            const sliderContainer = document.querySelector('.slider-container');
            sliderContainer.style.transform = `translateX(${-n * 100}%)`;
        }

        
        setInterval(() => {
            changeSlide(1);
        }, 5000);
    </script>
</body>
</html>
