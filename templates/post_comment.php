<?php
       $servername = "localhost";
       $username = "shanehastings";
       $password = "shanehastings123";
       $dbname = "blog";
   

       if($_SERVER["REQUEST_METHOD"] == "POST"){



        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        // Dont trust user input lol
        $name = mysqli_real_escape_string($conn, $_POST["name"]);
        $comment = mysqli_real_escape_string($conn, $_POST["comment"]);
    
        $sql = "INSERT INTO comments (comment, name)
        VALUES ('".$comment."', '".$name."')";
    
        if ($conn->query($sql) === TRUE) {
            echo "work";
        } else {
            echo "not-work" . $conn->error;
        }
    
        $conn->close();
    }
   
       // Check connection
       if ($conn->connect_error) {
         die("Connection failed: " . $conn->connect_error);




    

?>