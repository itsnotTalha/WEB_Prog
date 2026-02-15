<form action="" method="POST">
	<label for="">CT 1: </label>
	<input type="number" name="ct1" id=""> <br>
	<label for="">CT 2: </label>
	<input type="number" name="ct2" id="">
	<br>
	<label for="">CT 3: </label>
	<input type="number" name="ct3" id="">
	<br>
    <label for="">Midterm Marks : </label>
	<input type="number" name="mid" id="">
	<br>
    <label for="">Final Marks : </label>
	<input type="number" name="final" id="">
	<br>
	<button>Calculate Total</button>
</form>

<?php
	$ct1 = $_POST['ct1'];
	$ct2 = $_POST['ct2'];
	$ct3 = $_POST['ct3'];
	$mid = $_POST['mid'];
	$final = $_POST['final'];

//calculating max this way cus i forgot the easier way

$max1 = max($ct1, $ct2);
$max1 = max($max1, $ct3);

if($ct1==$max1) $ct1 = 0;
elseif($ct2==$max1) $ct2 = 0;
else $ct3 = 0;

$max2 = max($ct1, $ct2);
$max2 = max($max2, $ct3);

$avrg = ($max1+$max2)/2;

echo "Best two CT's Total: " . $max1+$max2 . "<br>";
echo "Best two CT's Avg: " . $avrg . "<br>";
echo "Mid mark: " . $mid . "<br>";
echo "Final marks: " . $final . "<br><br>";

// Question asked for CT's average but the sample output did not calculate the avg of ct. Heres i added that part too
// $total = $mid + $final + $max1 + $max2;

$total = $mid + $final + $avrg;

echo "Total marks: " . $total . "<br>";

if($total>54) echo "Status: Passed";
else echo "Status: Failed";
?>