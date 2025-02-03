<?php
include("config.php");

session_start();

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM user_info WHERE username='$username'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        if ($password === $row['password']) {    
            $_SESSION['password'] = $row['password'];  
            $_SESSION['username'] = $row['username'];  

            
            header("Location: home.html");
            exit();
        } else {
            
            $_SESSION['error'] = 'Incorrect password. Please try again.';
            header("Location: login.php");
            exit();
        }
    } else {
        $_SESSION['error'] = 'Username doesn’t exist.';
        header("Location: login.php");
        exit();
    }
}
?>


