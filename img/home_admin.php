<?php 
include('dbcon.php');
include('session.php'); 

$result=mysqli_query($con, "select * from users where id='$session_id'")or die('Error In Session');
$row=mysqli_fetch_array($result);

 ?>

<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="form-wrapper"> 
    <center><h3>Welcome: <?php echo $row['username']; ?> </h3></center>
    	<?php
	session_start(); //starts the session
	if($_SESSION['admin']){ //checks if user is logged in
	}
	else{
		header("location:index.php"); // redirects if user is not logged in
	}
	$user = $_SESSION['user']; //assigns user value
	?>
	<body>
		<h2>Home Page</h2>
		<p>Hello <?php Print "$user"?>!</p> <!--Displays user's name-->
		<form action="add.php" method="POST">
			Add more to list: <br>
            <input type="text" name="id"/><br/>
			 <input type="text" value="username"/><br/>
            <input type="password" value="password"/><br/>
			<input type="submit" value="Add to list"/>
		</form>
		<h2 align="center">My users</h2>
		<table border="1px" width="100%">
			<tr>
				<th>Id</th>
				<th>Username</th>
				<th>Password</th>
			</tr>
			<?php
				mysql_connect("localhost", "root","") or die(mysql_error()); //Connect to server
				mysql_select_db("login") or die("Cannot connect to database"); //connect to database
				$query = mysql_query("Select * from users"); // SQL Query
				while($row = mysql_fetch_array($query))
				{
					Print "<tr>";
						Print '<td align="center">'. $row['id'] . "</td>";
						Print '<td align="center">'. $row['username']."</td>";
						Print '<td align="center">'. $row['password']."</td>";
						
				}
			?>
		</table>
    
	 <div class="reminder">
    <p><a href="logout.php">Log out</a></p>
  </div>
</div>

</body>
</html>