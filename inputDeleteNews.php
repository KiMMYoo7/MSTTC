<?php
include "config.php";

// Check if the delete form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['IdNews'])) {
    $IdNews = $_POST['IdNews'];

    // Prepare the delete query
    $deleteQuery = "DELETE FROM news WHERE IdNews = ?";
    if ($stmt = mysqli_prepare($connect, $deleteQuery)) {
        mysqli_stmt_bind_param($stmt, "i", $IdNews);
        if (mysqli_stmt_execute($stmt)) {
            // Check if any row was affected (i.e., player was deleted)
            if (mysqli_stmt_affected_rows($stmt) > 0) {
                echo "News deleted successfully.";
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