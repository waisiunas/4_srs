<?php require_once('./database/connection.php'); ?>

<?php
if(isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
} else {
    header('location: ./show-students.php');
}

$sql = "DELETE FROM `students` WHERE `id` = $id";
if($conn->query($sql)) {
    header('location: ./show-students.php');
} else {
    echo "Failed to delete!";
}

