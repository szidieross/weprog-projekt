<?php
session_start();
require './database/dbcon.php';

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php"); // Redirect to the login page if not logged in
    exit();
}

// Get the logged-in user's username
$loggedInUser = $_SESSION['username'];

// Retrieve the user's data from the database
$query = "SELECT * FROM users WHERE username = '$loggedInUser'";
$result = mysqli_query($con, $query);
$user = mysqli_fetch_assoc($result);

// Handle the form submission for updating user data
if (isset($_POST['update'])) {
    // Retrieve the submitted form data
    $newFirstName = mysqli_real_escape_string($con, $_POST['first_name']);
    $newLastName = mysqli_real_escape_string($con, $_POST['last_name']);
    $newUsername = mysqli_real_escape_string($con, $_POST['username']);
    $newEmail = mysqli_real_escape_string($con, $_POST['email']);

    // Update the user's data in the database
    $updateQuery = "UPDATE users SET first_name = '$newFirstName', last_name = '$newLastName', username = '$newUsername', email = '$newEmail' WHERE username = '$loggedInUser'";
    $updateResult = mysqli_query($con, $updateQuery);

    if ($updateResult) {
        $_SESSION['message'] = "User data updated successfully";
        header("Location: profile.php"); // Redirect to the user's profile page
        exit();
    } else {
        $_SESSION['message'] = "Failed to update user data";
        header("Location: profile.php"); // Redirect to the user's profile page
        exit();
    }
}

mysqli_close($con);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User Data</title>
    <link rel="stylesheet" href="./assets/styles/general.css">
</head>

<body>
    <h1>Edit User Data</h1>

    <!-- Display user data in a form for editing -->
    <form action="" method="POST">
        <div>
            <label for="first_name">First Name</label>
            <input type="text" name="first_name" id="first_name" value="<?php echo $user['first_name']; ?>" required>
        </div>
        <div>
            <label for="last_name">Last Name</label>
            <input type="text" name="last_name" id="last_name" value="<?php echo $user['last_name']; ?>" required>
        </div>
        <div>
            <label for="username">Username</label>
            <input type="text" name="username" id="username" value="<?php echo $user['username']; ?>" required>
        </div>
        <div>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="<?php echo $user['email']; ?>" required>
        </div>
        <div>
            <button type="submit" name="update">Update</button>
        </div>
    </form>

    <!-- Display any error messages or success messages -->
    <?php if (isset($_SESSION['message'])): ?>
        <div><?php echo $_SESSION['message']; ?></div>
        <?php unset($_SESSION['message']); ?>
    <?php endif; ?>
</body>

</html>
