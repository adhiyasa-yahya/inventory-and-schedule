<?php 
include '../action/db_conn.php';

if (isset($_POST['submit'])) {

    $username = $_POST['username'];
    $userpass = $_POST['password'];  
    $hashedPW = hash('sha256', $userpass);

    $sql = mysqli_query($conn, "SELECT users.id, email , username, password, level.name, level.permission FROM users INNER JOIN level ON users.level = level.id  WHERE username = '$username' or email = '$username'");

    list($id, $email, $username, $password,$level,$permission) = mysqli_fetch_array($sql);

    if (mysqli_num_rows($sql) > 0) {

        if ($password==$hashedPW) {
        	session_start();
            $_SESSION['user_id'] = $id;
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $_POST['password'];
            $_SESSION['level']     = $level;
            $_SESSION['permission']     = $permission;

            header("refresh:0;url= ../dashboard");
            die();
        } else {
            header("Location: ../index?failed");
        }
    } else {
            header("Location: ../index?failed");
    }
}

?>