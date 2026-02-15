
<?php
$server = "localhost";
$username = "root";
$password = "";
$dbname = "campus_library";

$conn = new mysqli($server, $username, $password, $dbname);

if($conn -> connect_error){
	die("failed: " . $conn->connect_error);
}else echo "Bluetooth connected successfullly <br>";

//-----------------------------1st-------------------
$sql1 = "SELECT Status, Count(*) as count
            FROM book_loans
            GROUP BY Status
            Having count>0";

$result = $conn->query($sql1);

if($result-> num_rows > 0){
    while($row = $result->fetch_assoc()){
        echo $row['Status'] . " | " . $row['count'] . "<br>";
	}
}

//-----------------------------2nd-------------------
$sql2 = "UPDATE book_loans
        SET 
        Status = 'Grace Period', PenaltyFee = 0.0
        WHERE Status='Overdue' AND DaysOverdue<7";

$result = $conn -> query($sql2);


//-----------------------------3rd-------------------
$sql3 = "UPDATE book_loans
        SET 
        PenaltyFee = PenaltyFee*1.1
        WHERE PenaltyFee>20 AND PenaltyFee*1.1<=50";

$result = $conn -> query($sql3);

//-----------------------------4th-------------------
$sql4 = "SELECT BookTitle, SUM(PenaltyFee) as totalFee 
        FROM book_loans 
        GROUP BY BookTitle 
        ORDER BY(totalFee) DESC";

$result = $conn -> query($sql3);


//-------------Extra----------------

$sql = "SELECT * FROM book_loans";
$result = $conn -> query($sql);

if($result-> num_rows > 0){
	while($row = $result->fetch_assoc()){
		echo $row['LoanID'] . " | " . $row['StudentName'] . " | " . $row['BookTitle'] . " | " . $row['DaysOverdue'] . " | " .
        $row['PenaltyFee'] . " | " . $row['Status']. " <br> ";
	}
}

if(mysqli_close($conn)===TRUE){
    echo "Bye Bye... <br>";
}

?>