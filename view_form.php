<?php
session_start();
include 'connect.php';

$id = $_SESSION['id'];

$sql = "SELECT * FROM users_info_tbl WHERE u_id = $id";
$result = $conn->query($sql);
$row = $result->fetch_array();

$section = $row['ui_section'];
$position = $row['ui_position'];

//echo $section;
//echo $position;

//$section = 'Pascal A';
//$position = 'Student';

if ($_SESSION['level'] == 1 || $_SESSION['level'] == 2)
{
$sqlJoin = "SELECT users_tbl.u_id,users_tbl.u_lname,users_tbl.u_fname,users_tbl.u_mname,users_tbl.u_level, users_info_tbl.ui_batch,users_info_tbl.ui_grade,users_info_tbl.ui_section,users_info_tbl.ui_position FROM users_tbl INNER JOIN users_info_tbl WHERE users_tbl.u_id = users_info_tbl.u_id AND users_info_tbl.ui_section = '$section' AND users_info_tbl.ui_position != '$position'";
$resultJoin = $conn->query($sqlJoin);
}
else if ($_SESSION['level'] == 3 ){
$sqlJoin = "SELECT users_tbl.u_id,users_tbl.u_lname,users_tbl.u_fname,users_tbl.u_mname,users_tbl.u_level, users_info_tbl.ui_batch,users_info_tbl.ui_grade,users_info_tbl.ui_section,users_info_tbl.ui_position FROM users_tbl INNER JOIN users_info_tbl WHERE users_tbl.u_id = users_info_tbl.u_id AND users_info_tbl.ui_section = '$section' AND users_info_tbl.ui_position = '$position'";
$resultJoin = $conn->query($sqlJoin);	
}
?>
<html>
<head>



</head>
<?php include 'links.php'; ?>
<body>
	<table border="1">
		<tr>
			<td>ID</td>
			<td>FULLNAME</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
<?php

if ($resultJoin->num_rows > 0) {
		 while($rowJoin = $resultJoin->fetch_assoc()) {
?>
		<tr>
			<td><?php echo $rowJoin['u_id']; ?></td>
			<td><?php echo $rowJoin['u_lname'] . " " . $rowJoin['u_fname'] . " " . $rowJoin['u_mname']; ?></td>
			<td><a href="view_form1.php?id=<?php echo $row["u_id"] ?>">FORM1</a></td>
			<td><a href="view_form2.php?id=<?php echo $row["u_id"] ?>">FORM2</a></td>
			<td>FORM3</td>
		</tr>
		
<?php
		} 
}
else {
	echo "0 results";
}

$conn->close();
?>
		<tr>
			<td colspan="4"><a href="insert_user.php"><input type="button" value="ADD"></a></td>
		</tr>
	</table>

</body>
</html>