<?php require_once('./database/connection.php'); ?>

<?php
$name = $duration = "";
if (isset($_POST["submit"])) {
    $name = htmlspecialchars($_POST["name"]);
    $duration = htmlspecialchars($_POST["duration"]);

    if (empty($name)) {
        $error = "Please enter course name";
    } elseif (empty($duration)) {
        $error = "Please enter course duration";
    } else {
        // $success = "Good to go";
        $sql = "INSERT INTO `courses`(`name`, `duration`) VALUES ('$name','$duration')";
        $is_created = $conn->query($sql);
        if($is_created){
            $success = "Magic has been spelled";
        } else{
            $error = "It was never a magic but a shopper";
        }
    }
}
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
                            <h1 class="h3 mb-3">Add Course</h1>
                        </div>
                        <div class="col-6 text-end">
                            <a href="./show-courses.php" class="btn btn-outline-primary">Back</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <?php require_once('./includes/flash-messages.php') ?>
                                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
                                        <div class="mb-3">
                                            <label for="name">Course name</label>
                                            <input type="text" class="form-control" name="name" value="<?php echo $name ?>" id="name" placeholder="Enter course name!">
                                            
                                        </div>

                                        <div class="mb-3">
                                            <label for="duration">Course Duration</label>
                                            <input type="text" class="form-control" value="<?php echo $duration ?>" name="duration" id="duration" placeholder="Enter course duration!">
                                        </div>

                                        <div>
                                            <input type="submit" name="submit" value="Submit" class="btn btn-primary">
                                        </div>
                                    </form>
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