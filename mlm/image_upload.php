<?php 
if(isset($_POST['submit'])){
 
 // Count total files
 $countfiles = count($_FILES['file']['name']);

 // Looping all files
 for($i=0;$i<$countfiles;$i++){
  $filename = $_FILES['file']['name'][$i];
 
  // Upload file
  move_uploaded_file($_FILES['file']['tmp_name'][$i],'uploads/'.$filename);
 
 }
} 
?>
<form method='post' action='' enctype='multipart/form-data'>
 <input type="file" name="file[]"  multiple>

 <input type='submit' name='submit' value='Upload'>
</form>