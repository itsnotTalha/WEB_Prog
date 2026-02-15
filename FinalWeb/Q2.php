<form action="" method="POST">
	<label for="">Number of item sold </label>
	<input type="number" name="itemSold" id=""> <br>
	<label for="">Number of Days </label>
	<input type="number" name="days" id="">
	<br>
	<label for="">Target</label>
	<input type="number" name="target" id="">
	<br>
	<button>Submit</button>
</form>

<?php
	$i = $_POST['itemSold'];
	$day = $_POST['days'];
	$target = $_POST['target'];

	$totalSold = $i * $day;

    echo "Total Items sold: " . $totalSold . "<br>";

    $status = "";
    if($totalSold>=500) $status = "Excellent";
    else if($totalSold>=300) $status = "Good";
    else if($totalSold>=150) $status = "Average";
    else $status = "Poor";

    echo "Performance: " . $status . "<br>";


    $goal = $target - $totalSold;

    $rslt = "";
    if($goal==0) $rslt = "Target met exactly (0";
    else if($goal<0) $rslt = " Above target by " . $goal*-1;
    else $rslt = " Below target by " . $goal;

    echo "Result: " . $rslt;


    echo "<table border=1><th>Total Items</th><th>Performance</th><th>Result</th>";

        echo "<tr><td>$totalSold</td><td>$status</td><td>$rslt</td>";

    echo "</table>";
?>