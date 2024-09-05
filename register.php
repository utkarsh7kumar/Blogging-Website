<?php
    $username = $_POST['username'];
    $emails = $_POST['emails'];
    $psw = $_POST['psw'];
    

//database connection

    
    $conn = new mysqli('localhost', 'root', '', 'project');
    if($conn->connect_error){
        die('Connection Failed : '.$conn->connect_error);
    }
    else{
        $stmt = $conn->prepare("insert into registration(username, email, password)values(?, ?, ?)");
        $stmt->bind_param("sss", $username, $emails, $psw);
        $stmt->execute();
        echo "Registration Successfully done...";
        $stmt->close();
        $conn->close();
    }
    header('location:index.html');

    // if(isset($_POST['register']))
    // {
    //     $username = $_POST['username'];
    //     $emails = $_POST['emails'];
    //     $psw = $_POST['psw'];
    //     $cpsw = $_POST['cpsw'];
        
    //     $email_query = "SELECT * FROM registration WHERE email='$emails' ";
    //     $email_query_run = mysqli_query($connection, $email_query);

    //     if(mysqli_num_rows($email_query_run) > 0)
    //     {
    //         echo "Email Already Exists.";
    //         header('location: LOGINSIGNUP.html');
    //     }

    //     else 
    //     {
    //         if($psw == $cpsw)
    //         {
    //             $query = "INSERT INTO registration(username, email, password, confirm_password) VALUES('$username', '$emails', '$psw', '$cpsw')";
    //             $query_run = mysqli_query($connection, $query);

    //             if($query_run)
    //             {
    //                 echo "Registered Successfully";
    //                 header('location: index.html');
    //             }
    //             else 
    //             {
    //                 echo "Could Not Register";
    //                 header('location: index.html');
    //             }
    //         }
    //         else 
    //         {
    //             echo "Password and Confirm Password do not match";
    //             header('location: index.html');
    //         }
    //     }
        

    // }


?>