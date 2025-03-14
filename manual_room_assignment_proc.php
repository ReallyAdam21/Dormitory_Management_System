<?php
session_start();
include 'connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $students = $_POST['students'];
    $room_number = $_POST['room_number'];

    // Define valid room ranges
    $valid_rooms = array_merge(range(104, 107), range(201, 216), range(301, 316));

    if (!empty($students) && !empty($room_number)) {
        if (in_array($room_number, $valid_rooms)) {
            foreach ($students as $student_id) {
                // Update room_assigned in users_tbl
                $sql = "UPDATE users_tbl SET room_assigned = '$room_number' WHERE u_id = $student_id";
                $conn->query($sql);

                // Insert room assignment into rooms_tbl
                $sql = "INSERT INTO rooms_tbl (room_number, u_id) VALUES ('$room_number', $student_id)";
                $conn->query($sql);
            }
            echo "Manual room assignments completed.";
        } else {
            echo "Invalid room number. Please select a valid room number.";
        }
    } else {
        echo "Please select students and specify a room number.";
    }
} else {
    echo "Invalid request.";
}

$conn->close();
?>
