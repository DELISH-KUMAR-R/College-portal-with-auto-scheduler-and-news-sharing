<!DOCTYPE html>
<html>
<head>
    <title>Display Files</title>
</head>
<body>
    <h1>Files in the Database</h1>

    <?php
    // Establish a database connection (replace with your own database credentials)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "college portal";
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Query to retrieve file records from the database
    $sql = "SELECT id, file_name, file_path FROM files";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Output each file as a download link
        while ($row = $result->fetch_assoc()) {
            $id = $row["id"];
            $file_name = $row["file_name"];
            $file_path = $row["file_path"];
            echo "<p><a href='$file_path' download='$file_name'>Download $file_name</a></p>";
        }
    } else {
        echo "No files found in the database.";
    }

    $conn->close();
    ?>

</body>
</html>
