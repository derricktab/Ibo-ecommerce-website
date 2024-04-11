<?php
include('dbcon.php');
include('session.php');

$result=mysqli_query($con, "select * from users where id='$session_id'")or die('Error In Session');
$row=mysqli_fetch_array($result);
$id = $row['id'];

$email = $row['email'];
$username = $row['username'];
$referrer = $row['refer'];
$fullname = $row['fullname'];
 ?>

<html>
<head>

 <title>User Dashboard</title>
<style>
    body {
        background-color: white;
    }

</style>
</head>

<body>
<?php include 'header.php' ?>

<div style = "padding: 20px;">
    Welcome <?php echo $fullname ?>
    <hr>
</div>

<div style = "padding: 20px;">
    Your referral link is gonna be: <a href="register.php?refer=<?php echo $username ?>"> localhost/jid/register.php?refer=<?php echo $username ?> </a>
<br>
your referrer is : <?php echo $referrer ?>

</div>
<span style = "padding: 20px;"><a href="logout.php">LOGOUT</a></span>

<?php include 'footer.php' ?>

</body>

</html>
