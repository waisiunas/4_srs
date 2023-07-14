<?php require_once('./database/connection.php'); ?>
<?php
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM `courses` WHERE `id` = $id";
    $is_deleted = $conn->query($sql);
    if($is_deleted){
        header("location: ./show-courses.php");
    }
} else {
    header("location: ./show-courses.php");
}
?>