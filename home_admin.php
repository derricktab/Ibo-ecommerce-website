<?php
include('dbcon.php');
include('session.php');

$result=mysqli_query($con, "select * from admin where id='$session_id'")or die('Error In Session');
$row=mysqli_fetch_array($result);

 ?>

<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <h3>Welcome: <?php echo $row['username']; ?>!</h3>
<div class="form-wrapper">

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
	
</div>
  <p><a href="logout.php" style="float:right" class="btn btn-full">Log out</a></p>
<style>
.main-nav
{
    list-style: none;
    margin-top: 16px;
}
.main-nav li
{
 display: inline-block;
    margin-right: 20px;
    margin-bottom: 100x;
}
.main-nav li a
{
 color: white;
    text-decoration: none;
    font-size: 90%;
    font-family: mv boli;
}
.main-nav li a:hover
{
    color: #e67e22;
    border-bottom: 2px solid #e67e22;
    transition: 0.5s all ease-in ;
    padding: 15px 0;
}
  h3
   {
       color:#e67e22;
       float:left;
   }
   .btn-full
      {
      background-color: #e67e22;
      color:white;
      transition: all 0.5s ease-in;
      }
      .btn
    {
        border:2px  solid #e67e22;
        padding: 3px 15px;

        text-decoration: none;
        border-radius: 12px;
        margin-right: 15px;
    }
    body
        {
            background-image:linear-gradient(rgba(0,0,0,0.7),rgba(0,0,0,0.7)),url('img/logo.png');
        }
 </style>
</body>
</html>
