<?php
session_start();
$match=0;
$invalid=0;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'connect.php';
    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM `dat` WHERE username='$username' AND password='$password'";
        $result = mysqli_query($con, $sql);
        $num = mysqli_num_rows($result);

        if ($num > 0) {
            //echo "Login successful";
            $match=1;
            $_SESSION['username']=$username;
            header('location:welcom.php');
        } else {
            //echo "Invalid credentials";
            $invalid=1;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="css/bootstrap.css">
</head>

<body>
    <?php
    if($invalid){
        echo" <div class='alert alert-danger' role='alert'>
   Invalid Credential
 </div>";
 }
 if($match){
     echo" <div class='alert alert-success' role='alert'>
 Login successful
 </div>";
 }
    
    
    
    ?>
    
</body>

</html>