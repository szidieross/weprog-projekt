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
        <table class="">
            <h4>
                <a href="./index.php" class="btn">Log out</a>
            </h4>
            <h2 class="title">Available Appointments</h2>

            <thead>
                <tr>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Doctor</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT * FROM appointments INNER JOIN doctors ON appointments.doctor_id = doctors.doctor_id";
                $query = "SELECT * FROM appointments";
                $query2 = "SELECT * FROM doctors";
                // adatbazis ujra
                $query_run = mysqli_query($con, $query);
                $query_run2 = mysqli_query($con, $query2);

                if (mysqli_num_rows($query_run) > 0) {
                    foreach ($query_run as $user) {
                        ?>
                        <?php if ($user['taken'] == false): ?>
                            <tr>
                                <td>
                                    <?= $user['date']; ?>
                                </td>
                                <td>
                                    <?= $user['time']; ?>
                                </td>
                                <form action="" method="POST" class="form-flex">
                                    <?php
                                    $query = "SELECT * FROM doctors";
                                    $query_run = mysqli_query($con, $query);

                                    if (mysqli_num_rows($query_run) > 0) {
                                        foreach ($query_run as $user) {
                                            ?>

                                            <td>
                                                <input type="radio" id="doc" name="doc" value="<?= $user['doctor_id']; ?>" required>
                                                <label for="doc">
                                                    <?= $user['d_last_name']; ?>
                                                    <?= $user['d_first_name']; ?>
                                                </label>

                                            </td>
                                            <?php

                                        }
                                    } else {
                                        echo "<h5> No Record Found </h5>";
                                    }
                                    ?>
                                    <td><button type="submit" name="appointment_booking" value="<?= $user['doctor_id']; ?>"
                                            class="">Book
                                            Appointment</button></td>
                                </form>

                            </tr>
                        <?php endif; ?>
                        <?php
                    }
                } else {
                    echo "<tr><h5> No Record Found </h5></tr>";
                }
                ?>

            </tbody>
        </table>

    </div>
</body>

</html>