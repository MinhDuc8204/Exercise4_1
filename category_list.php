<?php
require_once('database.php');

// Get all categories
$query = 'SELECT * FROM categories
                       ORDER BY categoryID';
$statement = $db->prepare($query);
$statement->execute();
$categories = $statement->fetchAll();
$statement->closeCursor();
?>
<!DOCTYPE html>
<html>

<!-- the head section -->

<head>
    <title>My Guitar Shop</title>
    <link rel="stylesheet" type="text/css" href="main.css" />
</head>

<!-- the body section -->

<body>
    <header>
        <h1>Product Manager</h1>
    </header>
    <main>
        <h1>Category List</h1>

        <table>
            <tr>
                <th>Name</th>
                <th>&nbsp;</th>
            </tr>
            <?php foreach ($categories as $categories) : ?>
                <tr>
                    <td><?php echo $categories['categoryName']; ?></td>
                    <form action="delete_category.php" method="post">
                        <td>
                            <input type="hidden" name="nameCate" value="<?php echo $categories["categoryID"]; ?>">
                            <button type="submit">Delete</button>
                        </td>
                    </form>
                </tr>
            <?php endforeach; ?>
        </table>

        <h2>Add Category</h2>
        <form action="add_category.php" method="post">
            <p>Name <input type="text" name="name"> <button type="submit">Add</button></p>
        </form>
        <br>
        <p><a href="index.php">List Products</a></p>

    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> My Guitar Shop, Inc.</p>
    </footer>
</body>

</html>