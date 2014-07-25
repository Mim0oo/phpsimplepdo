<?php
//Including main files
include 'acccheck.php'; //Access control for IP
include 'db_connect.php'; //Lets get to the DB, shell we
$tbl_name = 'members';

ob_start();
session_start();

// Connect to server and select databse.
$conn = connect();

// Define $myusername and $mypassword
$myusername=$_POST['myusername'];
$mypassword=$_POST['mypassword'];

// To protect MySQL injection
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysql_real_escape_string($myusername);
$mypasswordcrypt = md5(mysql_real_escape_string($mypassword)); // Passwords in the database must be MD5 encrypted
$mypasswordwrong = mysql_real_escape_string($mypassword);

// Checking for existing pair of username and password
$sql="SELECT * FROM $tbl_name WHERE username=:myusername and password=:mypasswordcrypt";

$statement = $conn->prepare($query);
		$statement->execute(array(
			':myusername' => $myusername,
			':mypasswordcrypt' => $mypasswordcrypt));
 
	//	if($statement){echo 'Debug: Successful username check.<br />';
		}
	}


//  Counting table found rows
$count = $statement->fetchColumn(); 

// If result matched $myusername and $mypassword, table row count must be 1 row
$ip = $_SERVER['REMOTE_ADDR'];

if($count==1){

   // Register $myusername, $mypassword and redirect to main user interface"
   $_SESSION['myusername']=$myusername;
   $_SESSION['mypassword']=$mypassword;
   // Register audit information in members table
   $timezone  = +2; // Set timezone for attepmt time
   $mysqldate = gmdate("Y/m/j H:i:s", time() + 3600*($timezone+date("I"))); 
   $message = "<font color=#006600>Successful login</font>";
   $audit="INSERT INTO `audit` (`action` ,`member_id` ,`before` ,`now` ,`act_time` ,`item_id`, `ip`) VALUES ('$message', '$myusername', '-', '-', '$mysqldate', '-','$ip')";
   $lastlogin="UPDATE members SET last_login='$mysqldate' WHERE username='$myusername'";
   //PDO query execution need to be added here 
   
   header("location:admin.php");
}

else {

   echo "Wrong Username or Password";
   $timezone  = +2; // Set timezone for attepmt time
   $mysqldate = gmdate("Y/m/j H:i:s", time() + 3600*($timezone+date("I"))); 
   $message = "<font color=red>Unsuccesful login attempt</font>";
   $audit="INSERT INTO `audit` (`action` ,`member_id` ,`before` ,`now` ,`act_time` ,`item_id`, `ip`) VALUES ('$message', '$myusername, $mypasswordwrong', '-', '-', '$mysqldate', '-', '$ip')";
   //PDO query execution need to be added here 
  
   ?>
   
   <meta http-equiv="refresh" content="0; url=index.php"> <?
}

ob_end_flush();
?>