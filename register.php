<?php
require_once "./database/dbcon.php";
require "code.php";

// // Define variables and initialize with empty values
// $first_name = $last_name = $username = $email = $password = $confirm_password = "";
// $username_err = $email_err = $password_err = $confirm_password_err = "";

// // Processing form data when form is submitted
// if ($_SERVER["REQUEST_METHOD"] == "POST") {

//     // Validate username
//     if (empty(trim($_POST["username"]))) {
//         $username_err = "Please enter a username.";
//     } elseif (!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))) {
//         $username_err = "Username can only contain letters, numbers, and underscores.";
//     } else {
//         // Prepare a select statement
//         $sql = "SELECT * FROM users WHERE username = ?";

//         if ($stmt = mysqli_prepare($con, $sql)) {
//             // Bind variables to the prepared statement as parameters
//             mysqli_stmt_bind_param($stmt, "s", $param_username);

//             // Set parameters
//             $param_username = trim($_POST["username"]);

//             // Attempt to execute the prepared statement
//             if (mysqli_stmt_execute($stmt)) {
//                 /* store result */
//                 mysqli_stmt_store_result($stmt);

//                 if (mysqli_stmt_num_rows($stmt) == 1) {
//                     $username_err = "This username is already taken.";
//                 } else {
//                     $username = trim($_POST["username"]);
//                 }
//             } else {
//                 echo "Oops! Something went wrong. Please try again later.";
//             }

//             // Close statement
//             mysqli_stmt_close($stmt);
//         }
//     }

//     // Validate email
//     if (empty(trim($_POST["email"]))) {
//         $email_err = "Please enter a valid email address.";
//     } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
//         $email_err = "Email address is not valid.";
//     } else {
//         $email = trim($_POST["password"]);
//     }

//     // Validate password
//     if (empty(trim($_POST["password"]))) {
//         $password_err = "Please enter a password.";
//     } elseif (strlen(trim($_POST["password"])) < 6) {
//         $password_err = "Password must have atleast 6 characters.";
//     } else {
//         $password = trim($_POST["password"]);
//     }

//     // Validate confirm password
//     if (empty(trim($_POST["confirm_password"]))) {
//         $confirm_password_err = "Please confirm password.";
//     } else {
//         $confirm_password = trim($_POST["confirm_password"]);
//         if (empty($password_err) && ($password != $confirm_password)) {
//             $confirm_password_err = "Password did not match.";
//         }
//     }

//     // Check input errors before inserting in database
//     if (empty($username_err) && empty($password_err) && empty($confirm_password_err)) {

//         // Prepare an insert statement
//         $sql = "INSERT INTO users (first_name,last_name,username,email, password) VALUES (?, ?, ?, ?, ?)";

//         if ($stmt = mysqli_prepare($con, $sql)) {
//             // Bind variables to the prepared statement as parameters
//             mysqli_stmt_bind_param($stmt, "ss", $param_username, $email, $param_password);

//             // Set parameters
//             $param_username = $username;
//             $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash

//             // Attempt to execute the prepared statement
//             if (mysqli_stmt_execute($stmt)) {
//                 // Redirect to login page
//                 header("location: homepage.php");
//             } else {
//                 echo "Oops! Something went wrong. Please try again later.";
//             }

//             // Close statement
//             mysqli_stmt_close($stmt);
//         }
//     }

//     // Close connection
//     mysqli_close($con);
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="./assets/styles/general.css">
</head>

<body>
    <div class="">
        <h4>
            <a href="index.php" class="btn">BACK</a>
        </h4>
        <div class="form">
            <form action="code.php" method="post">
                <div class="form-group">
                    <label>First Name</label>
                    <input type="text" name="first_name" required>
                </div>
                <div class="form-group">
                    <label>Last Name</label>
                    <input type="text" name="last_name" required>
                </div>
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" required value="<?php if (isset($_COOKIE["username"])) {
                        echo $_COOKIE["username"];
                    } ?>">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" required
                        value="<?php if (isset($_COOKIE["email"])) {
                            echo $_COOKIE["username"];
                        } ?>">
                </div>
                <div class="form-group">
                    <label>Confirm Password</label>
                    <input type="password" name="confirm_password" class="form-control" required>
                </div>
                <div class="form-group">
                    <input type="submit" name="register" class="btn" value="Sign Up">
                </div>
                <p>Already have an account? <a href="homepage.php"> <button class="btn">Sign in</button></a></p>
            </form>
        </div>
    </div>
</body>
<?php mysqli_close($con); ?>

</html>