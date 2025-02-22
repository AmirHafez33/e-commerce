<?php
          $sel_products = "SELECT * FROM products";
          $sel_query = $conn->query($sel_products);
          
          foreach($sel_query as $product){
            $id = $product['id'];
            
          $sel_img = "SELECT * FROM images WHERE pro_id = $id ";
          $sel_img_query = $conn->query($sel_img);
          $img = $sel_img_query->fetch_assoc();
          ?>
          <?php } ?>



         