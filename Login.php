<?php
$servername = "sql201.epizy.com";
$username = "epiz_27267730";
$password = "54rPCILVxua";
$dbname = "epiz_27267730_adsforrobux";

//o.o
$loginUser = $_POST["loginUser"];
$loginPass = $_POST["loginPass"];
$tokenValue = $_POST["tokenValue"];


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT password, tokens, payout FROM users WHERE username = '" . $loginUser . "'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    
    if($row["password"] == $loginPass){
        $tokens = $row["tokens"];
        echo "$tokens";
         
    }
    else {
        echo "Wrong Credentials";
    }
  }
} else {
  echo "Username does not exist";
}
$conn->close();
?>