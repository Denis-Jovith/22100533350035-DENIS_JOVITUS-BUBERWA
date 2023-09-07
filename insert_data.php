<?php
include('dbcon.php');

if (isset($_POST['add_board_member'])) {
    $first_name = $_POST['f_name'];
    $last_name = $_POST['l_name'];
    $position = $_POST['position'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $year_of_employment = $_POST['year_of_employment'];
    $salary = $_POST['salary'];

    $query = "INSERT INTO members (first_name, last_name, position, address, email, mobile, year_of_employment, salary) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, "sssssssi", $first_name, $last_name, $position, $address, $email, $mobile, $year_of_employment, $salary);

    if (mysqli_stmt_execute($stmt)) {
        header('Location: index.php?message=Member added successfully');
        exit();
    } else {
        die("Query Failed: " . mysqli_stmt_error($stmt));
    }

    mysqli_stmt_close($stmt);
}

mysqli_close($connection);
?>
