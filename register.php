<!DOCTYPE html>
<html>
<head>
<title>
Registration
</title>
<style>

.error {color: #FF0000;}

th {
  text-align: left;
}
</style>

<?php
// define variables and set to empty values
$fnameErr = $lnameErr = $emailErr = $genderErr =  "";
//$websiteErr = "";
$fname = $lname= $email = $gender = "";
// $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["fname"])) {
    $fnameErr = "First name is required";
  } else {
    $fname = test_input($_POST["fname"]);
  }
  
  if (empty($_POST["lname"])) {
    $lnameErr = "Last name is required";
  } else {
    $lname = test_input($_POST["lname"]);
  }
  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
  }
  
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
  ?>

</head>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
<body>
<fieldset>
<legend>Basic Information</legend>
<center>
<table>
<tr>
<th><label for="fname">First Name:</label></th>
<td><input type="text id="fname" name="fname"></td>
<td><span class="error"> * <?php echo $fnameErr;?></span></td>
</tr>
<tr>
<th><label for="lname">Last Name:</label></th>
<td><input type="text id="lname" name="lname"></td>
<td><span class="error"> * <?php echo $lnameErr;?></span></td>
</tr>
<tr>
<th><label for="gender">Gender:</label></th>
<td>
<input type="radio" id="male" name="gender" value="male">
<label for="male">Male</label>
<input type="radio" id="female" name="gender" value="female"
<label for="female">Female</label>
</td>
<td><span class="error"> * <?php echo $genderErr;?></span></td>
</tr>
<tr>
<th><label for="email">Email:</label></th>
<td><input type="email" id="email" name="email"></td>
<td><span class="error"> * <?php echo $emailErr;?></span></td>
</tr>
<tr>
</table>
</fieldset>
<input type="submit" name="submit" value="Submit">
<input type="reset">
</center>
</body>
</html>

<?php
$myfile = fopen("data.txt","a") 
	or die ("Unable to open the file");
$array = array($fname,$lname,$gender,$email);
$val = "";
if(in_array($val,$array)){
		echo "";
}
else{
	fputs($myfile,"First Name:".$fname."\n"."Last Name:".$lname."\n"."Gender:".$gender."\n"."Email:".$email."\n");
}
fclose($myfile);

?>