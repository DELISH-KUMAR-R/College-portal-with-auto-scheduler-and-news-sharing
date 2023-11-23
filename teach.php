<?php
$name = $_POST['teacher-username'];
$phone = $_POST['teacher-phone'];
$email_id = $_POST['teacher-mail'];
$password = $_POST['teacher-password'];
echo "name = ".$name;
$con = new mysqli('localhost', 'root', '', 'college portal');
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

$sql = "INSERT INTO login_staff (name, phone, mail_id, password) VALUES ('$name', '$phone', '$email_id', '$password')";
$r = mysqli_query($con, $sql);

if ($r) {
    header("Location: http://localhost/final%20year%20project/index.html");
    exit();
} else {
    echo "Error: " . mysqli_error($con);
}

$con->close();
?>
