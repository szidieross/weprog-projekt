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
    <link rel="stylesheet" href="./assets/styles/homepage.css">
</head>

<body>
    <div class="">
        <div class="">
            <div class="">
                <div class="">
                    <div class="">
                        <h4>All Patients
                            <a href="student-create.php" class="">Add Students</a>
                        </h4>
                    </div>
                    <div class="">

                        <table class="">
                            <thead>
                                <tr>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Username</th>
                                    <th>Doctor</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = "SELECT * FROM appointments INNER JOIN users ON appointments.user_id = users.user_id INNER JOIN doctors ON appointments.doctor_id = doctors.doctor_id";
                                $query_run = mysqli_query($con, $query);


                                if (mysqli_num_rows($query_run) > 0) {
                                    foreach ($query_run as $student) {
                                        ?>
                                        <?php if ($student['taken'] == true): ?>
                                            <tr>
                                                <td>
                                                    <?= $student['first_name']; ?>
                                                </td>
                                                <td>
                                                    <?= $student['last_name']; ?>
                                                </td>
                                                <td>
                                                    <?= $student['username']; ?>
                                                </td>
                                                <td>
                                                    <?= $student['d_username']; ?>
                                                </td>
                                                <td>
                                                    <?= $student['date']; ?>
                                                </td>
                                                <td>
                                                    <?= $student['time']; ?>
                                                </td>
                                                <td>
                                                    <form action="" method="POST" class="">
                                                        <button type="submit" name="delete_booking" value="<?= $student['user_id']; ?>"
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