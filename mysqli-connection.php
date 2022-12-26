<?php


// localhost, my_user, my_password, db_name
 $con = mysqli_connect("localhost", "root", "","tabulation");

 $con -> set_charset("utf8");
//  session_start(); 

 

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

?>
