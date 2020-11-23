<?php
$servername = "sql201.epizy.com";
$username = "epiz_27267730";
$password = "54rPCILVxua";
$dbname = "epiz_27267730_adsforrobux";

//o.o
$user = $_POST["user"];
$token = $_POST["token"];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT payout, tokens FROM users WHERE username = '" . $user . "'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
        if ($token >= 10){
        echo "exchanged successfully";
        $sql = "UPDATE users SET payout=(payout+1), tokens=(tokens-10) WHERE username = '" . $user . "'";
        if ($conn->query($sql) === TRUE) {
          
        } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
          
        }
  }
  else{
      echo "you need 10 or more tokens to exchange";
  }
}
} else {
  echo "Username does not exist";
}
$conn->close();
?>