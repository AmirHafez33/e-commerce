<a href="?action=add"><button class="btn btn-primary">Add admin</button></a>
<br>
<br>
<table class="table table-hover table-bordered ">
    <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>prev</th> 
            <th>Controlls</th>
        </tr>
    </thead>
    <tbody>
        <?php
        include "database/connection.php";
        $read = "SELECT * FROM admin";
        $query = $conn->query($read);

        
        foreach ($query as $admin) {
        ?>
        <?php
             $id = $admin['prev'];
                        $select_prev = "SELECT * FROM prev WHERE id='$id'";
                        $query_prev = $conn->query($select_prev);
                        $prev = $query_prev->fetch_assoc();
                        
            ?>
            <tr class="<?= $_SESSION['prev'] > $prev['prev_value'] ? 'visable' : 'unvisable' ; ?>">
                <td><?= $admin["id"] ?></td>
                <td><?= $admin["name"] ?></td>
                <td><?= $admin["email"] ?></td>
                <td>
                    <?php
                        echo $prev['name'] ;
                    ?>
                </td>
                <?php
                
                ?>
                <td>
                    <a href="?action=edit&id=<?= $admin['id'] ?>"><button class="btn btn-primary">Edit</button></a>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#e<?= $admin['id'] ?>">
                        Delete
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="e<?= $admin['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Alert</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Are You Sure You Want To Delete <span class="text-danger" style="font-weight: bold"><?= $admin['name'] ?></span> ?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <a href="database/delet_admin.php?id=<?= $admin['id'] ?>"><button type="button" class="btn btn-danger">Confirm</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>