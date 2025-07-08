<?php
session_start();
include 'connect.php';
$id = $_SESSION['id'];

$title = $_POST['txtTa'];
$description = $_POST['txtDesc'];
$service = $_POST['cbService'];
$creativity = $_POST['cbCreativity'];

if(isset($_POST['cbAction'])) {
    $action = "0";
}else{
    $action = "1";
}

$leadership = $_POST['cbLeadership'];
$type = $_POST['drpType'];
$start = $_POST['dateStart'];
$end = $_POST['dateEnd'];


$sql = "INSERT INTO activities_tbl (a_id, a_title, a_description, a_strand_s, a_strand_c, a_strand_a, a_strand_l, a_type, a_start, a_end, a_submission, u_id, a_sa_name, a_status, a_sa_remarks, a_sa_date)
VALUES (null,'$title','$description','$service','$creativity','$action','$leadership','$type','$start','$end',null,'$id','0','Pending','0','0')";

if ($conn->query($sql) === TRUE) {
  echo "Added Successfully";
} 

?>

<script>

  location.replace("view_form2.php")

</script>