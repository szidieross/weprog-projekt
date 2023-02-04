<?php

session_start();
require './database/dbcon.php';


// --------------------------------------------------------------------------------------------------------------------------------
// LOGIN
// --------------------------------------------------------------------------------------------------------------------------------



if (isset($_POST['login'])) {
    $user = mysqli_real_escape_string($con, $_POST['username']);

    $query = "SELECT * FROM users WHERE users.username = '$user'";
    $query_run = mysqli_query($con, $query);

    if (mysqli_num_rows($query_run) > 0) {
        foreach ($query_run as $user) {
            setcookie("username", $user['username']);
            setcookie("user_id", $user['user_id']);
        }
    }
    if ($query_run) {
        $_SESSION['message'] = "Logged in Successfully";
        header("Location: userLogin.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Logging in Not Successful";
        header("Location: booking.php");
        exit(0);
    }
}


// --------------------------------------------------------------------------------------------------------------------------------
// LOGOUT
// --------------------------------------------------------------------------------------------------------------------------------



if (isset($_POST['logout'])) {
    $user = mysqli_real_escape_string($con, $_POST['username']);

    $query = "SELECT * FROM users WHERE users.user_id = 1";
    $query_run = mysqli_query($con, $query);

    if (mysqli_num_rows($query_run) > 0) {
        foreach ($query_run as $user) {
            setcookie("username", $user['username'], time() - 3600);
            setcookie("user_id", $user['user_id'], time() - 3600);
        }
    }

    if ($query_run) {
        $_SESSION['message'] = "Logged out Successfully";
        header("Location: userLogin.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Logging out Not Successful";
        header("Location: booking.php");
        exit(0);
    }
}



// --------------------------------------------------------------------------------------------------------------------------------
// ADD APPOINTMENT
// --------------------------------------------------------------------------------------------------------------------------------



if (isset($_POST['add_appointment'])) {
    $id = mysqli_real_escape_string($con, $_POST['appointment_id']);

    $user = $_COOKIE['username'];
    $query1 = "SELECT users.user_id FROM users WHERE users.username = '$user'";
    $query_run1 = mysqli_query($con, $query1);
    if (mysqli_num_rows($query_run1) > 0) {
        foreach ($query_run1 as $user) {
            $userid = $user['user_id'];
            $query = "UPDATE appointments SET taken=true, user_id='$userid' WHERE appointment_id='$id'";
        }
    }

    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $_SESSION['message'] = "Appointment booked successfully";
        header("Location: booking.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Appointment not booked";
        header("Location: booking.php");
        exit(0);
    }
}



// --------------------------------------------------------------------------------------------------------------------------------
// DELETE APPOINTMENT
// --------------------------------------------------------------------------------------------------------------------------------



if (isset($_POST['delete_appointment'])) {
    $id = mysqli_real_escape_string($con, $_POST['appointment_id']);

    $query = "UPDATE appointments SET taken=false, user_id=NULL WHERE appointment_id=$id";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $_SESSION['message'] = "Appointment Deleted Successfully";
        header("Location: booking.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Appointment Not Deleted";
        header("Location: booking.php");
        exit(0);
    }
}



// --------------------------------------------------------------------------------------------------------------------------------
// DELETE BOOKING
// --------------------------------------------------------------------------------------------------------------------------------



if (isset($_POST['delete_booking'])) {
    $id = mysqli_real_escape_string($con, $_POST['appointment_id']);
    $query = "UPDATE appointments SET taken=false, user_id=NULL WHERE appointment_id=$id";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $_SESSION['message'] = "Appointment Deleted Successfully";
        header("Location: userLogin.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Appointment Not Deleted";
        header("Location: userLogin.php");
        exit(0);
    }
}

?>