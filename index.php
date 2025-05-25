<?php

$servername = getenv('MYSQL_HOST');
$username = getenv('MYSQL_USER');
$password = getenv('MYSQL_PASSWORD');
$dbname = getenv('MYSQL_DATABASE');

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get visitor information
$ip = $_SERVER['REMOTE_ADDR'];
$page = $_SERVER['REQUEST_URI'];
$user_agent = $_SERVER['HTTP_USER_AGENT'];

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO visits (ip, page, user_agent) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $ip, $page, $user_agent);

// Execute and check
if ($stmt->execute()) {
    // echo "New record created successfully"; // Optional: for debugging
}
// else {
//     echo "Error: " . $stmt->error; // Optional: for debugging
// }

$stmt->close();
$conn->close();

?>

<!DOCTYPE html>
<html>
<head>
<title>Visit Tracker</title>
</head>
<body>

<h1>Welcome to Visit Tracker!</h1>
<p>Your visit has been logged.</p>

</body>
</html> 