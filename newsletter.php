<?php
session_start();
include "include/dbconfig.php";
include "include/functions.php";

if (isset($_POST["submit"])) {
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = test_input($_POST["email"]);
        // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        } else {
            $email = $_POST["email"];
            mysqli_query($connect, "INSERT INTO `newsletter`(`newsletter_email`) VALUES ('$email')");
        }
    }
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

alert(isset($emailErr) ? $emailErr : "Subscribed to newsletter");
historyBack();
