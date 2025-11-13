<!DOCTYPE html>
<html>
<head>
    <title>All Users</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f7f7f7;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 900px;
            margin: auto;
            background: #fff;
            padding: 25px 30px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        .msg {
            text-align: center;
            margin-bottom: 15px;
            font-weight: bold;
            color: green;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
        }

        td {
            padding: 10px;
            text-align: center;
        }

        .add-btn {
            display: inline-block;
            padding: 10px 20px;
            background: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            float: right;
            margin-bottom: 15px;
            transition: background 0.3s;
        }

        .add-btn:hover {
            background: #45a049;
        }

        .action-btn {
            padding: 6px 12px;
            border-radius: 5px;
            text-decoration: none;
            color: white;
            font-size: 14px;
            transition: 0.3s;
        }

        .edit-btn {
            background: #2196F3;
        }

        .edit-btn:hover {
            background: #1976D2;
        }

        .delete-btn {
            background: #f44336;
        }

        .delete-btn:hover {
            background: #d32f2f;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>User List</h2>

        <!-- Show success or error message -->
        <?php
        if (isset($_GET['msg'])) {
            echo "<div class='msg'>" . htmlspecialchars($_GET['msg']) . "</div>";
        }
        ?>

        <a href="create.php" class="add-btn">+ Add New User</a>

        <table>
            <tr>
                
                <th>Student Pic</th>
                <th>Name</th>
                <th>Email</th>
                <th>Number</th>
                <th>Address</th>
                <th>Actions</th>
            </tr>

            <?php
            include 'db.php';

            $sql = "SELECT * FROM students";
            $result = mysqli_query($connection, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
            ?>
                    <tr>
                        

                        <td>
                            <?php if (!empty($row['image'])){ ?>
                                <img src="studentimages/<?= $row['image']; ?>"
                                    alt="Student Image"
                                    style="width:80px; height:80px; object-fit:cover; border-radius:6px; border:1px solid #ccc;">
                            <?php }else{ ?>
                                <p>No image</p>
                            <?php } ?>
                        </td>

                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['number']; ?></td>
                        <td><?php echo $row['address']; ?></td>
                        <td>
                            <a href="edit.php?id=<?= $row['id']; ?>" class="action-btn edit-btn">Edit</a>
                            <a href="delete.php?id=<?= $row['id']; ?>" class="action-btn delete-btn"
                            onclick="return confirm('Are you sure to delete this user?');">Delete</a>
                        </td>
                    </tr>
            <?php

                    }
                } else {
                    echo "<tr><td colspan='6'>No users found.</td></tr>";
                }

                mysqli_close($connection);
            ?>
        </table>
    </div>

</body>
</html>
