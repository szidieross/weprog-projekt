<?php

session_start();
require './database/dbcon.php';


// --------------------------------------------------------------------------------------------------------------------------------
// LOGIN
// --------------------------------------------------------------------------------------------------------------------------------



if (isset($_POST['login'])) {
    $user = mysqli_real_escape_string($con, $_POST['username']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    $query = "SELECT * FROM users WHERE users.username = '$user' AND users.password = '$password'";
    $query_run = mysqli_query($con, $query);

    if (mysqli_num_rows($query_run) > 0) {
        foreach ($query_run as $user) {
            setcookie("username", $user['username']);
            setcookie("user_id", $user['user_id']);
        }
    }
    if ($query_run) {
        $_SESSION['message'] = "Logged in Successfully";
        header("Location: homepage.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Logging in Not Successful";
        header("Location: homepage.php");
        exit(0);
    }
}


// --------------------------------------------------------------------------------------------------------------------------------
// ADMIN LOGIN
// --------------------------------------------------------------------------------------------------------------------------------



if (isset($_POST['adminlogin'])) {
    $user = mysqli_real_escape_string($con, $_POST['username']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    $query = "SELECT * FROM users WHERE users.username = '$user' AND users.password = '$password' AND users.username = 'admin' AND users.password = 'admin'";
    $query_run = mysqli_query($con, $query);

    if (mysqli_num_rows($query_run) > 0) {
        foreach ($query_run as $user) {
            setcookie("username", $user['username']);
            setcookie("user_id", $user['user_id']);
        }
    }
    if ($query_run) {
        $_SESSION['message'] = "Logged in Successfully";
        header("Location: adminLogin.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Logging in Not Successful";
        header("Location: adminLogin.php");
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
        header("Location: homepage.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Logging out Not Successful";
        header("Location: homepage.php");
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
        header("Location: homepage.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Appointment Not Deleted";
        header("Location: homepage.php");
        exit(0);
    }
}



// --------------------------------------------------------------------------------------------------------------------------------
// DELETE BOOKING AS ADMIN
// --------------------------------------------------------------------------------------------------------------------------------



if (isset($_POST['delete_b'])) {
    $id = mysqli_real_escape_string($con, $_POST['appointment_id']);
    $query = "UPDATE appointments SET taken=false, user_id=NULL WHERE appointment_id=$id";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $_SESSION['message'] = "Appointment Deleted Successfully";
        header("Location: appointments.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Appointment Not Deleted";
        header("Location: appointments.php");
        exit(0);
    }
}



// --------------------------------------------------------------------------------------------------------------------------------
// REGISTER
// --------------------------------------------------------------------------------------------------------------------------------



// if (isset($_POST['register'])) {
//     setcookie("username", $_POST['username']);
//     setcookie("password", $_POST['password']);
// }
//     // Define variables and initialize with empty values
//     $username = $password = $confirm_password = "";
//     $username_err = $password_err = $confirm_password_err = "";

//     // Processing form data when form is submitted
//     if ($_SERVER["REQUEST_METHOD"] == "POST") {

//         // Validate username
//         if (empty(trim($_POST["username"]))) {
//             $username_err = "Please enter a username.";
//         } elseif (!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))) {
//             $username_err = "Username can only contain letters, numbers, and underscores.";
//         } else {
//             // Prepare a select statement
//             $sql = "SELECT * FROM users WHERE username = ?";

//             if ($stmt = mysqli_prepare($con, $sql)) {
//                 // Bind variables to the prepared statement as parameters
//                 mysqli_stmt_bind_param($stmt, "s", $param_username);

//                 // Set parameters
//                 $param_username = trim($_POST["username"]);

//                 // Attempt to execute the prepared statement
//                 if (mysqli_stmt_execute($stmt)) {
//                     /* store result */
//                     mysqli_stmt_store_result($stmt);

//                     if (mysqli_stmt_num_rows($stmt) == 1) {
//                         $username_err = "This username is already taken.";
//                     } else {
//                         $username = trim($_POST["username"]);
//                     }
//                 } else {
//                     echo "Oops! Something went wrong. Please try again later.";
//                 }

//                 // Close statement
//                 mysqli_stmt_close($stmt);
//             }
//         }

//         // Validate password
//         if (empty(trim($_POST["password"]))) {
//             $password_err = "Please enter a password.";
//         } elseif (strlen(trim($_POST["password"])) < 6) {
//             $password_err = "Password must have atleast 6 characters.";
//         } else {
//             $password = trim($_POST["password"]);
//         }

//         // Validate confirm password
//         if (empty(trim($_POST["confirm_password"]))) {
//             $confirm_password_err = "Please confirm password.";
//         } else {
//             $confirm_password = trim($_POST["confirm_password"]);
//             if (empty($password_err) && ($password != $confirm_password)) {
//                 $confirm_password_err = "Password did not match.";
//             }
//         }

//         // Check input errors before inserting in database
//         if (empty($username_err) && empty($password_err) && empty($confirm_password_err)) {

//             // Prepare an insert statement
//             $sql = "INSERT INTO users (username, password) VALUES (?, ?)";

//             if ($stmt = mysqli_prepare($con, $sql)) {
//                 // Bind variables to the prepared statement as parameters
//                 mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);

//                 // Set parameters
//                 $param_username = $username;
//                 $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash

//                 // Attempt to execute the prepared statement
//                 if (mysqli_stmt_execute($stmt)) {
//                     // Redirect to login page
//                     header("location: homepage.php");
//                 } else {
//                     echo "Oops! Something went wrong. Please try again later.";
//                 }

//                 // Close statement
//                 mysqli_stmt_close($stmt);
//             }
//         }

//         // Close connection
//         mysqli_close($con);
//     }
// }

?>