<?php
// session_start();
require './database/dbcon.php';
require 'code.php';
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
        <?php if (isset($_COOKIE['username']) && ($_COOKIE['username'] === 'admin')): ?>
            <table class="">

                <a href="adminLogin.php" class=""><button class="btn">Back to Admin Homepage</button></a>
                <h2 class="title">Available Appointments</h2>

                <thead>
                    <tr>
                        <th>User</th>
                        <th>Date</th>
                        <th>Time</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM users INNER JOIN appointments ON users.user_id = appointments.user_id WHERE appointments.taken=true";
                    $query_run = mysqli_query($con, $query);

                    if (mysqli_num_rows($query_run) > 0) {
                        foreach ($query_run as $user) {
                            ?>
                            <tr>
                                <td>
                                    <?= $user['last_name']; ?>
                                    <?= $user['first_name']; ?>
                                    (@
                                    <?= $user['username']; ?>)
                                </td>
                                <td>
                                    <?= $user['date']; ?>
                                </td>
                                <td>
                                    <?= $user['time']; ?>
                                </td>
                                <form action="" method="POST" class="form-flex">
                                    <input type="hidden" name="appointment_id" value="<?= $user['appointment_id']; ?>" />
                                    <td><button type=" submit" name="delete_b" value="<?= $user['appointment_id']; ?>"
                                            class="">Delete
                                            Appointment</button></td>
                                </form>

                            </tr>
                            <?php
                        }
                    } else {
                        echo "<tr><h5> No Record Found </h5></tr>";
                    }
                    ?>

                </tbody>
            </table>
        <?php else: ?>
            <div class="noRights">
                <p>You can't reach this page.</p>
            </div>
        <?php endif; ?>
    </div>
</body>
<?php mysqli_close($con); ?>

</html>