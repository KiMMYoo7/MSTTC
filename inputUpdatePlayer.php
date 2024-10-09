<?php
include "config.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
    $IdPlayer = $_POST['IdPlayer'];
    $Name = $_POST['Name'];
    $NickName = $_POST['NickName'];
    $Age = $_POST['Age'];
    $DominantHand = $_POST['DominantHand'];
    $Playstyle = $_POST['Playstyle'];
    $Blade = $_POST['Blade'];
    $RubberForeHand = $_POST['RubberForeHand'];
    $RubberBackHand = $_POST['RubberBackHand'];
    $Grip = $_POST['Grip'];

    // Retrieve the current image from the database
    $imageQuery = "SELECT ImagePlayer FROM player WHERE IdPlayer = ?";
    if ($stmt = mysqli_prepare($connect, $imageQuery)) {
        mysqli_stmt_bind_param($stmt, "i", $IdPlayer);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $existingImage);
        mysqli_stmt_fetch($stmt);
        mysqli_stmt_close($stmt);
    }

    // Handle image upload (optional)
    $ImagePlayer = $existingImage; // Default to existing image
    if (isset($_FILES['ImagePlayer']) && $_FILES['ImagePlayer']['error'] === UPLOAD_ERR_OK) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["ImagePlayer"]["name"]);
        if (move_uploaded_file($_FILES["ImagePlayer"]["tmp_name"], $target_file)) {
            $ImagePlayer = $target_file; // If new image is uploaded, use the new file path
        }
    }

    // Update player details in the database
    $updateQuery = "UPDATE player SET Name = ?, NickName = ?, Age = ?, DominantHand = ?, Playstyle = ?, Blade = ?, RubberForeHand = ?, RubberBackHand = ?, Grip = ?, ImagePlayer = ? WHERE IdPlayer = ?";
    if ($stmt = mysqli_prepare($connect, $updateQuery)) {
        mysqli_stmt_bind_param($stmt, "ssisssssssi", $Name, $NickName, $Age, $DominantHand, $Playstyle, $Blade, $RubberForeHand, $RubberBackHand, $Grip, $ImagePlayer, $IdPlayer);
        if (mysqli_stmt_execute($stmt)) {
            echo "Player updated successfully!";
        } else {
            echo "Error updating player: " . mysqli_error($connect);
        }
        mysqli_stmt_close($stmt);
    }
}

mysqli_close($connect);
?>
