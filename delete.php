<?php
include('dbcon.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "DELETE FROM members WHERE id = ?";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, "i", $id);

    if (mysqli_stmt_execute($stmt)) {
        header('Location: index.php?message=Member deleted successfully');
        exit();
    } else {
        die("Query Failed: " . mysqli_stmt_error($stmt));
    }

    mysqli_stmt_close($stmt);
}

mysqli_close($connection);
?>
