<?php
session_start();
require './database/dbcon.php';
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
        <div class="">
            <div class="">
                <div class="">
                    <div class="">
                        <h4>
                            <a href="./index.php" class=""><button class="btn">Log out</button></a>
                        </h4>
                    </div>
                    <div class="">

                        <table class="data">
                            <thead>
                                <tr>
                                    <!-- <th>First Name</th>
                                    <th>Last Name</th> -->
                                    <th>Patient</th>
                                    <th>Doctor</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = "SELECT * FROM appointments INNER JOIN users ON appointments.user_id = users.user_id INNER JOIN doctors ON appointments.doctor_id = doctors.doctor_id";
                                $query_run = mysqli_query($con, $query);


                                if (mysqli_num_rows($query_run) > 0) {
                                    foreach ($query_run as $user) {
                                        ?>
                                        <?php if ($user['taken'] == true): ?>
                                            <tr>
                                                <td>
                                                    <?= $user['last_name']; ?>
                                                    <?= $user['first_name']; ?>
                                                    (@
                                                    <?= $user['username']; ?>)
                                                </td>
                                                <td>
                                                    <?= $user['d_last_name']; ?>
                                                    <?= $user['d_first_name']; ?>
                                                    (@
                                                    <?= $user['d_username']; ?>)
                                                </td>
                                                <td>
                                                    <?= $user['date']; ?>
                                                </td>
                                                <td>
                                                    <?= $user['time']; ?>
                                                </td>
                                                <td>
                                                    <form action="" method="POST" class="">
                                                        <button type="submit" name="delete_booking" value="<?= $user['user_id']; ?>"
                                                            class="btn btn-danger btn-sm">Delete Appointment</button>
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
            </div>
        </div>
    </div>
</body>

</html>