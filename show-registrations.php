<?php require_once('./database/connection.php'); ?>

<?php
$sql = "SELECT `registrations`.`id` AS `reg_id`, `courses`.`name` AS `course_name`, `students`.`name` AS `student_name`
FROM `courses` JOIN `registrations` ON `courses`.`id` = `registrations`.`course_id`
JOIN `students` ON `registrations`.`student_id` = `students`.`id`";
$result = $conn->query($sql);
$registrations = $result->fetch_all(MYSQLI_ASSOC);
// echo '<pre>';
// print_r($registrations);
// echo '</pre>';
?>

<!DOCTYPE html>
<html lang="en">

<?php require_once('./includes/head.php'); ?>

<body>
    <div class="wrapper">

        <?php require_once('./includes/sidenavbar.php'); ?>

        <div class="main">

            <?php require_once('./includes/topnavbar.php'); ?>

            <main class="content">
                <div class="container-fluid p-0">
                    <div class="row">
                        <div class="col-6">
                            <h1 class="h3 mb-3">Registrations</h1>
                        </div>
                        <div class="col-6 text-end">
                            <a href="./add-registration.php" class="btn btn-outline-primary">Add Registration</a>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <?php
                                    if (count($registrations) > 0) { ?>

                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Course Name</th>
                                                    <th>Student Name</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php
                                                foreach ($registrations as $registration) { ?>

                                                    <tr>
                                                        <td><?php echo $registration['course_name']; ?></td>
                                                        <td><?php echo $registration['student_name']; ?></td>
                                                        <td>
                                                            <a href="./edit-registration.php?id=<?php echo $registration['reg_id']; ?>" class="btn btn-primary">Edit</a>

                                                            <a href="./delete-registration.php?id=<?php echo $registration['reg_id']; ?>" class="btn btn-danger">Delete</a>
                                                        </td>
                                                    </tr>

                                                <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>

                                    <?php
                                    } else { ?>

                                        <div class="alert alert-danger">No record found!</div>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>

            <?php require_once('./includes/footer.php'); ?>

        </div>
    </div>

    <script src="assets/js/app.js"></script>
</body>

</html>