<?php
session_start();
include 'connect.php';

$level = $_SESSION['level'];

$id = $_POST['TxtId'];
$grade = $_POST['drpGrade'];
$province = $_POST['drpProvince'];

if ($level == 0) {
    $position = "Admin";
} else if ($level == 1) {
    $position = "Dorm Manager";
} else if ($level == 2) {
    $position = "Student";
}

$sql = "INSERT INTO users_info_tbl (ui_id,  ui_grade, ui_province, u_id)
VALUES (null, '$grade', '$province', '$id')";

if ($conn->query($sql) === TRUE) {
    echo "Assigned Successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>

<script>
  location.replace("view_users.php")
</script>
