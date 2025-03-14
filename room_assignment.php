<?php
session_start();
include 'connect.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Room Assignment</title>
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
        label, select, input[type="submit"] {
            display: block;
            margin: 10px 0;
        }
        select, input[type="submit"] {
            padding: 8px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        input[type="submit"] {
            background-color: #71a5c5;
            color: white;
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
    <h2>Room Assignment</h2>
    <form action="room_assignment_proc.php" method="post">
        <label for="assignmentType">Choose assignment type:</label>
        <select name="assignmentType" id="assignmentType">
            <option value="auto">Automatic</option>
            <option value="manual">Manual</option>
        </select>
        <input type="submit" value="Proceed">
    </form>
</div>
</body>
</html>