<?php
session_start();
require 'dbcon.php';
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
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>All Patients
                            <a href="user-create.php" class="btn btn-primary float-end">Add users</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <!-- <th>ID</th>
                                    <th>Username</th> -->
                                    <th>Date</th>
                                    <th>Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = "SELECT * FROM appointments";
                                $query_run = mysqli_query($con, $query);

                                if (mysqli_num_rows($query_run) > 0) {
                                    foreach ($query_run as $user) {
                                        ?>
                                        <?php if($user['taken']==false) : ?>
                                        <tr>
                                            <td>
                                                <?= $user['date']; ?>
                                            </td>
                                            <td>
                                                <?= $user['time']; ?>
                                            </td>
                                            <td>
                                                <!-- <a href="user-view.php?id=<?= $user['id']; ?>"
                                                    class="">View</a>
                                                <a href="user-edit.php?id=<?= $user['id']; ?>"
                                                    class="">Edit</a> -->
                                                <form action="" method="POST" class="">
                                                    <button type="submit" name="delete_user" value="<?= $user['appointment_id']; ?>"
                                                        class="">Book Appointment</button>
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