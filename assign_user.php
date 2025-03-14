<?php
session_start();
include 'connect.php';
$id = $_GET['id'];

$sql = "SELECT * FROM users_tbl WHERE u_id = '$id'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Assign User</title>
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
        form {
            margin-top: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
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
        input[type="submit"] {
            background-color: #71a5c5;
            color: white;
            padding: 8px 15px;
            border-radius: 5px;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #5a8ca0;
        }
    </style>
</head>
<body>
<?php include 'links.php'; ?>
<div class="container">
    <h2><?php echo $row['u_lname'] . " " . $row['u_fname'] . " " . $row['u_mname']; ?></h2>
    <form action="assign_user_proc.php" method="post">
        <input type="hidden" name="TxtId" value="<?php echo $id; ?>">
        <table>
            <tr>
                <td>Grade:</td>
                <td>
                    <select name="drpGrade">
                        <option value="n/a">N/A</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Province:</td>
                <td>
                    <select name="drpProvince">
                        <option value="n/a">N/A</option>
                        <option value="Tarlac">Tarlac</option>
                        <option value="Zambales">Zambales</option>
                        <option value="Pampanga">Pampanga</option>
                        <option value="Aurora">Aurora</option>
                        <option value="Bulacan">Bulacan</option>
                        <option value="Bataan">Bataan</option>
                        <option value="Nueva Ecija">Nueva Ecija</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" value="Assign"></td>
            </tr>
        </table>
    </form>
</div>
</body>
</html>