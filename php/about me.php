

  <?php
  // Retrieve the email from the cookie
  $email = isset($_COOKIE['mail_id']) ? $_COOKIE['mail_id'] : null;

  if ($email) {
    // Connect to your database (Replace with your database credentials)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "college portal";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    // Perform the database query to fetch the row based on the email
    $sql = "SELECT name,phone,mail_id,password FROM login_stu WHERE mail_id = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      // Fetch the row as an associative array
      $row = $result->fetch_assoc();
      echo "<h2>Name: " . $row['name'] . "</h2>";
      echo "<p>Email: " . $email . "</p>";
      echo "<p>Phone Number: " . $row['phone'] . "</p>";
      // Display other data as needed
    } else {
      echo "<p>User not found.</p>";
    }

    $conn->close();
  } else {
    echo "<p>Email not found in cookies.</p>";
  }
  ?>

</body>
</html>