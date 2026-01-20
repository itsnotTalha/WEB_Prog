<?php
$base = 1;
$n = $_POST['n'];

for($i = 1; $i<$n; $i++){
    echo "$base + ";
    $base = pow($base,2) + 2;
}

echo "$base";
?>

<form action="" method="post">
    Enter n : <input type="number" name="n">
    <br>
    <button>Submit</button>
</form>