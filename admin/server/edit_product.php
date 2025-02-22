<?php
include_once "database/connection.php";
$id = $_GET["id"];
$read_product = "SELECT * FROM products WHERE id ='$id'";
$query_pro = $conn->query($read_product);
$product = $query_pro->fetch_assoc();

$read_img = "SELECT * FROM images WHERE pro_id = $id";
$query_img = $conn->query($read_img);
$image = $query_img->fetch_assoc();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>edit_product</title>
</head>

<body>
    <form action="database/update_product.php?id=<?= $product['id'] ?>" method="POST" enctype="multipart/form-data">
        <div class="mb-3 mt-3">
            <label for="username" class="form-label">name:</label>
            <input type="text" class="form-control" id="username" placeholder="Enter name" name="name" value="<?= $product['name'] ?>">
        </div>
        <div class="mb-3 mt-3">
            <label for="price" class="form-label">Price:</label>
            <input type="text" class="form-control" id="price" placeholder="Enter price" name="price" value="<?= $product['price'] ?>">
        </div>
        <div class="mb-3 mt-3">
            <label for="image" class="form-label">image:</label>
            <input type="file" class="form-control" id="image" placeholder="Enter image" name="image[]" multiple value="<?= $image['name'] ?>">
        </div>

        <div class="mb-3">
            <label for="cat">Category:</label>
            <select name="Category" id="cat" class="form-control">
                <?php
                include_once "database/connection.php";
                $select_cat = "SELECT * FROM categories ";
                $query_cat = $conn->query($select_cat);
                foreach ($query_cat as $cat) {
                ?>
                    <option value="<?= $cat['id'] ?>"><?= $cat['name'] ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="mb-3 mt-3">
            <label for="Description" class="form-label">Description:</label>
            <input type="text" class="form-control" id="Description" placeholder="Enter Description" name="Description" value="<?= $product['Description'] ?>">
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