<?php
// Check if a session is already active
if (session_status() == PHP_SESSION_NONE) {
    session_start(); // Start the session if it's not already started
}
?>

<h2> <a href="dashboard.php">HOME</a> 

<?php
    // Check if $_SESSION is set and $_SESSION['level'] is also set
    if (isset($_SESSION['level'])) {
        $level = $_SESSION['level'];

        // Check the value of $_SESSION['level'] for conditional links
        if ($level == 0 || $level == 1) {
            echo '<a href="view_users.php">USERS</a>  ';
            echo '<a href="room_management.php">MANAGE ROOMS</a>  ';
        }

        if ($level == 2) {
            echo '<a href="view_dormer_logs.php">Login/Logout</a>  ';
            echo '<a href="view_room.php">Room</a>  ';
        }
    }
?>
</h2>