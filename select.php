
<?php
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "manchu";

    $a = "SELECT id, per, a, b, c, d, e, rc, img FROM questoes WHERE id = 50";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);



    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
 
    if ($conn->query($a) === TRUE) {
        $result = $conn->query($a);
        echo $result;
    } else {
        $result = $conn->query($a);
        echo $result;
    }

    $conn->close();


//$questoes = "<script>document.write(questoes)</script>";
//echo $;      

?>