<?php
include "database/connection.php";
$id = $_GET["id"];
$read_admin = "SELECT * FROM ADMIN WHERE id ='$id'";
$query = $conn->query($read_admin);
$admin = $query->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>edit</title>
</head>

<body>
    <form action="database/update.php?id=<?= $admin['id'] ?>" method="POST">
        <div class="mb-3 mt-3">
            <label for="username" class="form-label">Username:</label>
            <input type="text" class="form-control" id="username" placeholder="Enter username" name="username" value="<?= $admin['name'] ?>">
        </div>
        <div class="mb-3 mt-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="<?= $admin['email'] ?>">
        </div>
        <div class="mb-3">
            <label for="cat">prev:</label>
            <select name="prev" id="prev" class="form-control">
                <?php
                include_once "database/connection.php";
                $select = "SELECT * FROM prev ";
                $query = $conn->query($select);
                foreach ($query as $prev) {
                ?>
                    <option value="<?= $prev['id'] ?>"><?= $prev['name'] ?></option>
                <?php } ?>
            </select>
        </div>
        
        <div class="mb-3">
            <label for="pwd" class="form-label">Password:</label>
            <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password" value="<?= $admin['password'] ?>">
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