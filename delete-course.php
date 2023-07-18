<?php require_once('./database/connection.php'); ?>

<?php
if(isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
} else {
    header('location: ./show-courses.php');
}

$sql = "DELETE FROM `courses` WHERE `id` = $id";
if($conn->query($sql)) {
    header('location: ./show-courses.php');
} else {
    echo "Failed to delete!";
}

