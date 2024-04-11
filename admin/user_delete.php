
    <!-- dynamic content will be here -->
<?php
//including the database connection file
include '../dbcon.php';
include('../admin_session.php');

//getting id of the data from url
$id = $_GET['user_id'];
//deleting the row from table
$result = mysqli_query($con, "DELETE FROM users WHERE id=$id");

header("Location:/ibo/admin/agents.php");
?>
    