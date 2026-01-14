<?php
    $pass = $_POST['pass'];
    $total=0;
    $isUpper = FALSE;
    $islower = FALSE;
    $isNum = FALSE;
    $isSpec = FALSE;
    for($i=1; $i<=strlen($pass); $i++){
        if($i%2==0 and $i>6){
            $total+=10;
        }
        if($pass[$i]>='a' and $pass[$i]<='z'){
            $islower=TRUE;
        }
        elseif($pass[$i]>='A' and $pass[$i]<='Z'){
            $islower=TRUE;
        }elseif($pass[$i]>='0' and $pass[$i]<='9'){
            $isNum = TRUE;
        }else{
            $isSpec = TRUE;
        }
    }
    if($islower) $total+=15;
    if($isUpper) $total+=15;
    if($isNum) $total+=20;
    if($isSpec) $total+=25;

    if($total<=30 or strlen($pass)<6) echo "Very Weak";
    elseif($total>30 and $total<=50) echo "Weak";
    elseif($total>50 and $total<=70) echo "Medium";
    elseif($total>70 and $total<=90) echo "Strong";
    else echo "Very Strong";

?>

<h1>Enter Your Password: </h1>
<form action="" method="POST">
    <input type="password" name="pass" id="">
</form>

<!--
Length: +10 points for every 2 characters (minimum 6 characters required)
■ Uppercase letters: +15 points if present
■ Lowercase letters: +15 points if present
■ Numbers: +20 points if present
■ Special characters (!@#$%^&*): +25 points if present
○ Display strength levels: "Very Weak" (0-30), "Weak" (31-50), "Medium" (51-70),
"Strong" (71-90), "Very Strong" (91+)
○ If password reaches 100+ points, display "Perfect Password!" and show a success
message
○ Keep track of how many attempts the user has made
○ If the user makes more than 8 attempts without reaching "Strong" level, display
"Need practice!" and suggest password tips
-->