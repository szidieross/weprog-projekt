<?php
// session_start();
require './database/dbcon.php';
require 'code.php';


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./assets/styles/general.css">
</head>

<body>
    <div class="">
        <?php if (isset($_COOKIE['username']) && ($_COOKIE['username'] === 'admin')): ?>
            <a href="users.php" class=""><button class="btn">USERS</button></a>
            <a href="appointments.php" class=""><button class="btn">APPOINTMENTS</button></a>
            <form action="" method="POST" class="">
                <input type="hidden" name="username" value="<?= $_COOKIE["username"] ?>" />
                <button type="submit" name="logout" value="<?= $user['user_id']; ?>" class="btn">Log Out</button>
            </form>
        <?php else: ?>
            <div class="content">
                <h4>
                    <a href="index.php" class=""><button class="btn">BACK</button></a>
                </h4>
                <div class="container">
                    <div class="form">
                        <form action="" method="POST" class="form">

                            <div class="">
                                <label>Username</label>
                                <input type="text" name="username" id="username" class="">
                            </div>
                            <div class="">
                                <label>Password</label>
                                <input type="password" name="password" id="password" class="">
                            </div>
                            <div class="">
                                <button type="submit" name="adminlogin" class="sign">Login</button>
                            </div>
                            <p class="smallText">Don't have an account? <a href="./userRegister.php" class="sign">Sign
                                    up</a></p>

                        </form>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>


</body>
<?php mysqli_close($con); ?>

</html>