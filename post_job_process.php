<?php
// Include database connection
include('db_connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $job_title = $_POST['job_title'];
    $location = $_POST['location'];
    $job_description = $_POST['job_description'];
    
    // Insert into database (removing the salary field)
    $sql = "INSERT INTO job_listings (title, description, company_id, requirements) VALUES (?, ?, ?, ?)";
    
    // Assuming the user's ID (company_id) is stored in session
    session_start();
    $company_id = $_SESSION['user_id']; // Get the logged-in user's ID

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssis", $job_title, $job_description, $company_id, $location);
    if ($stmt->execute()) {
        // Job posted successfully
        $job_id = $stmt->insert_id; // Get the ID of the inserted job
        echo '
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Job Posted Successfully</title>
            <link rel="stylesheet" href="css/styles.css">
            <style>
                body {
                    font-family: Arial, sans-serif;
                    background-color: #f5f5f5;
                    color: #333;
                    line-height: 1.6;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    height: 100vh;
                    margin: 0;
                }
                .container {
                    background-color: white;
                    padding: 20px;
                    border-radius: 10px;
                    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
                    text-align: center;
                    max-width: 500px;
                    width: 100%;
                }
                h2 {
                    color: #4CAF50;
                }
                p {
                    margin: 10px 0;
                }
                form {
                    margin-top: 20px;
                }
                input[type="submit"] {
                    background-color: #4CAF50;
                    color: white;
                    border: none;
                    padding: 10px 20px;
                    border-radius: 5px;
                    cursor: pointer;
                    transition: background-color 0.3s;
                }
                input[type="submit"]:hover {
                    background-color: #45a049;
                }
            </style>
        </head>
        <body>
            <div class="container">
                <h2>Job Posted Successfully!</h2>
                <p><strong>Job Title:</strong> ' . htmlspecialchars($job_title) . '</p>
                <p><strong>Location:</strong> ' . htmlspecialchars($location) . '</p>
                <p><strong>Job Description:</strong> ' . htmlspecialchars($job_description) . '</p>
                
                <!-- Provide options to either go back to homepage or edit the job -->
                <form action="index.php" method="post">
                    <input type="submit" value="Go to Homepage">
                </form>
                <form action="post_job.php" method="post">
                    <input type="hidden" name="job_id" value="' . $job_id . '">
                    <input type="hidden" name="job_title" value="' . htmlspecialchars($job_title) . '">
                    <input type="hidden" name="location" value="' . htmlspecialchars($location) . '">
                    <input type="hidden" name="job_description" value="' . htmlspecialchars($job_description) . '">
                    <input type="submit" value="Edit Job Details">
                </form>
            </div>
        </body>
        </html>';
    } else {
        echo "Error posting job: " . $stmt->error;
    }

    $stmt->close();
}
$conn->close();
?>
