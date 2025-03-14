<?php
session_start();
include 'connect.php';

$assignmentType = $_POST['assignmentType'];

if ($assignmentType == 'auto') {
    // Fetch students with u_level = 2 and no room assigned
    $sql = "SELECT u.u_id, ui.ui_province, ui.ui_grade FROM users_tbl u 
            JOIN users_info_tbl ui ON u.u_id = ui.u_id 
            WHERE u.u_level = 2 AND u.room_assigned = 0
            ORDER BY ui.ui_province, ui.ui_grade";
    $result = $conn->query($sql);

    $rooms = [];
    $room_numbers = array_merge(range(104, 107), range(201, 216), range(301, 316));
    $room_index = 0;

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $province = $row['ui_province'];
            $grade = $row['ui_grade'];

            // Initialize room for province if not exists
            if (!isset($rooms[$province])) {
                $rooms[$province] = [];
            }

            // Find a room with less than 6 students and at least one of each grade level
            $assigned = false;
            foreach ($rooms[$province] as &$room) {
                if (count($room) < 6 && !in_array($grade, array_column($room, 'ui_grade'))) {
                    $room[] = $row;
                    $assigned = true;
                    break;
                }
            }

            // If no suitable room found, create a new room
            if (!$assigned) {
                $rooms[$province][] = [$row];
            }
        }
    }

    // Assign rooms to students
    foreach ($rooms as $province => $province_rooms) {
        foreach ($province_rooms as $room) {
            $current_room_number = $room_numbers[$room_index];
            foreach ($room as $student) {
                $sql = "UPDATE users_tbl SET room_assigned = '$current_room_number' WHERE u_id = " . $student['u_id'];
                $conn->query($sql);

                // Insert room assignment into rooms_tbl
                $sql = "INSERT INTO rooms_tbl (room_number, u_id) VALUES ('$current_room_number', " . $student['u_id'] . ")";
                $conn->query($sql);
            }
            $room_index++;
        }
    }

    echo "Room assignments completed.";
} else {
    // Manual assignment logic here
    echo "Manual assignment selected. Please proceed with manual assignment.";
    // Fetch students with u_level = 2 and no room assigned
    $sql = "SELECT u.u_id, u.u_lname, u.u_fname, u.u_mname, ui.ui_province, ui.ui_grade FROM users_tbl u 
            JOIN users_info_tbl ui ON u.u_id = ui.u_id 
            WHERE u.u_level = 2 AND u.room_assigned = 0
            ORDER BY ui.ui_province, ui.ui_grade";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<style>
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
                .back-button {
                    text-decoration: none;
                    background-color: #71a5c5;
                    color: white;
                    padding: 8px 15px;
                    border-radius: 5px;
                    border: none;
                    cursor: pointer;
                    margin-right: 10px;
                }
                .back-button:hover {
                    background-color: #5a8ca0;
                }
                select {
                    max-height: 150px;
                    overflow-y: auto;
                }
              </style>";
        echo "<div class='container'>";
        echo "<form action='manual_room_assignment_proc.php' method='post'>";
        echo "<table>";
        echo "<tr><th>Select</th><th>Last Name</th><th>First Name</th><th>Middle Name</th><th>Province</th><th>Grade</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td><input type='checkbox' name='students[]' value='" . $row['u_id'] . "'></td>";
            echo "<td>" . $row['u_lname'] . "</td>";
            echo "<td>" . $row['u_fname'] . "</td>";
            echo "<td>" . $row['u_mname'] . "</td>";
            echo "<td>" . $row['ui_province'] . "</td>";
            echo "<td>" . $row['ui_grade'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "<label for='room_number'>Assign to Room Number:</label>";
        echo "<select name='room_number' id='room_number'>";
        foreach (array_merge(range(104, 107), range(201, 216), range(301, 316)) as $room) {
            echo "<option value='$room'>$room</option>";
        }
        echo "</select>";
        echo "<br><br>";
        echo "<div class='submit-button'>";
        echo "<a href='room_assignment.php' class='back-button'>Back</a>";
        echo "<input type='submit' value='Assign'>";
        echo "</div>";
        echo "</form>";
        echo "</div>";
    } else {
        echo "No students available for manual assignment.";
    }
}

$conn->close();
?>
