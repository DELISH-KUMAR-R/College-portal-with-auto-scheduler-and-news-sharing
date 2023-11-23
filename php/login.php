<?php
$name = $_POST['student-username'];
$phone = $_POST['student-phone'];
$email_id = $_POST['student-mail'];
$password = $_POST['student-password'];
echo "name = ".$name;
$con = new mysqli('localhost', 'root', '', 'college portal');
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

$sql = "INSERT INTO login_stu (name, phone, mail_id, password) VALUES ('$name', '$phone', '$email_id', '$password')";
$r = mysqli_query($con, $sql);

if ($r) {
    header("Location: http://localhost/final%20year%20project/index.html");
    exit();
} else {
    echo "Error: " . mysqli_error($con);
}

$con->close();
?>
