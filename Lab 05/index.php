<?php
$a = $_POST['quantity'];   
$b = $_POST['delivery'];   
$c = $_POST['address'];    
$d = $_POST['tip'];        

$price = 12.5;

function calculate_discount($quantity, $unitPrice){
    $total = $quantity * $unitPrice;


    if ($quantity <= 9) {
        return $total * 0.90; 
    } elseif ($quantity < 20) {
        return $total * 0.85;   
    } else {
        return $total * 0.80;  
    }
}

function calc_tax($amount, $address){
    if ($address == 'dhaka') {
        return $amount * 0.20;  
    } else {
        return $amount * 0.15; 
    }
}

/* Final calculation */
function calculate($quantity, $delivery, $address, $tip, $price){
    $prodPrice =  calculate_discount($quantity, $price);

    
    if ($delivery == 'home') {
        $prodPrice += 40; // delivery charge
    }
    $tax = calc_tax($prodPrice, $address);
    $prodPrice += $tax;
    $prodPrice += $tip;

    return $prodPrice;
}

echo "Total Price: " . calculate($a, $b, $c, $d, $price);
?>
