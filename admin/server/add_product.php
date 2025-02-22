<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>add_product</title>
</head>

<body>
    <form action="database/insert_product.php" method="POST" enctype="multipart/form-data">
        <div class="mb-3 mt-3">
            <label for="username" class="form-label">name:</label>
            <input type="text" class="form-control" id="username" placeholder="Enter name" name="name" required>
        </div>
        <div class="mb-3 mt-3">
            <label for="price" class="form-label">Price:</label>
            <input type="text" class="form-control" id="price" placeholder="Enter price" name="price" required>
        </div>
        <div class="mb-3 mt-3">
            <label for="price" class="form-label">image:</label>
            <input type="file" class="form-control" id="image" placeholder="Enter image" name="image[]" multiple required>
        </div>
        <div class="mb-3">
            <label for="cat">Category:</label>
            <select name="Category" id="cat" class="form-control">
                <?php
                include "database/connection.php";
                $select = "SELECT * FROM categories ";
                $query = $conn->query($select);
                foreach ($query as $cat) {
                ?>
                    <option value="<?= $cat['id'] ?>"><?= $cat['name'] ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="mb-3 mt-3">
            <label for="Description" class="form-label">Description:</label>
            <input type="text" class="form-control" id="c" placeholder="Enter Description" name="Description"  required>
        </div>
        <div class="form-check mb-3">
            <label class="form-check-label">
                <input class="form-check-input" type="checkbox" name="remember"> Remember me
            </label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</body>

</html>