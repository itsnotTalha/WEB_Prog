<?php
$base1 = 1;
$base2 = 3;

    $n = (int)$_POST['n'];

    if ($n >= 1) {
        echo $base1;
    }

    if ($n >= 2) {
        echo " + " . $base2;
    }

    for ($i = 3; $i <= $n; $i++) {
        $next = $base1 + $base2;
        echo " + " . $next;
        $base1 = $base2;
        $base2 = $next;
    }
?>

<form action="" method="post">
    Enter n : <input type="number" name="n" min="1" required>
    <br>
    <button type="submit">Submit</button>
</form>
