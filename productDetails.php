<?php

session_start();
$connect = mysqli_connect("localhost", "root", "", "fkzdb");
$id = $_GET['id'];
$query = "SELECT * FROM products WHERE ID = $id";
$checkCart = "SELECT * from cart";
$result = mysqli_query($connect, $query);
$getCartNo = mysqli_query($connect, $checkCart);

if(isset($_POST["addCart"]))
{
    echo '<script>alert("Item added to cart")</script>';
    $prodID = $_POST['hidden_id'];
    $quantity = $_POST['quant'];
    $query = "INSERT INTO cart (productid, quantity) VALUES ('$prodID', '$quantity')";
    $exe = mysqli_query($connect,$query);
    
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Details | FlickStarzZ</title>
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
        <div class=”row”>       
        <?php
            $row = mysqli_fetch_array($result);
        ?>
            <div class="col-md-6">
                <img src="photos/<?php echo $row['image'] ?>" alt="Product Image" class="image-responsive">
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12">
                        <h1><?php echo $row['name']; ?></h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <span class="label label-primary"><?php echo $row['brand']; ?></span>
                        <span class="monospaced">Product ID. <?php echo $row['ID']; ?></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <p class="description">
                            <?php echo $row['description']; ?>
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 bottom-rule">
                        <h2 class="product-price text-danger">$<?php echo $row['price']; ?></h2>
                        <h4>In Stock</h4>
                    </div>
                </div>
                <hr>
                <div class="row add-to-cart">
                <form method="POST">
                    <div class="col-md-6 product-qty">  
                    <span>Quantity: </span>              
                        <input class="btn-lg btn-qty" name="quant" value="1" />
                    </div>                    
                    <div class="col-md-4">                    
                        <input type="submit" id="addCart" name="addCart" class="btn btn-lg btn-warning" value="Add to Cart">
                        <input type="hidden" name="hidden_id" id="price<?php echo $row['ID']; ?>" value="<?php echo $row['ID']; ?>">                    
                    </div>                    
                </form>
                </div><!-- end row -->     
                <hr>       
                <div class="row">
                    <div class="col-md-12">
                        <a href="products.php?page=1"><button class="btn btn-lg btn-brand btn-full-width"><span class="glyphicon glyphicon-circle-arrow-left"></span>  Back</button></a>
                    </div>
                </div> 
                <div class="row">
                    <div class="col-md-12 bottom-rule top-10"></div>
                </div>
            </div>
        </div>    
    </div>       
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