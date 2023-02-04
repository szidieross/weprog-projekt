<?php

session_start();
require 'dbcon.php';

// $query = "SELECT * FROM users WHERE users.user_id = 1";
// $query_run = mysqli_query($con, $query);

// if (mysqli_num_rows($query_run) > 0) {
//     foreach ($query_run as $user) {
//         setcookie("username", $user['username']);
//     }
// }



// --------------------------------------------------------------------------------------------------------------------------------
// LOGIN
// --------------------------------------------------------------------------------------------------------------------------------



if (isset($_POST['login'])) {
    $user = mysqli_real_escape_string($con, $_POST['username']);
    // $a_id = $id['appointment_id'];

    $query = "SELECT * FROM users WHERE users.username = '$user'";
    $query_run = mysqli_query($con, $query);

    if (mysqli_num_rows($query_run) > 0) {
        foreach ($query_run as $user) {
            setcookie("username", $user['username']);
        }
    }





    // setcookie("username", $user, time() + 3600);
    // if (isset($_COOKIE["username"])) {
    //     echo "jack hughes logged in successfully";
    // } else {
    //     echo "noooppppeeee";
    // }

    // $query = "UPDATE appointments SET taken=true, user_id=1 WHERE appointment_id=$id";
    // $query_run = mysqli_query($con, $query);

    if ($query_run) {
        // $_SESSION['message'] = "Student Deleted Successfully";
        header("Location: ../login/userLogin.php");
        exit(0);
    } else {
        // $_SESSION['message'] = "Student Not Deleted";
        header("Location: ../booking.php");
        exit(0);
    }
}


// --------------------------------------------------------------------------------------------------------------------------------
// LOGOUT
// --------------------------------------------------------------------------------------------------------------------------------



// if (isset($_POST['logout'])) {
//     $user = mysqli_real_escape_string($con, $_POST['username']);
//     // $a_id = $id['appointment_id'];

//     $query = "SELECT * FROM users WHERE users.user_id = 1";
//     $query_run = mysqli_query($con, $query);

//     if (mysqli_num_rows($query_run) > 0) {
//         foreach ($query_run as $user) {
//             setcookie("username", $user['username']);
//         }
//     }





//     setcookie("username", $user, time() + 3600);
//     if (isset($_COOKIE["username"])) {
//         echo "jack hughes logged in successfully";
//     } else {
//         echo "noooppppeeee";
//     }

//     // $query = "UPDATE appointments SET taken=true, user_id=1 WHERE appointment_id=$id";
//     // $query_run = mysqli_query($con, $query);

//     if ($query_run) {
//         // $_SESSION['message'] = "Student Deleted Successfully";
//         header("Location: booking.php");
//         exit(0);
//     } else {
//         // $_SESSION['message'] = "Student Not Deleted";
//         header("Location: booking.php");
//         exit(0);
//     }
// }



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
        header("Location: doctorsPage.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Appointment Not Deleted";
        header("Location: doctorsPage.php");
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
        header("Location: homepage.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Appointment Not Deleted";
        header("Location: homepage.php");
        exit(0);
    }
}



// if (isset($_POST['add_user'])) {
//     $username = mysqli_real_escape_string($con, $_POST['username']);
//     $first_name = mysqli_real_escape_string($con, $_POST['first_name']);
//     $last_name = mysqli_real_escape_string($con, $_POST['last_name']);

//     if (empty($_POST["email"])) {
//         $emailErr = "Email is required";
//     } else {
//         $email = mysqli_real_escape_string($con, $_POST["email"]);
//         // check if e-mail address is well-formed
//         if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
//             $emailErr = "Invalid email format";
//         }
//     }

//     // $email = mysqli_real_escape_string($con, $_POST['email']);
//     $password = mysqli_real_escape_string($con, $_POST['password']);

//     $query = "INSERT INTO users SET username='$username', first_name='$first_name', last_name='$last_name', email='$email', password='$password'";
//     $query_run = mysqli_query($con, $query);

//     if ($query_run) {
//         header("Location: ./userLogin.php");
//         exit(0);
//     } else {
//         header("Location: ../index.php");
//         exit(0);
//     }
// }

// if (isset($_POST['user_login'])) {
//     $username = mysqli_real_escape_string($con, $_POST['username']);
//     $password = mysqli_real_escape_string($con, $_POST['password']);

//     $query = "INSERT INTO users SET username='$username', first_name='$first_name', last_name='$last_name', email='$email', password='$password'";
//     $query_run = mysqli_query($con, $query);

//     if ($query_run) {
//         header("Location: ./userLogin.php");
//         exit(0);
//     } else {
//         header("Location: ../index.php");
//         exit(0);
//     }
// }

?>