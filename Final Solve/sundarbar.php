<?php
$host = 'localhost';
$user = 'root';
$password = 'talha';
$database = 'sundarban';

$conn = new mysqli($host, $user, $password);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Connected successfully<br>";

$sql = "CREATE DATABASE IF NOT EXISTS `$database`";
if ($conn->query($sql) === TRUE) {
    echo "Database ready<br>";
}

$conn->select_db($database);

$tableSql = "
CREATE TABLE IF NOT EXISTS sales_data (
    id INT PRIMARY KEY,
    ProductName VARCHAR(100),
    CategoryID INT,
    CategoryName VARCHAR(100),
    Quantity INT,
    Revenue INT
)";
$conn->query($tableSql);

// $sqin = $conn->prepare(
//     "INSERT INTO sales_data
//     (id, ProductName, CategoryID, CategoryName, Quantity, Revenue)
//     VALUES (?, ?, ?, ?, ?, ?)"
// );


// if (!$sqin) {
//     die("Prepare failed: " . $conn->error);
// }

// $sqin->bind_param("isisii",$id, $prod_name, $catID, $cat_name, $quantity, $reven);

// $data = [
//     [1,'Laptop', 301, 'Electronics', 5, 350000],
//     [2,'Mouse', 301, 'Electronics', 15, 45000],
//     [3,'Chair', 302, 'Furniture', 8, 64000],
//     [4,'Desk', 302, 'Furniture', 6, 72000],
//     [5,'Bottle', 303, 'Accessories', 20, 30000]
// ];

// foreach ($data as $row) {
//     [$id, $prod_name, $catID, $cat_name, $quantity, $reven] = $row;
//     $sqin->execute();
// }

$sql = "Select * from sales_data;";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo
            $row['id'] . " " .
            $row['ProductName'] . " " .
            $row['CategoryID'] . " " .
            $row['CategoryName'] . " " .
            $row['Quantity'] . " " .
            $row['Revenue'] . "<br>";
    }
} else {
    echo "No records found.";
}

$sql = "SELECT CategoryName, SUM(Revenue) AS total_price
        FROM sales_data
        GROUP BY CategoryName;";
    
$res = $conn->query($sql);
echo "<hr>";
while($i = $res->fetch_assoc()){
    echo
    "Category Name: " . $i['CategoryName'] ." - - - - " .
    "Total Price: " . $i['total_price'] . " " . "<br>";
}
    
echo "<hr>";
$sqlt = "UPDATE sales_data
        SET CategoryName = 'Low Performing'
        WHERE Revenue < 40000
        ";

$res = $conn->query($sqlt);
    
    $sql = "Select * from sales_data;";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        echo
        $row['id'] . " " .
        $row['ProductName'] . " " .
            $row['CategoryID'] . " " .
            $row['CategoryName'] . " " .
            $row['Quantity'] . " " .
            $row['Revenue'] . "<br>";
    }
    
    echo "<hr>";

    $sqlt = "UPDATE sales_data
        SET Revenue = Revenue*1.2
        WHERE Revenue > 70000
        ";

$res = $conn->query($sqlt);

echo "<hr>";
    $sql = "Select * from sales_data;";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        echo
        $row['id'] . " " .
        $row['ProductName'] . " " .
            $row['CategoryID'] . " " .
            $row['CategoryName'] . " " .
            $row['Quantity'] . " " .
            $row['Revenue'] . "<br>";
    }
    
    echo "<hr>";
    $sqin->close();
$conn->close();

echo "Done";
?>
