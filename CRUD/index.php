<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Product List</title>
</head>
<body>
    <h2>Product List</h2>
    <a href="create.php">Create New Product</a><br><br>

    <table border="1">
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Actions</th>
        </tr>

        <?php
        $sql = "SELECT * FROM products";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>".$row['Id']."</td>";
                echo "<td>".$row['Name']."</td>";
                echo "<td>".$row['Description']."</td>";
                echo "<td>".$row['Price']."</td>";
                echo "<td>".$row['Quantity']."</td>";
                echo "<td>".$row['Created_at']."</td>";
                echo "<td>".$row['Updated_at']."</td>";
                echo "<td>
                        <a href='update.php?id=".$row['Id']."'>Edit</a> | 
                        <a href='delete.php?id=".$row['Id']."'>Delete</a>
                    </td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='8'>No records found</td></tr>";
        }
        ?>
    </table>
</body>
</html>
