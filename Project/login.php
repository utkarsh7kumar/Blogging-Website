<?php
//     $username = $_POST['username'];
//     $password = $_POST['password'];

// //database connection

//     $conn = new mysqli('localhost', 'root', '', 'project');
//     if($conn->connect_error){
//         die('Connection Failed : '.$conn->connect_error);
//     }
//     else{
//         $stmt = $conn->prepare("insert into login(username, password)values(?, ?)");
//         $stmt->bind_param("ss", $username, $password);
//         $stmt->execute();
//         echo "Registration Successfully done...";
//         $stmt->close();
//         $conn->close();

//     }
//     header('location:index.html');

include("register.php");

if(isset($_POST['login'])){
    $username= $_POST['username'];
    $password= $_POST['password'];

    $username_search = "select * from registration where email= '$username'";
    $query= mysqli_query($con,$username_search );
    $email_count = mysqli_num_rows($query);
    if($email_count){
         $email_pass = mysqli_fetch_assoc($query);
         $db_pass = $email_pass['password'];
         $pass_decode = password_verify($password, $db_pass);
         if($pass_decode){
                header('location:index.html');
               ?>
               
               <?php
         }
         else{
            ?>
                  <script>
                      alert("Incorrect password");
                     </script>
                 <?php
         }

    }
    else{
        ?>
                  <script>
                      alert("Invalid email");
                     </script>
                 <?php
    }

}
?>
