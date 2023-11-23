<?php
if (isset($_POST['submit'])) {
    $target_dir = "uploads/"; // Directory where uploaded files will be stored
    $target_file = $target_dir . basename($_FILES["file"]["name"]); // Full path to the uploaded file

    // Check if the file already exists
    if (file_exists($target_file)) {
        echo "Sorry, the file already exists.";
    } else {
        // Check file size (you can set a custom limit)
        if ($_FILES["file"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
        } else {
            // Move the uploaded file to the specified directory
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
                echo "The file " . basename($_FILES["file"]["name"]) . " has been uploaded.";

                // Store file details in a database (you need to set up your database connection)
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "college portal";

                $conn = new mysqli($servername, $username, $password, $dbname);
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $file_name = $_FILES["file"]["name"];
                $file_path = $target_file;

                // SQL statement to insert file details into the database
                $sql = "INSERT INTO files (file_name, file_path) VALUES ('$file_name', '$file_path')";

                if ($conn->query($sql) === TRUE) {
                    echo "File details have been stored in the database.";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }

                $conn->close();
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }
}
?>
