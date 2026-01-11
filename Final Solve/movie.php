

<form method="POST">
    <label for="">Attendees</label>
    <input type="number" name="attend" placeholder="Attendees">
    <label for="">Seat Capacity</label>
    <input type="number" name="cap" placeholder="Attendees">
    <label for="">Ticket Price</label>
    <input type="number" name="price" placeholder="Attendees">
    <button>Submit
        
    </button>
</form>

<?php
    $rental_cost = 25000;
    
    function calculate_scrn ($attend, $cap, $price){
        $scrn_need = ceil($attend/$cap);
        $empt_seat = ($scrn_need*$cap) - $attend;
        $waste_money = $empt_seat*$price;
        echo "Total Sreens: $scrn_need <br>";
        echo "Empty Seat: $empt_seat <br>";
        echo "Wasted Money: $waste_money <br>";
    }

    $a = $_POST['attend'];
    $b = $_POST['cap'];
    $c = $_POST['price'];


    calculate_scrn($a, $b, $c);

?>