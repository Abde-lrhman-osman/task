
<form method="post" action="addbook.php">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required>
    <br>
    <label for="price">Price:</label>
    <input type="text" id="price" name="price" required>
    <br>
    <input type="submit" value="Add Book" name="addbook">
</form>
<?php
include("connection.php"); 
if (isset($_POST['addbook'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];

    
    $insertSQL = "INSERT INTO namebook (name, price) VALUES ('$name', '$price')";

    if ($conn->query($insertSQL) === TRUE) {
        echo "Book added successfully";
    } else {
        echo "Error adding book: " . $conn->error;
    }
}
?>
<?php
include("connection.php"); 
$selectSQL = "SELECT * FROM namebook";
$result = $conn->query($selectSQL);

if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>ID</th><th>Name</th><th>Price</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['price'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No books found";
}
?>

