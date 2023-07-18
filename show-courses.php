<?php require_once('./database/connection.php'); ?>

<?php
$sql = "SELECT * FROM `courses`";
$result = $conn->query($sql);
$courses = $result->fetch_all(MYSQLI_ASSOC);
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
                        <h1 class="h3 mb-3">Courses</h1>
                        </div>
                        <div class="col-6 text-end">
                            <a href="./add-course.php" class="btn btn-outline-primary">Add Course</a>
                        </div>
                    </div>
                    

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <?php
                                    if (count($courses) > 0) { ?>

                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Course Name</th>
                                                <th>Course Duration</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            foreach($courses as $course) { ?>

                                            <tr>
                                                <td><?php echo $course['name']; ?></td>
                                                <td><?php echo $course['duration']; ?></td>
                                                <td>
                                                    <a href="./edit-course.php?id=<?php echo $course['id']; ?>" class="btn btn-primary">Edit</a>

                                                    <a href="./delete-course.php?id=<?php echo $course['id']; ?>" class="btn btn-danger">Delete</a>
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