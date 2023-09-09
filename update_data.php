<?php
include('dbcon.php');

if (isset($_POST['update_board_member'])) {
   
 $id = $_POST['id'];
    $first_name = $_POST['f_name'];
    $last_name = $_POST['l_name'];
    
    $position = $_POST['position'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $year_of_employment = $_POST['year_of_employment'];
    $salary = $_POST['salary'];

    $query = "UPDATE members SET first_name=?, last_name=?, position=?, address=?, email=?, mobile=?, year_of_employment=?, salary=? WHERE id=?";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, "ssssssssi", $first_name, $last_name, $position, $address, $email, $mobile, $year_of_employment, $salary, $id);

    if (mysqli_stmt_execute($stmt)) {
        mysqli_stmt_close($stmt);
        mysqli_close($connection);
        header('Location: index.php?message=Member updated successfully');
        exit();
        
    } else {
        die("Query Failed: " . mysqli_stmt_error($stmt));
    }
}
?>
