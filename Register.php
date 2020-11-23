<?php
$servername = "adsforrobux.infinityfreeapp.com";
$username = "adsfor_user";
$password = "davidisatranny69420";
$dbname = "adsfor_adsforrob";

//o.o
$loginUser = $_POST["loginUser"];
$loginPass = $_POST["loginPass"];
$loginEmail = $_POST["loginEmail"];


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully, now we will show the users.<br><br>";
$sql = "SELECT username FROM users WHERE username = '" . $loginUser . "'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  
  //tell user the username is taken
  echo "Username is already taken";
} else {
  echo "Creating user...";
  //insert the username and password into the database
  $sql = "INSERT INTO users (username, password, tokens, email) VALUES ('" . $loginUser . "', '" . $loginPass . "', 1, '" . $loginEmail . "')";
  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}
$conn->close();
?>