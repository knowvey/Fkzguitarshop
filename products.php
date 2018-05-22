<?php

session_start();
$connect = mysqli_connect("localhost", "root", "", "fkzdb");
$query = "SELECT * FROM products ORDER BY ID";
$checkCart = "SELECT * from cart";

$page = $_GET['page'];
$pageL = 0;
$pageH = 6;

if($page == 2)
{
    $pageL = 6;
    $pageH = 12;
}

$result = mysqli_query($connect, $query);
$getCartNo = mysqli_query($connect, $checkCart);
$num_rows = mysqli_num_rows($getCartNo);

if(isset($_POST["add_to_cart"]))
{    
    $prodID = $_POST['hidden_id'];
    $quantity = 1;
    $query = "INSERT INTO cart (productid, quantity) VALUES ('$prodID', '$quantity')";
    $exe = mysqli_query($connect,$query);
    header("Refresh:0");        
    echo '<script>alert("Item added to cart")</script>';       
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Products | FlickStarzZ</title>
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
                <!--            </div> <a class="btn btnP btn-warning btn-md" href="products.html" role="button">VIEW PRODUCTS</a> </div>--></header>
    <!--========================-->
    <!--==================-->
    <h1 class="text-center prod"><strong>PRODUCTS</strong></h1>
    <hr>
    <div class="container">
        <div class="row text-center">
        <div class="row">
        <ul class="nav navbar-left">          
          <li><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>  Cart  <span class="badge"><?php echo $num_rows ?></span></a></li>
        </ul>
        </div>     
        <div class="tab-content">        
            <div id="products" class="tab-pane fade in active">
            <?php                
                if(mysqli_num_rows($result) > 0)
                {                    
                    for($i = 0; $i < mysqli_num_rows($result); $i++)                    
                    {
                        $row = mysqli_fetch_array($result);
                        if($i >= $pageL && $i < $pageH)
                        {
                        ?>                            
                        <div class="col-sm-6 col-md-4 col-lg-4 col-xs-6">
                            <div class="thumbnail"><a href="productDetails.php?id=<?php echo $row['ID'] ?>"> <img src="photos/<?php echo $row['image']; ?>" alt="Thumbnail Image 1" class="img-responsive" height="500px"></a>
                                <div class="caption">
                                    <h3><?php echo $row['name']; ?></h3>
                                    <!--<p><?php echo $row['description']; ?></p>-->
                                    <form method="POST">
                                    <h3 class="text-danger" >$<?php echo $row['price'] ?></h3>
                                    <input type="hidden" name="hidden_id" value="<?php echo $row['ID']; ?>">
                                    <input type="submit" name="add_to_cart" class="btn btn-warning add_to_cart" value="Add to Cart" />
                                    </form>    
                                </div>
                            </div>
                        </div> 
                        <?php  
                        }                      
                    }
                }
            ?>    
            </div>
            <div id="cart" class="tab-pane fade">
                
            </div>          
        <div class="text-center">
            <ul class="pagination">
                <li class="<?php
                    if($page == 1)
                        echo "disabled"
                    ?>">
                    <a href="products.php?page=1" aria-label="Previous"> <span aria-hidden="true">&laquo;</span> </a>
                </li>
                <li class="<?php
                    if($page == 1)
                        echo "active"
                    ?>"><a href="products.php?page=1">1</a></li>
                <li class="<?php
                    if($page == 2)
                        echo "active"
                    ?>"><a href="products.php?page=2">2</a></li>                
                <li class="<?php
                    if($page == 2)
                        echo "disabled"
                    ?>">
                    <a href="<?php
                    if($page == 1)
                        echo "products.php?page=2"
                    ?>" aria-label="Next"> <span aria-hidden="true">&raquo;</span> </a>
                </li>
            </ul>
        </div>
        <hr>
        <!--    ================-->
        <div class="well well-lg container-fluid">
            <h2 class="text-center">FEATURED PRODUCTS</h2>
            <hr>
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-xs-12">
                        <div class="media-object-default">
                            <div class="well well-sm">
                                <div class="media">
                                    <div class="media-left">
                                        <a href="productDetails.php?id=7"> <img class="media-object" src="photos/Takamine/cp3dc-ov_thumbnail.png" alt="placeholder image" width="150px"> </a>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="media-heading">
                                        Takamine CP3DC-OV
                                        </h4> Elegantly appointed with resonant tonewoods, decorative touches and state-of-the-art electronics. An exquisite acoustic experience onstage and off.</div>
                                </div>
                            </div>
                            <div class="well well-sm">
                                <div class="media">
                                    <div class="media-left">
                                        <a href="productDetails.php?id=8"> <img class="media-object" src="photos/Takamine/p5dc_thumbnail.png" alt="placeholder image" width="150px"> </a>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="media-heading">Takamine P5DC</h4>Takamine’s stylish P5DC dreadnought cutaway combines tradition with contemporary refinements, including a resonant solid spruce top with “X” top bracing for superior clarity and projection, and a solid rosewood back with rosewood sides for a rich, warm sound.</div>
                                </div>
                            </div>
                            <div class="well well-sm">
                                <div class="media">
                                    <div class="media-left">
                                        <a href="productDetails.php?id=9"> <img class="media-object" src="photos/Takamine/ef250tk_thumbnail.png" alt="placeholder image" width="150px"></a>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="media-heading">
                                        Takamine EF250TK
                                        </h4> Takamine is very proud to introduce the EF250TK Toby Keith Signature model, designed in cooperation with the top-selling country superstar and crafted to his exacting specs. Based on his longtime workhorse acoustic, the Takamine TF250SMCSB, it features a full-sounding jumbo body with a convenient cutaway, solid spruce top with “X” bracing, and beautiful flame maple back and sides. </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="hidden-md hidden-lg">
                    <div class="col-lg-6 col-md-6 col-xs-12">
                        <div class="media-object-default">
                            <div class="well well-sm">
                                <div class="media">
                                    <div class="media-left">
                                        <a href="productDetails.php?id=10"> <img class="media-object" src="photos/Epiphone/DR100LE_Thumb.png" alt="placeholder image" width="150px"></a>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="media-heading">
                                        Epiphone DR100LE
                                        </h4> For decades, the DR-100 has been Epiphone’s best selling acoustic guitar with the look, sound, and build quality that first time players and professionals expect when they play an Epiphone. The dreadnought profile is considered to be the classic go-to shape for every kind of music including rock, bluegrass, folk, country, and everything in-between.</div>
                                </div>
                            </div>
                            <div class="well well-sm">
                                <div class="media">
                                    <div class="media-left">
                                        <a href="productDetails.php?id=11"> <img class="media-object" src="photos/Epiphone/PR-150_Thumb.png" alt="placeholder image" width="150px"></a>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="media-heading">Epiphone PR-150</h4> For such an easy-to-afford guitar, the Epiphone PR-150 is a standout -- a perfect instrument to get started on. It is a dreadnought and features a spruce top, mahogany back and sides, and a mahogany neck with rosewood fretboard. The PR-150 sounds great and this Epiphone's sunburst finish gives it the look of a far more expensive guitar.</div>
                                </div>
                            </div>
                            <div class="well well-sm">
                                <div class="media">
                                    <div class="media-left">
                                        <a href="productDetails.php?id=12"> <img class="media-object" src="photos/Epiphone/Pro1Plus_Thumb.png" alt="placeholder image" width="150px"></a>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="media-heading">Epiphone PRO1 PLUS</h4> The PRO-1 Plus comes with a Solid Spruce top for superior sound with beautiful 5-layer Ivory and Black binding just like Epiphone’s vintage classics and features all of the PRO Collection's breakthrough innovations. Epiphone, one of the world’s oldest and most respected guitar makers, has just made playing and learning guitar easy for everyone. </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="hidden-lg">
        </div>
    </div>
    </div>
    </div>
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