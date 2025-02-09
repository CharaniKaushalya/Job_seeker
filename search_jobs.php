<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Portal - Search Jobs</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"> <!-- Font Awesome CSS -->
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

<section class="job-search">
    <div class="container">
        <h2>Find Your Next Job</h2>
        <form action="search_job_results.php" method="get" class="search-form">
            <div class="search-container">
                <input type="text" name="keywords" placeholder="Enter job title, company, or keywords" required>
                <button type="submit" aria-label="Search">
                    <i class="fas fa-search"></i> <!-- Font Awesome search icon -->
                </button>
            </div>
        </form>
    </div>
</section>

<section class="job-listings">
    <div class="container">
        <h2>Recent Job Listings</h2>

        <?php
        // Include database connection
        include('db_connection.php');

        // Fetch job listings from the database
        $sql = "SELECT job_listings.id, job_listings.title, users.username AS company_name, job_listings.description 
                FROM job_listings 
                JOIN users ON job_listings.company_id = users.id 
                ORDER BY job_listings.posted_at DESC"; // Get recent jobs first

        $result = $conn->query($sql);

        // Check if there are jobs available
        if ($result->num_rows > 0) {
            // Output data for each job
            while ($row = $result->fetch_assoc()) {
                echo '<div class="job-listing">';
                echo '<h3>' . htmlspecialchars($row['title']) . '</h3>';
                echo '<p>Company: ' . htmlspecialchars($row['company_name']) . '</p>';
                echo '<p>Description: ' . htmlspecialchars($row['description']) . '</p>';
                echo '<a href="job_details.php?id=' . $row['id'] . '" class="btn">View Details</a>';
                echo '</div>';
            }
        } else {
            echo '<p>No job listings available at the moment.</p>';
        }

        // Close the database connection
        $conn->close();
        ?>

    </div>
</section>

<footer>
    <div class="container">
        <p>&copy; 2024 Job Portal. All rights reserved.</p>
    </div>
</footer>

</body>
</html>
