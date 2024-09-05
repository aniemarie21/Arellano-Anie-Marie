<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Update Product</title>
</head>
<body>
    <h2>Update Product</h2>

    <?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $sql = "SELECT * FROM products WHERE Id=$id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            ?>
            <form action="update.php?id=<?php echo $id; ?>" method="post">
                Name: <input type="text" name="name" value="<?php echo $row['Name']; ?>" required><br>
                Description: <textarea name="description"><?php echo $row['Description']; ?></textarea><br>
                Price: <input type="number" step="0.01" name="price" value="<?php echo $row['Price']; ?>" required><br>
                Quantity: <input type="number" name="quantity" value="<?php echo $row['Quantity']; ?>" required><br>
                <input type="submit" name="update" value="Update">
            </form>
            <?php
        } else {
            echo "Record not found!";
        }
    }

    if (isset($_POST['update'])) {
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $quantity = $_POST['quantity'];

        $sql = "UPDATE products SET Name='$name', Description='$description', Price='$price', Quantity='$quantity' WHERE Id=$id";
        
        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $conn->error;
        }
    }
    ?>
    <a href="index.php">Back to List</a>
</body>
</html>
