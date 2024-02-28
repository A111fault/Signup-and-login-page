<?php
$success=0;
$pass=0;
$user=0;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'connect.php';

    if (isset($_POST['signup'])) {
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $cpassword = md5($_POST['cpassword']);

        // Check if the user already exists
        $sql = "SELECT * FROM `dat` WHERE username='$username'";
        $result = mysqli_query($con, $sql);

        if ($result) {
            $num = mysqli_num_rows($result);
            if ($num > 0) {
               // echo "User already exists";
                $user=1;
            } else {
                if ($password === $cpassword) {
                    // Insert the new user into the database
                    $sql = "INSERT INTO `dat` (username, password) VALUES ('$username', '$password')";
                    $result = mysqli_query($con, $sql);
                    if ($result) {
                        //echo "Sign up successful";
                        $success=1;
                    }
                }else {
                    //echo "password didnot match";
                    $pass=1;
                }
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">

</head>
<body>
    <?php
    if($user){
       echo" <div class='alert alert-danger' role='alert'>
  User already exist
</div>";
}
if($success){
    echo" <div class='alert alert-success' role='alert'>
Sign up successfull
</div>";
}
if($pass){
    echo" <div class='alert alert-danger' role='alert'>
Password Didnot match.
</div>";
}

    ?>
    
</body>
</html>