<?php
     
    $email = $_POST['email'];

    //database connection
    $conn = new mysqli('localhost', 'root', '', 'project');
    if($conn->connect_error){
        die('Connection Failed: '.$conn->connect_error);
    }
    else{
        $stmt = $conn->prepare("insert into newsletter(email)values(?)");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->close();
        $conn->close();
    }
    header('location:index.html');

?>