<?php
include "config.php";

// Check if the delete form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['IdPlayer'])) {
    $IdPlayer = $_POST['IdPlayer'];

    // Prepare the delete query
    $deleteQuery = "DELETE FROM player WHERE IdPlayer = ?";
    if ($stmt = mysqli_prepare($connect, $deleteQuery)) {
        mysqli_stmt_bind_param($stmt, "i", $IdPlayer);
        if (mysqli_stmt_execute($stmt)) {
            // Check if any row was affected (i.e., player was deleted)
            if (mysqli_stmt_affected_rows($stmt) > 0) {
                echo "Player deleted successfully.";
            } else {
                echo "Error: No player found with the given ID.";
            }
        } else {
            echo "Error deleting player: " . mysqli_error($connect);
        }
        mysqli_stmt_close($stmt);
    } else {
        echo "Error preparing delete query.";
    }
} else {
    echo "Invalid request.";
}

mysqli_close($connect);
?>
