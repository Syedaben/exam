<?php
include 'connection.php';
// edit.php

if (isset($_GET['id'])) {
    // Retrieve the record to be edited
    $id = $_GET['id'];
    $sql = "SELECT * FROM register WHERE id = $id";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Update the record in the database
    $title = $_POST['title'];
    $author = $_POST['author'];
    $genre = $_POST['genre'];
    $publication_date = $_POST['publication_date'];

    $sql = "UPDATE register SET name='$title', author='$author', genre='$genre', date='$publication_date' WHERE id = $id";

    if (mysqli_query($con, $sql)) {
        echo "Record updated successfully";
        header("Location: record.php");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

// Display the form for editing
?>
<form action="" method="POST">
  <input type="text" name="title" value="<?php echo $row['name']; ?>">
  <input type="text" name="author" value="<?php echo $row['author']; ?>">
  <input type="text" name="genre" value="<?php echo $row['genre']; ?>">
  <input type="text" name="publication_date" value="<?php echo $row['date']; ?>">
  <button type="submit">Update</button>
</form>
