<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Member</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="my-4">Update Member</h1>
        <?php include('dbcon.php'); ?>
        <?php
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            $query = "SELECT * FROM members WHERE id = ?";
            $stmt = mysqli_prepare($connection, $query);
            mysqli_stmt_bind_param($stmt, "i", $id);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            $row = mysqli_fetch_assoc($result);

            mysqli_stmt_close($stmt);
        } else {
            die("Member ID not provided.");
        }
        ?>

        <form action="update_data.php" method="post">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <div class="mb-3">
                <label for="f_name" class="form-label">First Name:</label>
                <input type="text" name="f_name" class="form-control" value="<?php echo $row['first_name']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="l_name" class="form-label">Last Name:</label>
                <input type="text" name="l_name" class="form-control" value="<?php echo $row['last_name']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="position" class="form-label">Position:</label>
                <input type="text" name="position" class="form-control" value="<?php echo $row['position']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address:</label>
                <input type="text" name="address" class="form-control" value="<?php echo $row['address']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" name="email" class="form-control" value="<?php echo $row['email']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="mobile" class="form-label">Mobile:</label>
                <input type="text" name="mobile" class="form-control" value="<?php echo $row['mobile']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="year_of_employment" class="form-label">Year of Employment:</label>
                <input type="text" name="year_of_employment" class="form-control" value="<?php echo $row['year_of_employment']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="salary" class="form-label">Salary:</label>
                <input type="number" name="salary" class="form-control" value="<?php echo $row['salary']; ?>" required>
            </div>
            <button type="submit" name="update_board_member" class="btn btn-primary">Update Member</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
