<?php
// DB Connection
$conn = new mysqli("localhost", "root", "", "formdb");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$name      = $_POST['name'];
$email     = $_POST['email'];
$age       = $_POST['age'];
$password  = password_hash($_POST['password'], PASSWORD_DEFAULT); // secure
$gender    = $_POST['g1'] ?? '';
$fruits    = isset($_POST['g2']) ? implode(",", $_POST['g2']) : '';
$color1    = $_POST['color1'] ?? '';
$color2    = $_POST['color2'] ?? '';
$color3    = $_POST['color3'] ?? '';
$dob       = $_POST['g4'];
$time      = $_POST['g5'];
$rating    = $_POST['g6'];
$country   = $_POST['country'];
$address   = $_POST['address'];

// Handle file upload
$photo = "";
if(isset($_FILES['file'])) {
    $photo = "uploads/" . basename($_FILES["file"]["name"]);
    move_uploaded_file($_FILES["file"]["tmp_name"], $photo);
}

// Insert into database
$sql = "INSERT INTO users (name, email, age, password, gender, fruits, fav_color1, fav_color2, fav_color3, dob, time, rating, country, address, photo)
        VALUES ('$name', '$email', '$age', '$password', '$gender', '$fruits', '$color1', '$color2', '$color3', '$dob', '$time', '$rating', '$country', '$address', '$photo')";

if ($conn->query($sql) === TRUE) {
    echo "Data inserted successfully!";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>
