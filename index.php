<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Application</title>
    <link rel="icon" href="owner.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <?php include('dbcon.php'); ?>

        <?php
        if (isset($_GET['message'])) {
            echo "<h6 class='message'>" . $_GET['message'] . "</h6>";
        }
        ?>

        <div class="box1">
            <h2 id="kahead">Top Five Positions</h2>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                ADD BOARD MEMBER
            </button>
        </div>

        <table class="table table-bordered table-striped table-hover">
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Position</th>
                <th>Address</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Year of Employment</th>
                <th>Salary</th>
                <th>Actions</th>
            </tr>
            <?php
            $query = "SELECT * FROM members"; // Replace 'members' with your actual table name
            $result = mysqli_query($connection, $query);

            if ($result) {
                while ($row = mysqli_fetch_array($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>"; // Added ID
                    echo "<td>" . $row['first_name'] . "</td>";
                    echo "<td>" . $row['last_name'] . "</td>";
                    echo "<td>" . $row['position'] . "</td>";
                    echo "<td>" . $row['address'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "<td>" . $row['mobile'] . "</td>";
                    echo "<td>" . $row['year_of_employment'] . "</td>";
                    echo "<td>" . $row['salary'] . "</td>";
                    echo "<td>";
                    echo "<a href='update.php?id=" . $row['id'] . "' class='btn btn-success'>Update</a> ";
                    echo "<a href='delete.php?id=" . $row['id'] . "' class='btn btn-danger' onclick=\"return confirm('Are you sure you want to delete this member?');\">Delete</a>";
                    echo "</td>";
                    echo "</tr>";
                }
            }
            ?>
        </table>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">ADD BOARD MEMBER</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="insert_data.php" method="post">
                            <div class="mb-3">
                                <label for="f_name" class="form-label">First Name:</label>
                                <input type="text" name="f_name" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="l_name" class="form-label">Last Name:</label>
                                <input type="text" name="l_name" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="position" class="form-label">Position:</label>
                                <input type="text" name="position" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">Address:</label>
                                <input type="text" name="address" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email:</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="mobile" class="form-label">Mobile:</label>
                                <input type="text" name="mobile" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="year_of_employment" class="form-label">Year of Employment:</label>
                                <input type="text" name="year_of_employment" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="salary" class="form-label">Salary:</label>
                                <input type="number" name="salary" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary" name="add_board_member">Add Member</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
