<?php
session_start();
$target = 2000;
$msg = "";
if(!isset($_SESSION['total'])){
    $_SESSION['total'] = 0;
    $_SESSION['count'] = 1;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['calorie']) && $_POST['calorie'] !== '') {
    $cal =(int) $_POST['calorie'];
    $_SESSION['total']+=$cal;
    $_SESSION['count']++;
}

if($_SESSION['total']>=$target){
    $msg = "Goal reached! Stay mindful!";
}
else if($_SESSION['count']>10){
    $msg = "Be cautious of frequent snacking!";
}
else if($_SESSION['total']>800 and $_SESSION['total']<=1600 ){
    $msg = "Good progress, keep it balanced!";
}
else{
    $msg = "“You’re off to a healthy start!”";
}
?>

<form method="POST">
    <label> Entry #<?= $_SESSION['count']?> </label> <br>
    <input type="number" name="calorie">
    <button type="submit">Add Calorie</button><br>
</form>
<hr>
<h3>
    <?= $msg ?>
</h3>

