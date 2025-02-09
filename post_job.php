<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Portal - Post a Job</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<nav>
    <div class="container">
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="login.php">Login</a></li>
            <li><a href="register.php">Register</a></li>
            <li><a href="about.php">About Us</a></li>
            <li><a href="contact.php">Contact Us</a></li>
        </ul>
    </div>
</nav>

<section class="post-job">
    <div class="container">
        <h2>Job Posting Form</h2>
        <form action="post_job_process.php" method="post">
            <label for="job-title">Job Title</label>
            <input type="text" id="job-title" name="job_title" value="<?php echo isset($_POST['job_title']) ? htmlspecialchars($_POST['job_title']) : ''; ?>" required>

            <label for="company">Company Name</label>
            <input type="text" id="company" name="company_name" required>

            <label for="location">Location</label>
            <input type="text" id="location" name="location" value="<?php echo isset($_POST['location']) ? htmlspecialchars($_POST['location']) : ''; ?>" required>

            <label for="description">Job Description</label>
            <textarea id="description" name="job_description" rows="5" required><?php echo isset($_POST['job_description']) ? htmlspecialchars($_POST['job_description']) : ''; ?></textarea>

            <label for="salary">Salary</label>
            <input type="text" id="salary" name="salary" required>

            <input type="submit" value="Post Job">
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
