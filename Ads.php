<?php
$servername = "sql201.epizy.com";
$username = "epiz_27267730";
$password = "54rPCILVxua";
$dbname = "epiz_27267730_adsforrobux";

//o.o
$userValue = $_POST["userValue"];
$tokenValue = $_POST["tokenValue"];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT tokens, payout FROM users WHERE username = '" . $userValue . "'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $payout = $row["payout"];
      echo "$payout";
        $sql = "UPDATE users SET tokens=(tokens+1) WHERE username = '" . $userValue . "'";
        if ($conn->query($sql) === TRUE) {
          $tokenValue = "tokens";
        } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
        }
  }
} else {
  echo "Username does not exist";
}
$conn->close();
?>