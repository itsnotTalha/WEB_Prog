<?php
$quantity = $_POST['quantity'];
$hd = $_POST['hd'];
$tip = $_POST['tip'];

$base = 12.5;
$base = $base*$quantity;

if($quantity>=1 and $quantity<=9){
    $base = $base*0.9;
}else if($quantity<=19){
    $base = $base * 0.95;
}else if($quantity>=20){
    $base = $base * 1;
}

if($hd=='ctg'){
    $base += 40;
}

if($hd=='dhk'){
    $base *= 1.15;
}

$base += $tip;

echo "Total Bill is : $base";

?>