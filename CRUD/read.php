<?php
include 'config.php';

$sql = "SELECT * FROM products";
$result = mysqli_query($conn, $sql);
?>

<h2>Products List</h2>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Description</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Created At</th>
        <th>Updated At</th>
        <th>Actions</th>
    </tr>

    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
        <td><?php echo $row['Id']; ?></td>
        <td><?php echo $row['Name']; ?></td>
        <td><?php echo $row['Description']; ?></td>
        <td><?php echo $row['Price']; ?></td>
        <td><?php echo $row['Quantity']; ?></td>
        <td><?php echo $row['Created_at']; ?></td>
        <td><?php echo $row['Updated_at']; ?></td>
        <td>
            <a href="update.php?id=<?php echo $row['Id']; ?>">Edit</a> | 
            <a href="delete.php?id=<?php echo $row['Id']; ?>" onclick="return confirm('Are you sure?')">Delete</a>
        </td>
    </tr>
    <?php } ?>
</table>
