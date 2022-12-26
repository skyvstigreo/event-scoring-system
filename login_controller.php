<?php
// session_start();
require "pdo-connection.php";
$errors = array();

if (isset($_POST['login'])) {
    $email =  $_POST['email'];
    $password =  $_POST['password'];
    $query = "SELECT * FROM table_user WHERE username = '$email'";
    $statement = $connect->prepare($query);
    $statement->execute();
    $filtered_rows = $statement->rowCount();
    if ($filtered_rows > 0) {
        $result = $statement->fetch();
        $fetch_pass = $result['password'];
        $fetch_access = $result['user_type'];
        // $username = $result['username'];
        $uid = $result['user_id'];
        if (password_verify($password, $fetch_pass)) {
            $_SESSION['type'] = $fetch_access;
            if ($fetch_access == "0") {
                $_SESSION['user_id'] = $uid;
                header('location: admin_dashboard.php');
            } else {
                $_SESSION['user_id'] = $uid;
                header('location: user_dashboard.php');
            }
        } else {
            $errors['email'] = "Incorrect email or password!";
        }
    } else {
        $errors['email'] = "It looks like you're not yet a member! Click on the Register button above.";
    }
}
