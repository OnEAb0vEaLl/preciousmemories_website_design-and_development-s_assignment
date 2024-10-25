<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Precious Memories - Contact</title>
    <link href="https://fonts.googleapis.com/css2?family=IM+Fell+Double+Pica&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
       body { 
            font-family: 'IM Fell Double Pica', serif;
            color: black;
            margin: 0;
            padding: 0;
            background-color: #ffac84;
            line-height: 1.8;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        header {
            background-color: #ffac84;
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
    background: #ffac84; 
    color: #333; 
    font-size: 0.9rem;
    border-top: 1px solid #e5e5e5; 
    margin-top: auto;
    position: relative;
    bottom: 0;
    width: 100%;
}

.contact-container {
    max-width: 500px; 
    width: 90%;
    margin: 20px auto; 
}

form {
    padding: 50px; 
    background-color: #fff;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
    border-radius: 10px;
    transition: transform 0.3s ease, box-shadow 0.3s ease; 
}

form:hover {
    transform: scale(1.05); 
    box-shadow: 0 8px 30px rgba(0, 0, 0, 0.2); 
}

form label {
    display: block;
    margin-bottom: 5px;
    color: #555;
    font-weight: bold;
}

form input, form textarea {
    padding: 12px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 1rem;
    width: 100%;
    transition: border 0.3s ease, box-shadow 0.3s ease;
}

form input:focus, form textarea:focus {
    border-color: #1f1f1f;
    box-shadow: 0 0 5px rgba(31, 31, 31, 0.5);
    outline: none;
}

form button {
    background-color: #1f1f1f;
    color: #fff;
    border: none;
    padding: 12px;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.2s;
    font-size: 1rem;
    border-radius: 5px;
    width: 100%;
}

form button:hover {
    background-color: #444;
    transform: translateY(-2px);
}

form button:focus {
    outline: 2px solid #c0c0c0; 
}

.feedback-message {
    margin-top: 15px;
    font-size: 1rem;
    text-align: center; 
}

.feedback-message.success {
    color: green;
}

.feedback-message.error {
    color: red;
}

.social-media {
    text-align: center; 
    margin-top: 30px;
}

.social-media h3 {
    margin-bottom: 10px;
    color: #444;
    font-weight: bold;
}

.social-media a {
    text-decoration: none;
}

.social-icon {
    margin: 0 15px;
    color: #1f1f1f;
    font-size: 40px;
    transition: transform 0.3s ease, color 0.3s ease;
}

.social-icon:hover {
    color: #c0c0c0;
    transform: scale(1.1);
}
.contact-info {
    text-align: center;
    margin-bottom: 20px;
    font-size: 1.1rem;
    color: #333;
}


        
        @media (max-width: 600px) {
            nav ul li {
                margin: 0 10px; 
            }

            form {
                padding: 20px; 
            }

            header h1 {
                font-size: 2rem; 
            }

            nav ul li a {
                font-size: 1rem; 
            }
        }
    </style>
    <script>
     
    
    function validateForm() {
        const phoneInput = document.getElementById('phone');
        const phonePattern = /^\+?\d{10,15}$/; 

        if (!phonePattern.test(phoneInput.value)) {
            alert("Please enter a valid phone number.");
            return false;
        }
        return true;
    }

    
    document.getElementById('contact-form').addEventListener('submit', function(event) {
        event.preventDefault(); 
        if (!validateForm()) {
            return; 
        }

        
        const formData = new FormData(this);

        
        fetch('', {
            method: 'POST',
            body: formData,
        })
        .then(response => response.text())
        .then(data => {
            if (data.includes('Message sent successfully!')) {
                alert('Thank you for your message! Your form has been submitted successfully.');
                document.getElementById('contact-form').reset(); 
            } else {
                alert('An error occurred while submitting your message. Please try again.');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred while submitting your message. Please try again.');
        });
    });


    </script>
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
    <h2>Contact Us</h2>
    <div class="contact-info">
        <p><strong>Email:</strong> info@preciousmemories.com</p>
        <p><strong>Phone:</strong> 9818826642</p>
        <p><strong>Address:</strong> bhaktapur, nepal</p>
    </div>
    <div class="contact-container">
        <form id="contact-form" method="POST" action="" onsubmit="return validateForm();">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" placeholder="John Doe" required>
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="you@example.com" required>
            
            <label for="phone">Contact Number:</label>
            <input type="text" id="phone" name="phone" placeholder="+123456789" required>
            
            <label for="message">Message:</label>
            <textarea id="message" name="message" placeholder="Your message here..." required></textarea>
            
            <button type="submit" id="submit-button">Send Message</button>
        </form>

        <div class="social-media">
            <h3>Connect with us:</h3>
            <a href="https://www.instagram.com/" target="_blank" class="social-icon" title="Instagram" aria-label="Instagram">
                <i class="fab fa-instagram"></i>
            </a>
            <a href="https://www.pinterest.com/" target="_blank" class="social-icon" title="Pinterest" aria-label="Pinterest">
                <i class="fab fa-pinterest"></i>
            </a>
            <a href="https://www.linkedin.com/" target="_blank" class="social-icon" title="LinkedIn" aria-label="LinkedIn">
                <i class="fab fa-linkedin"></i>
            </a>
        </div>
        <?php
        include 'db.php'; 

        $feedbackMessage = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = mysqli_real_escape_string($conn, $_POST['name']);
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $phone = mysqli_real_escape_string($conn, $_POST['phone']);
            $message = mysqli_real_escape_string($conn, $_POST['message']);

            $query = "INSERT INTO messages (name, email, contact_number, message) VALUES ('$name', '$email', '$phone', '$message')";
            if (mysqli_query($conn, $query)) {
                $feedbackMessage = "<p class='feedback-message success'>Message sent successfully!</p>";
            } else {
                $feedbackMessage = "<p class='feedback-message error'>Error: " . mysqli_error($conn) . "</p>";
            }
        }

        if ($feedbackMessage) {
            echo $feedbackMessage;
        }
        ?>
    </div>
</main>


    <footer>
        <p>&copy; 2024 Precious Memories</p>
    </footer>
</body>
</html>

