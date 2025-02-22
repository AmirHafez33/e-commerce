
<script>
function toggleCheckboxes(source) {
    let checkboxes = document.querySelectorAll('.checkbox');
    checkboxes.forEach(checkbox => {
        checkbox.checked = source.checked;
    });
}
</script>

<a href="?action=add"><button class="btn btn-primary">Add product</button></a>
<br>
<br>
<form action="database/delete_selected.php" method="post">
    <table class="table table-hover table-bordered ">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Price</th>
                <th>Image</th>
                <th>Category</th>
                <th>Controlls</th>
                <th>
                    <a><button type="submit" class="btn btn-danger"> delete selected</button></a>
                    <input type="checkbox" id="selectAll" onclick="toggleCheckboxes(this)"> All
                </th>
            </tr>
        </thead>
        <tbody>
            <?php
            include_once "database/connection.php";
        
             include_once "database/limit_rows_in_page.php";
    
            $read = "SELECT * FROM products";
            $query = $conn->query($read);
            ?>
            <?php while($product = $result->fetch_assoc()): ?>
            
                <tr>
                    <td><?= $product["id"] ?></td>
                    <td><?= $product["name"] ?></td>
                    <td><?= $product["price"] ?></td>
                    <td>
                        <?php
                        $id = $product['id'];
                        $selectimg = "SELECT * FROM images WHERE pro_id=$id";
                        $query = $conn->query($selectimg);
                        // $image_array = explode(',', $product['img']);
                        foreach ($query as $imgs) {

                            echo '<img style="width: 60px; hight: 60px;" src="images/' . $imgs['name'] . '">';
                        }
                        ?>
                    </td>
                    <td><?php
                        $id = $product['category'];
                        $select = "SELECT * FROM categories WHERE id='$id'";
                        $querycat = $conn->query($select);
                        $category = $querycat->fetch_assoc();
                        echo $category['name'];
                        ?></td>
                    <td>
                        <!-- <div class="btn btn-group btn-group-sm"> -->
                       
                        <a href="?action=edit&id=<?=$product['id']?>" class="btn btn-primary">Edit</a>
                        <!-- Button trigger modal -->
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#e<?= $product['id'] ?>">
                                Delete
                            </button>
                        <!-- </div> -->
                        <!-- Modal -->
                        <div class="modal fade" id="e<?= $product['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Alert</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Are You Sure You Want To Delete <span class="text-danger" style="font-weight: bold"><?= $product['name'] ?></span> ?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <a href="database/delete_product.php?id=<?= $product['id'] ?>"><button type="button" class="btn btn-danger">Confirm</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>

                    <td><input type="checkbox" class="checkbox" id="a" name="selected[]" value="<?= $product['id'] ?>"></td>

                </tr>
                <?php endwhile; ?>
        </tbody>
    </table>
    <!-- Pagination Links -->
<div class="pagination">
    <!-- Previous page link -->
    <?php if ($page > 1): ?>
        <a href="?page=<?php echo $page - 1; ?>">Previous</a>
    <?php endif; ?>

    <!-- Page number display -->
    <span>Page <?php echo $page; ?> of <?php echo $total_pages; ?></span>

    <!-- Next page link -->
    <?php if ($page < $total_pages): ?>
        <a href="?page=<?php echo $page + 1; ?>">Next</a>
    <?php endif; ?>
</div>

<?php
$conn->close(); // Close the connection
?>
</form>