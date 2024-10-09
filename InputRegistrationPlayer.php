<?php
include "config.php"; // Assumes config.php connects to the database

// Search for player by ID if provided
if (isset($_GET['IdPlayer'])) {
    $IdPlayer = $_GET['IdPlayer'];
    $searchQuery = "SELECT * FROM player WHERE IdPlayer = ?";
    if ($stmt = mysqli_prepare($connect, $searchQuery)) {
        mysqli_stmt_bind_param($stmt, "i", $IdPlayer);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if ($player = mysqli_fetch_assoc($result)) {
            // Player found, process $player array as needed
        } else {
            echo "No player found with the provided ID.";
        }
        mysqli_stmt_close($stmt);
    } else {
        echo "Error preparing statement: " . mysqli_error($connect);
    }
}

// Get POST data for registration or updating
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $Name = $_POST["Name"];
    $NickName = $_POST["NickName"];
    $Age = $_POST["Age"];
    $DominantHand = $_POST["DominantHand"];
    $Playstyle = $_POST["Playstyle"];
    $Blade = $_POST["Blade"];
    $RubberForeHand = $_POST["RubberForeHand"];
    $RubberBackHand = $_POST["RubberBackHand"];
    $Grip = $_POST["Grip"];

    // Update existing player if IdPlayer is provided
    if (isset($_POST['IdPlayer'])) {
        $IdPlayer = $_POST['IdPlayer'];
        $updateQuery = "UPDATE player SET Name = ?, NickName = ?, Age = ?, DominantHand = ?, Playstyle = ?, Blade = ?, RubberForeHand = ?, RubberBackHand = ?, Grip = ? WHERE IdPlayer = ?";
        if ($stmt = mysqli_prepare($connect, $updateQuery)) {
            mysqli_stmt_bind_param($stmt, "ssissssssi", $Name, $NickName, $Age, $DominantHand, $Playstyle, $Blade, $RubberForeHand, $RubberBackHand, $Grip, $IdPlayer);
            if (mysqli_stmt_execute($stmt)) {
                echo "Player updated successfully.";
            } else {
                echo "Error updating player: " . mysqli_error($connect);
            }
            mysqli_stmt_close($stmt);
        } else {
            echo "Error preparing statement: " . mysqli_error($connect);
        }
    } else {
        // Insert new player if no IdPlayer is provided
        $insertQuery = "INSERT INTO player (Name, NickName, Age, DominantHand, Playstyle, Blade, RubberForeHand, RubberBackHand, Grip) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        if ($stmt = mysqli_prepare($connect, $insertQuery)) {
            mysqli_stmt_bind_param($stmt, "ssissssss", $Name, $NickName, $Age, $DominantHand, $Playstyle, $Blade, $RubberForeHand, $RubberBackHand, $Grip);
            if (mysqli_stmt_execute($stmt)) {
                echo "New player added successfully.";
            } else {
                echo "Error inserting player: " . mysqli_error($connect);
            }
            mysqli_stmt_close($stmt);
        } else {
            echo "Error preparing statement: " . mysqli_error($connect);
        }
    }
}

mysqli_close($connect); // Close the database connection
?>
