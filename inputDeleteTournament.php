<?php
include "config.php"; // Include the database connection

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['IdTournament'])) {
    $IdTournament = $_POST['IdTournament']; // Get the tournament ID from the form

    // Prepare the delete query
    $deleteQuery = "DELETE FROM tournament WHERE IdTournament = ?";
    
    if ($stmt = mysqli_prepare($connect, $deleteQuery)) {
        mysqli_stmt_bind_param($stmt, "i", $IdTournament);
        
        if (mysqli_stmt_execute($stmt)) {
            // If successful, show a success message
            echo "Tournament deleted successfully!";
        } else {
            // If there was an error, show the error
            echo "Error deleting tournament: " . mysqli_error($connect);
        }

        // Close the statement
        mysqli_stmt_close($stmt);
    }
}

// Close the database connection
mysqli_close($connect);
?>
