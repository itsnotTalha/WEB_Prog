<?php
$host = "localhost";
$user = "root";
$password = "talha";
$database = "test1";

try{
    $conn = new mysqli($host, $user, $password, $database);
    echo "Connected successfully <br>";

    if($_SERVER["REQUEST_METHOD"] === "POST"){
        $name = $_POST['name'];
        $age = $_POST['age'];
        $sql = "insert into users (name, age) values ('$name', $age);";
        if($conn->query($sql)===TRUE){
            echo "Added Successfully <br>";
                $sql = "select * from users;";
                $res = $conn->query($sql);
                while($i = $res->fetch_assoc()){
                    echo "ID - ", $i['id'], "<br>";
                    echo "NAME - ", $i['name'], "<br>";
                    echo "Age - ", $i['age'], "<br>";
                }     
        }else{
            echo "Something went wrong <br>";
        }
    }
}
catch(mysqli_sql_exception){
    echo "Could not connect";
}
    
?>

<!-- php -S localhost:8000 -->

