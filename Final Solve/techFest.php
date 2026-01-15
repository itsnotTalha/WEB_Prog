<form action="" method="POST">
    <label for="">Number of Attendees</label>
    <input type="number" name="attendee"> <br>
    <label for="">Cost Per Person</label>
    <input type="number" name="cost"> <br>
    <label for="">Max Capacity</label>
    <input type="number" name="cap"> <br>
    <button>Submit</button>
</form>

<?php
    $attendee = $_POST['attendee'];
    $cost = $_POST['cost'];
    $cap = $_POST['cap'];

    $venue = ceil($attendee/$cap);

    $emptSeat = ($venue*$cap) - $attendee;

    $wastCost = $emptSeat*$cost;

    echo "$venue $emptSeat $wastCost <br>"
?>