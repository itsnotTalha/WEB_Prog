
<form action="" method="POST">
    <button>Submit</button>
</form>


<?php
$host = 'localhost';
$username = 'root';
$password = 'talha';
$databse = 'uiutech_final';

$conn = new mysqli($host, $username, $password);
if($conn->connect_error){
    echo "Not connected!! <br>";
}else{
    echo "Connected Successfully...<br> <hr>";
}

$sql = "CREATE DATABASE IF NOT EXISTS `$database`";
if($conn->query($sql)===TRUE){
    echo "Database Created <br> <hr>";
}
$conn->select_db($database);

?>