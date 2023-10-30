<html>
<body>

<iframe width="560" height="315" src="https://www.youtube.com/embed/yWjavxcGfqM?si=mLrc4PXd0vkHxAr-" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>

<form action="index.php" method="post">
    Name: <input type="text" name="name"><br>
    Email: <input type="email" name="emailRequest"><br>
    Comment: <textarea name="comment"></textarea><br>
    <input type="submit" value="Submit">
</form>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "challenge_module_13";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";


$sql = "SELECT id, name, date, email, comment FROM comments";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      echo "id: " . $row["id"]. " - name: " . $row["name"]. " " . $row["email"]. "<br>" . $row["comment"] . "<br>";
    }
  } else {
    echo "0 results";
  }

  // Post request
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    if (empty($name)) {
      echo "Name is empty";
    } else {
      echo "<br>" . $name . ": <br>";
    }
    $commentText = $_POST['comment'];
    if (empty($commentText)) {
      echo "comment is empty";
    } else {
      echo $commentText;
    }
    $emailRequest = $_POST['emailRequest'];
    if (empty($emailRequest)) {
      echo "email is empty";
    } else {
      echo "<br>" . $emailRequest;
    }

    $sql = "INSERT INTO comments (name, comment, email)
    VALUES ('$name', '$commentText', '$emailRequest ')";
    
    if ($conn->query($sql) === TRUE) {
        echo "<br>New record created successfully";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
  }

  require 'vendor/autoload.php';

use Carbon\Carbon;

printf("Now: %s", Carbon::now());

$post_date = Carbon::createFromDate('2023-10-23 08:34:00');

echo 'post_date = ' .  $post_date;

  $conn->close();
?>


</body>
</html>