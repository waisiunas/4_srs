<?php require_once('./database/connection.php'); ?>

<?php
$name = $email = "";

if (isset($_POST['submit'])) {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);

    if (empty($name)) {
        $error = "Enter student name!";
    } elseif (empty($email)) {
        $error = "Enter student email!";
    } else {

        $sql = "SELECT * FROM `students` WHERE `email` = '$email'";
        $result = $conn->query($sql);
        if($result->num_rows === 0) {
            $sql = "INSERT INTO `students`(`name`, `email`) VALUES ('$name','$email')";
            if ($conn->query($sql)) {
                $success = "Magic has been spelled!";
            } else {
                $error = "Magic has failed to spell!";
            }
        } else {
            $error = "Email already exists!";
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
                            <h1 class="h3 mb-3">Add Student</h1>
                        </div>
                        <div class="col-6 text-end">
                            <a href="./show-students.php" class="btn btn-outline-primary">Back</a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

                                        <?php require_once('./includes/flash-messages.php'); ?>

                                        <div class="mb-3">
                                            <label for="name" class="form-label">Name</label>
                                            <input type="text" class="form-control" name="name" id="name" value="<?php echo $name; ?>" placeholder="Enter student name!">
                                        </div>

                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" class="form-control" name="email" id="email" value="<?php echo $email; ?>" placeholder="Enter student email!">
                                        </div>

                                        <div>
                                            <input type="submit" value="Submit" class="btn btn-primary" name="submit">
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