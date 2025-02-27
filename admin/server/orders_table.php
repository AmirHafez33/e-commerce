<a href="?action=add"><button class="btn btn-primary">Add admin</button></a>
<br>
<br>
<table class="table table-hover table-bordered ">
    <thead>
        <tr>
            <th>Id</th>
            <th>User-Id</th>
            <th>UserName</th>
            <th>Email</th>
            <th>Phone</th> 
            <th>country</th>
            <th>Address</th>
            <th>City</th>
            <th>Total-Price</th>
            <th>control</th>
        </tr>
    </thead>
    <tbody>
        <?php
        include "database/connection.php";
        $read = "SELECT * FROM orders";
        $query = $conn->query($read);

        
        foreach ($query as $order) {
        ?>
        
            <tr class="">
                <td><?= $order["id"] ?></td>
                <td><?= $order["user_id"] ?></td>
                <td><?= $order["username"] ?></td>
                <td><?= $order["email"] ?></td>
                <td><?= $order["phone"] ?></td>
                <td><?= $order["Country"] ?></td>
                <td><?= $order["Address"] ?></td>
                <td><?= $order["city"] ?></td>
                <td><?= $order["total_price"] ?></td>
                <td>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#e<?= $order['id'] ?>">
                        Delete
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="e<?= $order['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Alert</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Are You Sure You Want To Delete <span class="text-danger" style="font-weight: bold"><?= $order['id'] ?></span> ?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <a href="database/delete_order.php?id=<?= $order['id'] ?>"><button type="button" class="btn btn-danger">Confirm</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>