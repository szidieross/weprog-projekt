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
        <?php if (!isset($_COOKIE['username'])): ?>
            <a href="index.php" class=""><button class="btn">BACK</button></a>
            <div class="container">
                <div class="form">
                    <form action="" method="POST" class="form">

                        <div class="">
                            <label>Username</label>
                            <input type="text" name="username" id="username" class="" required value="<?php if (isset($_COOKIE["username"])) {
                                echo $_COOKIE["username"];
                            } ?>">
                        </div>
                        <div class="">
                            <label>Password</label>
                            <input type="password" name="password" id="password" class="" required value="<?php if (isset($_COOKIE["password"])) {
                                echo $_COOKIE["password"];
                            } ?>">
                        </div>
                        </p>
                        <!-- <p><input type="checkbox" name="remember" /> Remember me
                        </p>
                        <p><input type="submit" value="Login"></span></p> -->
                        <div class="">
                            <button type="submit" name="login" class="sign">Login</button>
                        </div>
                        <p class="smallText">Don't have an account?
                            <a href="register.php" class=""><button class="btn">Sign up</button></a>
                        </p>

                    </form>
                </div>
            </div>
        <?php else: ?>
            <div class="content">
                <form action="" method="POST" class="">
                    <input type="hidden" name="username" value="<?= $_COOKIE["username"] ?>" />
                    <button type="submit" name="logout" value="<?= $user['user_id']; ?>" class="btn">Log Out</button>
                </form>
                <div class="booking">
                    <h2>Personal Data</h2>
                    <table class="">
                        <thead>
                            <tr>
                                <!-- <th>ID</th> -->
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $user = $_COOKIE['username'];
                            $query = "SELECT * FROM users WHERE users.username = '$user'";
                            $query_run = mysqli_query($con, $query);

                            if (mysqli_num_rows($query_run) > 0) {
                                foreach ($query_run as $user) {
                                    ?>
                                    <tr>
                                        <td>
                                            <?= $user['first_name']; ?>
                                        </td>
                                        <td>
                                            <?= $user['last_name']; ?>
                                        </td>
                                        <td>
                                            <?= $user['username']; ?>
                                        </td>
                                        <td>
                                            <?= $user['email']; ?>
                                        </td>
                                        <td>
                                            
                                            <!-- <a href="user-view.php?id=<?= $user['user_id']; ?>" class="btn btn-info btn-sm">View</a> -->
                                            <a href="userEdit.php<?= $user['user_id']; ?>"
                                                class="btn btn-success btn-sm">Edit</a>
                                            <!-- <form action="code.php" method="POST" class="d-inline">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <button type="submit" name="delete_user" value="<?= $user['user_id']; ?>"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                class="btn btn-danger btn-sm">Delete</button>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        </form> -->
                                        </td>
                                    </tr>
                                    <?php
                                }
                            } else {
                                echo "<h5> No Record Found </h5>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="booking">
                    <h2>Want an Appointment?</h2>
                    <button class="btn"><a href="./booking.php" class="btn" >Book Appointment</a></p></button>
                </div>

                <div class="booking">
                    <h2>Appointments</h2>

                    <table class="appointments">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Time</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $user_idd = $_COOKIE["user_id"];
                            $query = "SELECT * FROM appointments INNER JOIN users ON appointments.user_id = users.user_id WHERE appointments.user_id = '$user_idd'";
                            $query_run = mysqli_query($con, $query);


                            if (mysqli_num_rows($query_run) > 0) {
                                foreach ($query_run as $user) {
                                    ?>
                                    <?php if ($user['taken'] == true): ?>
                                        <tr>
                                            <td>
                                                <?= $user['date']; ?>
                                            </td>
                                            <td>
                                                <?= $user['time']; ?>
                                            </td>
                                            <td>
                                                <form action="" method="POST" class="">
                                                    <input type="hidden" name="appointment_id"
                                                        value="<?= $user['appointment_id']; ?>" />
                                                    <button type="submit" name="delete_booking" value="<?= $user['user_id']; ?>"
                                                        class="btn">Delete Appointment</button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                    <?php
                                }
                            } else {
                                echo "<h5> No Record Found </h5>";
                            }
                            ?>

                        </tbody>
                    </table>
                </div>


            </div>
        <?php endif; ?>
    </div>


</body>
<?php mysqli_close($con); ?>

</html>