<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Insert User</title>
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
        input[type="text"], input[type="password"], select {
            width: 100%;
            padding: 8px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        input[type="submit"], input[type="button"] {
            background-color: #71a5c5;
            color: white;
            padding: 8px 15px;
            border-radius: 5px;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover, input[type="button"]:hover {
            background-color: #5a8ca0;
        }
    </style>
</head>
<body>
<?php include 'links.php'; ?>
<div class="container">
    <h2>Insert User</h2>
    <form action="insert_user_proc.php" method="POST">
        <table>
            <tr>
                <td>LNAME</td>
                <td><input type="text" name="txtLname"></td>
            </tr>
            <tr>
                <td>FNAME</td>
                <td><input type="text" name="txtFname"></td>
            </tr>
            <tr>
                <td>MNAME</td>
                <td><input type="text" name="txtMname"></td>
            </tr>
            <tr>
                <td>EMAIL</td>
                <td><input type="text" name="txtEmail"></td>
            </tr>
            <tr>
                <td>PASSWORD</td>
                <td><input type="password" name="txtPword"></td>
            </tr>
            <tr>
                <td>LEVEL</td>
                <td>
                    <select name="drpLevel">
                        <option value="1">Dorm Manager</option>
                        <option value="2">Students</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" value="Submit">
                    <a href="view_users.php"><input type="button" value="BACK"></a>
                </td>
            </tr>
        </table>
    </form>
</div>
</body>
</html>