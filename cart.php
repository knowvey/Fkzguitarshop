<?php

session_start();
$connect = mysqli_connect("localhost", "root", "", "fkzdb");
$query = "SELECT * FROM products ORDER BY ID";
$result = mysqli_query($connect, $query);
$checkCart = "SELECT * from cart";
$getCartList = mysqli_query($connect, $checkCart);

if (isset($_POST["deleteItem"])) {
    $id = $_POST["hidden_id"];
    $query = "DELETE FROM cart WHERE ID = $id;";
    $exe = mysqli_query($connect,$query);
    header("Refresh:0"); 
    echo '<script>alert("Item removed from cart")</script>';   
}

if (isset($_POST["checkout"])) {    
    $query = "TRUNCATE cart";
    $exe = mysqli_query($connect,$query);
    header("Refresh:0"); 
    echo '<script>alert("Thank you for shopping.")</script>';   
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cart | FlickStarzZ</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jquery-3.2.0.min.js"></script>
    <link rel="icon" href="photos/ico.png"> </head>
<body>
    <header>
        <div class="trans-bg">
            <div class="container">
                <div class="newsletter">
                    <h4 class="newsL col-lg-offset-1 col-lg-4 col-md-offset-1 col-md-4 hidden-sm hidden-xs">Subscribe To Our Newsletter</h4>
                    <form id="formID">
                        <div class="col-lg-4 col-lg-offset-0 col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-1 col-xs-8 col-xs-offset-1">
                            <input type="email" class="form-control" style="margin-left: 0" id="exampleInputEmail1" placeholder="ENTER YOUR EMAIL ADDRESS"> </div>
                        <button type="submit" class="btn btnC btn-warning">Subscribe</button>
                    </form>
                </div>
                <div class="header-inner">
                    <a href="index.html" id="logo"></a>   
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="glyphicon glyphicon-menu-hamburger"></span>
                    <span class="sr-only">Toggle navigation</span>
                    </button>                 
                    <div id="navbar" class="navbar-collapse collapse">
                    <nav class="nav navbar-nav navbar-right">
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li><a href="products.php?page=1" class="current">Products</a></li>
                            <li><a href="about.html">About</a></li>
                        </ul>
                    </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="banner pull-right col-lg-offset-7 col-md-offset-6 col-sm-offset-5 col-xs-offset-5">
            <div class="banner-inner">
                <h2>TOP QUALITY GUITARS</h2>
                <p>100% Authentic, high quality products from top quality brands around the world.</p>
            </div> 
            <a class="btn btnP btn-warning btn-md" href="products.php?page=1" role="button">VIEW PRODUCTS</a> 
        </div>
    </header>
    <!--========================-->
    <!--==================-->       
    <hr>
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <div class="page-header">
            <h1>Shopping Cart</h1>
          </div>
        </div>
      </div><!-- end .row -->    
      <?php
      if(mysqli_num_rows($getCartList) > 0)
        {                    
            for($i = 0; $i < mysqli_num_rows($getCartList); $i++)                    
            {            
                $curProd = mysqli_fetch_array($getCartList);   
                $prodID = $curProd['productid'];
                $query = "SELECT * FROM products WHERE ID = $prodID";
                $result = mysqli_query($connect, $query);
                $row = mysqli_fetch_array($result);   

      ?>
      <div class="row">
            <div class="row">
              <div class="col-xs-12">
                <form method="POST">
                  <div class="row cart-row">
                      <div class="col-xs-12 col-sm-2">
                        <div class="pull-left">
                          <button href="" name="deleteItem"><span class="glyphicon glyphicon-remove-sign"></span></button>
                          <input type="hidden" name="hidden_id" value="<?php echo $curProd['ID']; ?>">
                        </div>
                        <a href="#">
                          <img 
                            src="photos/<?php echo $row['image']; ?>"
                            alt="Product Image" 
                            class="img-responsive"></a> 
                        </div>                                 
                        <div class="col-xs-12 col-sm-4">
                          <h3><a href="#"><?php echo $row['name']; ?></a></h3>  
                          <small><?php echo $row['brand']; ?></small>       
                        </div>
                        <div class="col-xs-5 col-sm-2">
                          <h3 class="h3-price text-danger">$<?php echo $row['price']; ?></h3>
                          <small>each</small>
                        </div>
                        <div class="col-xs-7 col-sm-2">
                          <div class="form-group">
                            <input 
                              type="number" 
                              name="updates"                             
                              value="<?php echo $curProd['quantity']; ?>"              
                             class="cart-qty-input" 
                            >
                            <small>quantity</small>
                          </div>
                        </div>
                        <div class="col-xs-12 col-sm-2">
                          <h3 class="h3-price">$<?php
                                $total = $curProd['quantity'] * $row['price'];
                             echo $total; ?>
                          </h3>
                          <small>item total</small>
                        </div>
                    </div><!-- end .row.cart-row --> 
                </form>
              </div>
            </div>  
        </div>
        <?php } } else {?>
        <h4 class="text-center">No items added</h4>
        <?php }?>
        <hr>
        <div class="row">
            <form method="POST">
            <div class="col-md-12 text-right">
                <a href="products.php?page=1" class="btn btn-lg btn-brand btn-full-width"><span class="glyphicon glyphicon-circle-arrow-left"></span>  Continue Shopping</a>
                <input type="submit" name="checkout" class="btn btn-lg btn-warning" value="Checkout">
            </div>
            </form>
        </div>
    </div> 
    <hr>
    </div><!-- end .container-fluid -->

        <!--    ================-->        
    <footer>
        <div class="container-fluid text-center">
            <section class="social-icons"> <a href="#"><i class="fa fa-facebook"></i></a> <a href="#"><i class="fa fa-youtube-play"></i></a> <a href="#"><i class="fa fa-twitter"></i></a> <a href="#"><i class="fa fa-instagram"></i></a> <a href="#"><i class="fa fa-google-plus"></i></a> </section>
            <section class="footer-nav">
                <ul>
                    <li><a href="index.html" class="current">Home</a></li>
                    <li><a href="products.html">Products</a></li>
                    <li><a href="about.html">About</a></li>
                </ul>
            </section>
            <section class="copyright">
                <p>Copyright &copy 2016-2017 FlickStarzZ, Inc. All rights Reserved</p>
            </section>
        </div>
    </footer>
</body>
</html>