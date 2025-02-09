<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Portal - Contact Us</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<!--header>
    <div class="container">
        <h1>Contact Us</h1>
    </div>
</header-->

<nav>
    <div class="container">
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="login.php">Login</a></li>
            <li><a href="register.php">Register</a></li>
            <li><a href="about.php">About Us</a></li>
        </ul>
    </div>
</nav>

<section class="contact">
    <div class="container">
        <!--h2>Get In Touch</h2>
        <p>If you have any questions or need support, feel free to reach out to us. Our team is here to help you with any queries you may have regarding job listings, your account, or any other matter.</p>

        <h2>Contact Information</h2>
        <ul>
            <li><strong>Email:</strong> support@jobportal.com</li>
            <li><strong>Phone:</strong> +123 456 7890</li>
            <li><strong>Address:</strong> 123 Job Street, Tech City, USA</li>
        </ul-->

        <h2>Contact Form</h2>
        <form action="send_contact.php" method="post">
            <label for="name">Your Name</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Your Email</label>
            <input type="email" id="email" name="email" required>

            <label for="message">Your Message</label>
            <textarea id="message" name="message" rows="5" required></textarea>

            <input type="submit" value="Send Message">
        </form>
    </div>
</section>

<footer>
    <div class="container">
        <p>&copy; 2024 Job Portal. All rights reserved.</p>
    </div>
</footer>

</body>
</html>
