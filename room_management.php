<?php
session_start();
include 'connect.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Room Management</title>
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
            text-align: center;
        }
        .button-container {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 20px;
        }
        .button-container a {
            text-decoration: none;
            background-color: #71a5c5;
            color: white;
            padding: 8px 15px;
            border-radius: 5px;
        }
        .button-container a:hover {
            background-color: #5a8ca0;
        }
    </style>
</head>
<body>
<?php include 'links.php'; ?>
<div class="container">
    <h2>Room Management</h2>
    <div class="button-container">
        <a href="view_room_status.php">View Room Status</a>
        <a href="room_assignment.php">Room Assignment</a>
    </div>
</div>
</body>
</html>