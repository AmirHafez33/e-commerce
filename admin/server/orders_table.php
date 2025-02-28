<!-- <a href="?action=add"><button class="btn btn-primary">Add admin</button></a> -->
<table class="table table-hover table-bordered ">
    <thead>
        <tr>
            <th>Id</th>
            <th>user</th>
            <th>UserName</th>
            <th>Email</th>
            <th>Phone</th> 
            <th>country</th>
            <th>Address</th>
            <th>City</th>
            <th>Price</th>
            <th>delivery</th>
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
                     <?php
                     if($order['state']=="delivered"){ ?>
                     <button type="button" class="btn delivery" style="background-color:rgb(105, 228, 52) ; color:black ;" data-toggle="modal" data-target="#e<?= $order['id'] ?>">
                        delivered
                    </button>
                     <?php }else{ ?>
                    <button type="button" class="btn delivery" style="background-color:rgb(228, 202, 52) ; color:black ;" data-toggle="modal" data-target="#e<?= $order['id'] ?>">
                        in_transit
                    </button>
                    <?php } ?>
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
                                    <a href="database/update_order.php?id=<?= $order['id'] ?>"><button data-msgid="<?= $order['id'] ?>" type="button" class="btn read" style="background-color:rgb(105, 228, 52) ; color:black ;">delivered</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>