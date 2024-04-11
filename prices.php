<link rel="stylesheet" href="pittex.css"/>
<p>
<?php

if(isset($_POST['calculate'])):

echo "Number of cds rented: ";
echo $_POST['cdrented'];
echo "<br>";

echo "Number of dvds rented: ";
echo $_POST['dvdrented'];
echo "<br>";

echo "Number of tapes rented: ";
echo $_POST['taperented'];
echo "<br>";

echo "Rent period: ";
echo $_POST['rentdays'];
echo "  days <br>";

echo "Amount paid by the customer: shs ";
echo $_POST['amount'];
echo "<br>";

$cdr=($_POST['cdrented']);
$amtcdr=$cdr*1500;
echo "Total amount from renting cds: shs ";
echo "$amtcdr";
echo "<br>";

$dvdr=($_POST['dvdrented']);
$amtdvdr=$dvdr*1500;
echo "Total amount from renting dvds: shs ";
echo "$amtdvdr";
echo "<br>";

$taper=($_POST['taperented']);
$amttaper=$taper*1500;
echo "Total amount from renting tapes: shs ";
echo "$amttaper";
echo "<br>";

$totalrent=($amtcdr+$amtdvdr+$amttaper);
echo "Total amount from renting: shs ";
echo "$totalrent";
echo "<br><br>";

$day=($_POST['rentdays']);

if($day>10 && $day<=15){
    $amtday=(0.08*$totalrent);
    $pay=($amtday+$totalrent);
    echo "Extra charge: ";
    echo "$amtday";
    echo "<br>";
    echo "Total amount to be paid by the customer: shs ";
    echo "$pay";
    echo "<br>";
}
elseif($day>15){
    $amtday=(0.1*$totalrent);
    $pay=($amtday+$totalrent);
    echo "Extra charge: ";
    echo "$amtday";
    echo "<br>";
    echo "Total amount to be paid by the customer: shs ";
    echo "$pay";
    echo "<br>";
}
else{
    $amtday=0;
    $pay=$totalrent;
    echo "No extra charge!!<br>";
    echo "Total amount to be paid by the customer: shs ";
    echo "$totalrent";
    echo "<br>";
}
$payment=($_POST['amount']);
if($payment<$pay){
    $bal=($pay-$payment);
    echo "You have an unpaid debt of shs ";
    echo "$bal";
}
elseif($payment==$pay){
    $bal=0;
    echo "You have sucessfully made your payment!!";
    echo "Balance: shs .$bal";
}
elseif($payment>$pay){
    $bal=($payment-$pay);
    echo "Your balance is shs ";
    echo "$bal";
}
else{
    echo "No payment has been made.";
    echo "Please make your payment to complete this transaction";
}
?>
<html>
<head><title>price</title>

</head>


<br><br>
<a class="p2" href="prices.php">Return</a>

</p>

<body>
<?php else: ?>
<center>
<div class= "mydiv">
<h1>PITTEX VIDEO LIBRARY</h1><br>
</div>

<div class="mydiv1">
<br>
<p class="p2">Go to <a href="pittex.php">Buying </a></p>
</div>
<br><br>
<h2>RENTING </h2>
<br>

<form action="" method="POST">
<p>Enter number of cds rented:</p>
<input name=cdrented type="number" placeholder="cds" required><br>
<p>Enter number of dvds rented:</p>
<input name=dvdrented type="number" placeholder="dvds" required><br>
<p>Enter number of tapes rented:</p>
<input name=taperented type="number" placeholder="tapes" required><br>
<p>Rent period:</p>
<input name=rentdays type="number" placeholder="days" required><br>
<p>Enter amount the customer has paid:</p>
<input name=amount type="number" placeholder="amount paid" required><br>
<input type="hidden" name="calculate" value="1">
<br><br>
<button type="calculate">submit</button>
</form>

</center>
<?php endif;?>
</body>

</html>