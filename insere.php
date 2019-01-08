
<?php
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "manchu";

    $a = $_POST['teste'];

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
 
    if ($conn->query($a) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $a . "<br>" . $conn->error;
    }

    $conn->close();

//$questoes = "<script>document.write(questoes)</script>";
//echo $;      
header('Location: index.php');
?>