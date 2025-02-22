<?php
session_start();
include_once "admin/database/connection.php";
include_once "function/pagination.php";
$sel_products = "SELECT * FROM products";
$sel_query = $conn->query($sel_products);

if(isset($_SESSION['user_id'])){
  $id = $_SESSION['user_id'];
  $select_user = "SELECT * FROM users WHERE id = $id ";
  $query_user = $conn->query($select_user);
  $user = $query_user->fetch_assoc();
}
?>




<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Boutique | Ecommerce </title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="robots" content="all,follow">
  <!-- Bootstrap CSS-->
  <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
  <!-- Lightbox-->
  <link rel="stylesheet" href="vendor/lightbox2/css/lightbox.min.css">
  <!-- Range slider-->
  <link rel="stylesheet" href="vendor/nouislider/nouislider.min.css">
  <!-- Bootstrap select-->
  <link rel="stylesheet" href="vendor/bootstrap-select/css/bootstrap-select.min.css">
  <!-- Owl Carousel-->
  <link rel="stylesheet" href="vendor/owl.carousel2/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="vendor/owl.carousel2/assets/owl.theme.default.css">
  <!-- Google fonts-->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@300;400;700&amp;display=swap">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Martel+Sans:wght@300;400;800&amp;display=swap">
  <!-- theme stylesheet-->
  <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
  <!-- Custom stylesheet - for your changes-->
  <link rel="stylesheet" href="css/custom.css">
  <!-- Favicon-->
  <link rel="shortcut icon" href="img/favicon.png">
  <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>

<body>
  <div class="page-holder">
    <!-- navbar-->
    <header class="header bg-white">
      <div class="container px-0 px-lg-3">
        <nav class="navbar navbar-expand-lg navbar-light py-3 px-lg-0"><a class="navbar-brand" href="index.php"><span class="font-weight-bold text-uppercase text-dark">Boutique</span></a>
          <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item">
                <!-- Link--><a class="nav-link" href="index.php">Home</a>
              </li>
              <li class="nav-item">
                <!-- Link--><a class="nav-link active" href="shop.php?action=all">Shop</a>
              </li>
              <li class="nav-item">
                <!-- Link--><a class="nav-link" href="shop.php?action=all">Product detail</a>
              </li>
              <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" id="pagesDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pages</a>
                <div class="dropdown-menu mt-3" aria-labelledby="pagesDropdown"><a class="dropdown-item border-0 transition-link" href="index.php">Homepage</a><a class="dropdown-item border-0 transition-link" href="shop.php?action=all">Category</a><a class="dropdown-item border-0 transition-link" href="shop.php?action=all">Product detail</a><a class="dropdown-item border-0 transition-link" href="cart.php">Shopping cart</a><a class="dropdown-item border-0 transition-link" href="checkout.php">Checkout</a></div>
              </li>
            </ul>
            <ul class="navbar-nav ml-auto">
              <li class="nav-item"><a class="nav-link" href="cart.php"> <i class="fas fa-dolly-flatbed mr-1 text-gray"></i>Cart<small class="text-gray">(2)</small></a></li>
              <li class="nav-item"><a class="nav-link" href="#"> <i class="far fa-heart mr-1"></i><small class="text-gray"> (0)</small></a></li>
              <?php if(isset($_SESSION['user_id'])){ ?>
                <!-- <li class="nav-item"><a class="nav-link" href="admin/database/user_logout.php"> <i class="fas fa-user-alt mr-1 text-gray"></i>Logout</a></li> -->
                <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" id="pagesDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user-alt mr-1 text-gray"></i><?= $user['name'] ?></a>
                  <div class="dropdown-menu mt-3" aria-labelledby="pagesDropdown"><a class="dropdown-item border-0 transition-link" href="admin/database/user_logout.php">Logout</a></div>
                </li>
                <?php }else{ ?>
                <li class="nav-item"><a class="nav-link" href="login.php"> <i class="fas fa-user-alt mr-1 text-gray"></i>Login</a></li>
             <?php } ?>            </ul>
          </div>
        </nav>
      </div>
    </header>
    <!--  Modal -->
    <div class="modal fade" id="productView" tabindex="-1" role="dialog" aria-hidden="true">

    </div>
    <div class="container">
      <!-- HERO SECTION-->
      <section class="py-5 bg-light">
        <div class="container">
          <div class="row px-4 px-lg-5 py-lg-4 align-items-center">
            <div class="col-lg-6">
              <h1 class="h2 text-uppercase mb-0">Shop</h1>
            </div>
            <div class="col-lg-6 text-lg-right">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-lg-end mb-0 px-0">
                  <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Shop</li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </section>
      <section class="py-5">
        <div class="container p-0">
          <div class="row">
            <!-- SHOP SIDEBAR-->
            <div class="col-lg-3 order-2 order-lg-1">
              <h5 class="text-uppercase mb-4">Categories</h5>
              <div class="py-2 px-4 bg-dark text-white mb-3"><strong class="small text-uppercase font-weight-bold">ALL CATEGORIES</strong></div>
              <ul class="list-unstyled small text-muted pl-lg-4 font-weight-normal">
                <li class="mb-2"><a class="reset-anchor" href="?action=all">All</a></li>
                <li class="mb-2"><a class="reset-anchor" href="?action=mobiles">Mobiles</a></li>
                <li class="mb-2"><a class="reset-anchor" href="?action=laptops">Laptops</a></li>
                <li class="mb-2"><a class="reset-anchor" href="?action=watches">Watches</a></li>
                <li class="mb-2"><a class="reset-anchor" href="?action=clothes">Clothes</a></li>
              </ul>
         
              <h6 class="text-uppercase mb-4">Price range</h6>
              <div class="price-range pt-4 mb-5">
                <div id="range"></div>
                <div class="row pt-2">
                  <div class="col-6"><strong class="small font-weight-bold text-uppercase">From</strong></div>
                  <div class="col-6 text-right"><strong class="small font-weight-bold text-uppercase">To</strong></div>
                </div>
              </div>
              <h6 class="text-uppercase mb-3">Show only</h6>
              <div class="custom-control custom-checkbox mb-1">
                <input class="custom-control-input" id="customCheck1" type="checkbox">
                <label class="custom-control-label text-small" for="customCheck1">Returns Accepted</label>
              </div>
              <div class="custom-control custom-checkbox mb-1">
                <input class="custom-control-input" id="customCheck2" type="checkbox">
                <label class="custom-control-label text-small" for="customCheck2">Returns Accepted</label>
              </div>
              <div class="custom-control custom-checkbox mb-1">
                <input class="custom-control-input" id="customCheck3" type="checkbox">
                <label class="custom-control-label text-small" for="customCheck3">Completed Items</label>
              </div>
              <div class="custom-control custom-checkbox mb-1">
                <input class="custom-control-input" id="customCheck4" type="checkbox">
                <label class="custom-control-label text-small" for="customCheck4">Sold Items</label>
              </div>
              <div class="custom-control custom-checkbox mb-1">
                <input class="custom-control-input" id="customCheck5" type="checkbox">
                <label class="custom-control-label text-small" for="customCheck5">Deals &amp; Savings</label>
              </div>
              <div class="custom-control custom-checkbox mb-4">
                <input class="custom-control-input" id="customCheck6" type="checkbox">
                <label class="custom-control-label text-small" for="customCheck6">Authorized Seller</label>
              </div>
              <h6 class="text-uppercase mb-3">Buying format</h6>
              <div class="custom-control custom-radio">
                <input class="custom-control-input" id="customRadio1" type="radio" name="customRadio">
                <label class="custom-control-label text-small" for="customRadio1">All Listings</label>
              </div>
              <div class="custom-control custom-radio">
                <input class="custom-control-input" id="customRadio2" type="radio" name="customRadio">
                <label class="custom-control-label text-small" for="customRadio2">Best Offer</label>
              </div>
              <div class="custom-control custom-radio">
                <input class="custom-control-input" id="customRadio3" type="radio" name="customRadio">
                <label class="custom-control-label text-small" for="customRadio3">Auction</label>
              </div>
              <div class="custom-control custom-radio">
                <input class="custom-control-input" id="customRadio4" type="radio" name="customRadio">
                <label class="custom-control-label text-small" for="customRadio4">Buy It Now</label>
              </div>
            </div>
            <!-- SHOP LISTING-->
            <div class="col-lg-9 order-1 order-lg-2 mb-5 mb-lg-0">
              <div class="row mb-3 align-items-center">
                <div class="col-lg-6 mb-2 mb-lg-0">
                  <p class="text-small text-muted mb-0">Showing 1–12 of 53 results</p>
                </div>
                <div class="col-lg-6">
                  <ul class="list-inline d-flex align-items-center justify-content-lg-end mb-0">
                    <li class="list-inline-item text-muted mr-3"><a class="reset-anchor p-0" href="#"><i class="fas fa-th-large"></i></a></li>
                    <li class="list-inline-item text-muted mr-3"><a class="reset-anchor p-0" href="#"><i class="fas fa-th"></i></a></li>
                    <li class="list-inline-item">
                      <select class="selectpicker ml-auto" name="sorting" data-width="200" data-style="bs-select-form-control" data-title="Default sorting">
                        <option value="default">Default sorting</option>
                        <option value="popularity">Popularity</option>
                        <option value="low-high">Price: Low to High</option>
                        <option value="high-low">Price: High to Low</option>
                      </select>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="row">
                <?php

                foreach ($pro_result as $product) {
        
                    $id = $product['id'];

                    $sel_img = "SELECT * FROM images WHERE pro_id = $id ";
                    $sel_img_query = $conn->query($sel_img);
                    $img = $sel_img_query->fetch_assoc();
                ?>
                    <!-- PRODUCT-->
                    <div class="col-lg-4 col-sm-6">
                      <div class="product text-center">
                        <div class="mb-3 position-relative">
                          <div class="badge text-white badge-"></div><a class="d-block" href="detail.php?id=<?= $product['id'] ?>"><img class="img-fluid w-100" src="admin/images/<?= $img['name'] ?>" alt="..."></a>
                          <div class="product-overlay">
                            <ul class="mb-0 list-inline">
                              <li class="list-inline-item m-0 p-0"><a class="btn btn-sm btn-outline-dark" href="#"><i class="far fa-heart"></i></a></li>
                              <li class="list-inline-item m-0 p-0"><a class="btn btn-sm btn-dark" href="admin/database/insert_cart.php?id=<?= $product['id'] ?>">Add to cart</a></li>
                              <li class="list-inline-item mr-0"><a class="btn btn-sm btn-outline-dark modalptn" data-proid="<?= $product['id'] ?>" href="#productView" data-toggle="modal"><i class="fas fa-expand"></i></a></li>
                            </ul>

                          </div>
                        </div>
                        <h6> <a class="reset-anchor" href="detail.php?id=<?= $product['id'] ?>"><?= $product['name'] ?></a></h6>
                        <p class="small text-muted">$ <?= $product['price'] ?></p>
                      </div>
                    </div>
                  
                <?php } ?> <!-- end of foreach-->

                <script src="shop_modal.js"></script>
              </div>
              <!-- PAGINATION-->
              <?php
              include_once "function/pagination.php";
              ?>
              <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center justify-content-lg-end">
                  <?php if ($page > 1): ?>
                    <li class="page-item"><a class="page-link" href="?page=<?= $page - 1 ?>&action=<?= $get_cat ?>" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
                  <?php endif; ?>

                  <?php
                    for($i=3 ; $i>=1 ; $i--){
                      ?>
                    <?php if ($page-$i >= 1): ?>
                      <li class="page-item "><a class="page-link" href="?page=<?= $page - $i ?>&action=<?= $get_cat ?>"><?= $page - $i ?></a></li>
                      <?php endif; ?>
                  <?php } ?>

                  <li class="page-item active"><a class="page-link" href="?page=<?= $page ?>&action=<?= $get_cat ?>"><?= $page ?></a></li>
                 
                  <?php
                    for($i=1 ; $i<=3 ; $i++){
                      ?>
                    <?php if ($page + $i <= $total_pages): ?>
                      <li class="page-item "><a class="page-link" href="?page=<?= $page + $i ?>&action=<?= $get_cat ?>"><?= $page + $i ?></a></li>
                      <?php endif; ?>
                  <?php } ?>
    
                  <?php if ($page != $total_pages): ?>
                    <li class="page-item"><a class="page-link" href="?page=<?= $page + 1 ?>&action=<?= $get_cat ?>" aria-label="Next"><span aria-hidden="true">»</span></a></li>
                    <?php endif; ?>
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </section>
    </div>
    <footer class="bg-dark text-white">
      <div class="container py-4">
        <div class="row py-5">
          <div class="col-md-4 mb-3 mb-md-0">
            <h6 class="text-uppercase mb-3">Customer services</h6>
            <ul class="list-unstyled mb-0">
              <li><a class="footer-link" href="#">Help &amp; Contact Us</a></li>
              <li><a class="footer-link" href="#">Returns &amp; Refunds</a></li>
              <li><a class="footer-link" href="#">Online Stores</a></li>
              <li><a class="footer-link" href="#">Terms &amp; Conditions</a></li>
            </ul>
          </div>
          <div class="col-md-4 mb-3 mb-md-0">
            <h6 class="text-uppercase mb-3">Company</h6>
            <ul class="list-unstyled mb-0">
              <li><a class="footer-link" href="#">What We Do</a></li>
              <li><a class="footer-link" href="#">Available Services</a></li>
              <li><a class="footer-link" href="#">Latest Posts</a></li>
              <li><a class="footer-link" href="#">FAQs</a></li>
            </ul>
          </div>
          <div class="col-md-4">
            <h6 class="text-uppercase mb-3">Social media</h6>
            <ul class="list-unstyled mb-0">
              <li><a class="footer-link" href="#">Twitter</a></li>
              <li><a class="footer-link" href="#">Instagram</a></li>
              <li><a class="footer-link" href="#">Tumblr</a></li>
              <li><a class="footer-link" href="#">Pinterest</a></li>
            </ul>
          </div>
        </div>
        <div class="border-top pt-4" style="border-color: #1d1d1d !important">
          <div class="row">
            <div class="col-lg-6">
              <p class="small text-muted mb-0">&copy; 2020 All rights reserved.</p>
            </div>
            <div class="col-lg-6 text-lg-right">
              <p class="small text-muted mb-0">Template designed by <a class="text-white reset-anchor" href="https://bootstraptemple.com/p/bootstrap-ecommerce">Bootstrap Temple</a></p>
            </div>
          </div>
        </div>
      </div>
    </footer>
    <!-- JavaScript files-->
    <script src="js/ajax.js"></script>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/lightbox2/js/lightbox.min.js"></script>
    <script src="vendor/nouislider/nouislider.min.js"></script>
    <script src="vendor/bootstrap-select/js/bootstrap-select.min.js"></script>
    <script src="vendor/owl.carousel2/owl.carousel.min.js"></script>
    <script src="vendor/owl.carousel2.thumbs/owl.carousel2.thumbs.min.js"></script>
    <script src="js/front.js"></script>
    <!-- Nouislider Config-->
    <script>
      var range = document.getElementById('range');
      noUiSlider.create(range, {
        range: {
          'min': 0,
          'max': 2000
        },
        step: 5,
        start: [100, 1000],
        margin: 300,
        connect: true,
        direction: 'ltr',
        orientation: 'horizontal',
        behaviour: 'tap-drag',
        tooltips: true,
        format: {
          to: function(value) {
            return '$' + value;
          },
          from: function(value) {
            return value.replace('', '');
          }
        }
      });
    </script>
    <script>
      // ------------------------------------------------------- //
      //   Inject SVG Sprite - 
      //   see more here 
      //   https://css-tricks.com/ajaxing-svg-sprite/
      // ------------------------------------------------------ //
      function injectSvgSprite(path) {

        var ajax = new XMLHttpRequest();
        ajax.open("GET", path, true);
        ajax.send();
        ajax.onload = function(e) {
          var div = document.createElement("div");
          div.className = 'd-none';
          div.innerHTML = ajax.responseText;
          document.body.insertBefore(div, document.body.childNodes[0]);
        }
      }
      // this is set to BootstrapTemple website as you cannot 
      // inject local SVG sprite (using only 'icons/orion-svg-sprite.svg' path)
      // while using file:// protocol
      // pls don't forget to change to your domain :)
      injectSvgSprite('https://bootstraptemple.com/files/icons/orion-svg-sprite.svg');
    </script>
    <!-- FontAwesome CSS - loading as last, so it doesn't block rendering-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  </div>
</body>

</html>