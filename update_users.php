<?php
include ('connect.php');
$id = $_GET['id'];
$sql = "SELECT * FROM users_tbl WHERE u_id = '$id'";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Update User</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 50px auto;
            background-color: white;
            border: 1px solid black;
            border-radius: 5px;
            padding: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #71a5c5;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .submit-button {
            margin-top: 10px;
            text-align: right;
        }
        .submit-button input {
            text-decoration: none;
            background-color: #71a5c5;
            color: white;
            padding: 8px 15px;
            border-radius: 5px;
            border: none;
            cursor: pointer;
        }
        .submit-button input:hover {
            background-color: #5a8ca0;
        }
    </style>
</head>
<body>
<?php include 'links.php'; ?>
<div class="container">
    <form action="update_users_process.php" method="POST">
        <table>
            <?php 
            while($row = $result->fetch_assoc()) {
            ?>
                <tr>
                    <td>ID</td>
                    <td><input type="text" name="txtId" value="<?php echo $row['u_id']; ?>" readonly></td>
                </tr>
                <tr>
                    <td>PASSWORD</td>
                    <td><input type="password" name="txtPword" value="<?php echo $row['u_pword']; ?>"></td>
                </tr>
                <tr>
                    <td>RETYPE PASSWORD</td>
                    <td><input type="password" name="txtRpword"></td>
                </tr>
                <tr>
                    <td>LASTNAME</td>
                    <td><input type="text" name="txtLname" value="<?php echo $row['u_lname']; ?>"></td>
                </tr>
                <tr>
                    <td>FIRSTNAME</td>
                    <td><input type="text" name="txtFname" value="<?php echo $row['u_fname']; ?>"></td>
                </tr>
                <tr>
                    <td>MIDDLENAME</td>
                    <td><input type="text" name="txtMname" value="<?php echo $row['u_mname']; ?>"></td>
                </tr>
                <tr>
                    <td>EMAIL</td>
                    <td><input type="email" name="txtEmail" value="<?php echo $row['u_email']; ?>"></td>
                </tr>
                <tr>
                    <td colspan="2" class="submit-button"><input type="submit" value="Update"></td>
                </tr>
            <?php 
            }
            ?>
        </table>
    </form>
</div>
</body>
</html>