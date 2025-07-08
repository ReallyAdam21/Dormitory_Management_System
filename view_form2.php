<?php
session_start();
include 'connect.php';
$id = $_SESSION['id'];
$sql = "SELECT * FROM activities_tbl WHERE u_id = '$id'";
$result = $conn->query($sql);

?>
<html>
<head>



</head>
<?php include 'links.php'; ?>
<body>

	<table border="1">
		<tr>
			<td>Name of Student: <?php echo $_SESSION['lname'] . " " . $_SESSION['fname'] . " " . $_SESSION['mname']?></td>
			<td>Batch:</td>
		</tr>
		<tr>
			<td colspan="2">Name of Adviser:</td>
		</tr>
		<tr>
			<td colspan="2">Date of Submission:</td>
		</tr>
	</table>
	<table border="1">
		<tr>
			<td rowspan="2" colspan="2">Title of Activity</td>
			<td rowspan="2">Strand</td>
			<td rowspan="2">Type</td>
			<td colspan="2">Target Schedule (mm-yyyy)</td>
			<td rowspan="2">STATUS</td>
		</tr>
		<tr>
			<td>Start</td>
			<td>End</td>
		</tr>
<?php

if ($result->num_rows > 0) {
		 while($row = $result->fetch_assoc()) {
?>
		<tr>
			<td><?php echo $row["a_title"]; ?></td>
			<td><?php echo $row["a_description"]; ?></td>
			<td><?php echo $row["a_strand_s"] . " " . $row["a_strand_c"] . " " . $row["a_strand_a"] . " " . $row["a_strand_l"]; ?></td>
			<td><?php echo $row["a_type"]; ?></td>
			<td><?php echo $row["a_start"]; ?></td>
			<td><?php echo $row["a_end"]; ?></td>
			<td><?php echo $row["a_status"]; ?></td>
		</tr>
		<?php
		} 
}
else {
	echo "0 results";
}

?>
		<tr>
			<td colspan="7"><a href="insert_form2.php"><input type="button" value="ADD"></td>

		</tr>
	</table>

</body>
</html>