<html>
<head>



</head>
<body>
<?php include 'links.php'; ?>
<form action="insert_form2_proc.php" method="POST">
	<table border="1">
		<tr>
			<td>TITLE OF ACTIVITY:</td>
			<td><input type="text" name="txtTa"></td>
		</tr>

		<tr>
			<td>DESCRIPTION:</td>
			<td>
			<textarea name="txtDesc" rows="4" cols="50">
			</textarea>
			</td>
		</tr>
		<tr>
			<td>STRAND:</td>
			<td><input type="checkbox" name="cbService" value="1">Service
			<input type="checkbox" name="cbCreativity" value="1">Creativity
			<input type="checkbox" name="cbAction" value="1">Action
			<input type="checkbox" name="cbLeadership" value="1">Leadership</td>
		</tr>
		<tr>
			<td>TYPE:</td>
			<td><select name="drpType">
				  <option value="I">Individual</option>
				  <option value="G">Group</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>START:</td>
			<td><input type="date" name="dateStart"></td>
		</tr>
		<tr>
			<td>END:</td>
			<td><input type="date" name="dateEnd"></td>
		</tr>
		<tr>
			<td><input type="submit"></td>
			<td><a href="view_form2.php"><input type="button" value="BACK"></td>
		</tr>
	</table>
</form>
</body>
</html>