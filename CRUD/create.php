<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Create Product</title>
</head>
<body>
    <h2>Create Product</h2>
    <form action="create.php" method="post">
        Name: <input type="text" name="name" required><br>
        Description: <textarea name="description"></textarea><br>
        Price: <input type="number" step="0.01" name="price" required><br>
        Quantity: <input type="number" name="quantity" required><br>
        <input type="submit" name="submit" value="Create">
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $quantity = $_POST['quantity'];

        $sql = "INSERT INTO products (Name, Description, Price, Quantity) VALUES ('$name', '$description', '$price', '$quantity')";
        
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    ?>
    <a href="index.php">Back to List</a>
</body>
</html>
