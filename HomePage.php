<?php
// session_start();
require './database/dbcon.php';
require './database/code.php';
?>

<!doctype html>
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
        <?php if (isset($_COOKIE['username'])): ?>
            <div class="content">

                <h4>
                    <a href="./index.php" class="btn">Log out</a>
                </h4>
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
                            $user=$_COOKIE['username'];
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
                                            <a href="user-edit.php?id=<?= $user['user_id']; ?>"
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
                    <a href="./booking.php" class="sign">Book Appointment</a></p>
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
                            $query = "SELECT * FROM appointments INNER JOIN users ON appointments.user_id = users.user_id WHERE appointments.user_id = 1";
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
        <?php else: ?>
            even more html
        <?php endif; ?>
    </div>
</body>

</html>