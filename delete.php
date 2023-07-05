<?php
include 'connection.php';
// delete.php

if (isset($_GET['id'])) {
    // Retrieve the record to be deleted
    $id = $_GET['id'];
    $sql = "SELECT * FROM register WHERE id = $id";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);

    // Delete the record from the database
    $deleteSql = "DELETE FROM register WHERE id = $id";

    if (mysqli_query($con, $deleteSql)) {
        echo "Record deleted successfully";
        header("Location: record.php");
        exit;
    } else {
        echo "Error deleting record: " . mysqli_error($con);
    }
}

// Display a confirmation message or redirect back to the records page
?>
