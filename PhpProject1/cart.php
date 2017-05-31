<?php
session_start();
include 'verificaOnline.php';
require_once './Manager/getData.php';
$manager = new getData();
error_reporting( error_reporting() & ~E_NOTICE );
?>
<html>
    <head>
        <title>Bike Shop a Ecommerce Category Flat Bootstarp Responsive Website Template| Cart :: w3layouts</title>
        <link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
        <!-- jQuery (Bootstrap's JavaScript plugins) -->
        <script src="js/jquery.min.js"></script>
        <!-- Custom Theme files -->
        <link href="css/form.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
        <!-- Custom Theme files -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="bike Shop Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
              Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
        <!--webfont-->
        <link href='http://fonts.googleapis.com/css?family=Roboto:500,900,100,300,700,400' rel='stylesheet' type='text/css'>
        <!--webfont-->
        <!-- dropdown -->
        <script src="js/jquery.easydropdown.js"></script>
        <link href="css/nav.css" rel="stylesheet" type="text/css" media="all"/>
        <script src="js/scripts.js" type="text/javascript"></script>
        <!--js-->

    </head>
    <body>
        <!--banner-->
        <script src="js/responsiveslides.min.js"></script>
        <script>
            $(function () {
                $("#slider").responsiveSlides({
                    auto: false,
                    nav: true,
                    speed: 500,
                    namespace: "callbacks",
                    pager: true,
                });
            });
        </script>
        <div class="banner-bg banner-sec">	
            <div class="container">
                <div class="header">
                    <div class="logo">
                        <a href="indexRegistado.php"><img src="images/logo.png" alt=""/></a>
                    </div>							 
                    <div class="top-nav">										 
                        <label class="mobile_menu" for="mobile_menu">
                            <span>Menu</span>
                        </label>
                        <input id="mobile_menu" type="checkbox">
                        <ul class="nav">
                            <li class="dropdown1"><a href="bicycles.php">BICYCLES</a>
                                <ul class="dropdown2">
                                    <li><a href="bicycles.php">FIXED / SINGLE SPEED</a></li>
                                    <li><a href="bicycles.php">CITY BIKES</a></li>
                                    <li><a href="bicycles.php">PREMIMUN SERIES</a></li>												
                                </ul>
                            </li>
                            <li class="dropdown1"><a href="suasCompras.php">Área Cliente</a>
                                <ul class="dropdown2">
                                    <li><a href="suasCompras.php">CHAINS</a></li>
                                    <li><a href="suasCompras.php">TUBES</a></li>
                                    <li><a href="suasCompras.php">TIRES</a></li>
                                    <li><a href="suasCompras.php">DISC BREAKS</a></li>
                                </ul>
                            </li>      
                            <li class="dropdown1"><a href="accessories.php">ACCESSORIES</a>
                                <ul class="dropdown2">
                                    <li><a href="accessories.php">LOCKS</a></li>
                                    <li><a href="accessories.php">HELMETS</a></li>
                                    <li><a href="accessories.php">ARM COVERS</a></li>
                                    <li><a href="accessories.php">JERSEYS</a></li>
                                </ul>
                            </li>               
                            <li class="dropdown1"><a href="404.html">EXTRAS</a>
                                <ul class="dropdown2">
                                    <li><a href="404.html">CLASSIC BELL</a></li>
                                    <li><a href="404.html">BOTTLE CAGE</a></li>
                                    <li><a href="404.html">TRUCK GRIP</a></li>
                                </ul>
                            </li>
                            <a class="shop" href="cart.php"><img src="images/cart.png" alt=""/></a>
                        </ul>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div> 				 
        </div>
        <!--/banner-->
        <div class="cart">
            <div class="container">
                <div class="cart-top">
                    <a href="indexRegistado.php"><< home</a>
                </div>	

                <div class="col-md-9 cart-items">
                    <h2>My Shopping Bag</h2>
                    
                    <?php
                    $dat = $manager->getartigo(filter_input(INPUT_GET, 'cod', FILTER_SANITIZE_SPECIAL_CHARS));
                    $marca = $dat['Marca'];
                    $preco = $dat['preco'];
                    $imagem = $dat['imagem'];
                    //print_r($_SESSION["cart_products"]);
                    
                    
                    
                    if (isset($_SESSION["cart_products"]) && count($_SESSION["cart_products"]) > 0) {
                        foreach ($_SESSION["cart_products"] as $cart_itm) {
                            $product_name = $cart_itm["product_name"];
                            $product_qty = $cart_itm["product_qty"];
                            $product_price = $cart_itm["product_price"];
                            $image = $cart_itm['imagem'];
                            $id=$cart_itm['cod'];
                    ?> <div class="cart-header2">
                        <div class="close2"> </div>
                        <div class="cart-sec">
                            <div class="cart-item">
                                <img src=<?= print_r($image) ?>/>
                            </div>
                            <div class="cart-item-info">
                                <h3><?= $product_name ?><span></span></h3>
                                <h4><span>€ </span><?= $product_price ?></h4>
                                <p class="qty">Quantidade ::</p>
                                <input min="1" type="number" id="quantity" name="quantity" value=<?=$product_qty ?> class="form-control input-small">
                            </div>
                            <div class="clearfix"></div>
                            <div class="delivery">
                                <p></p>
                                <span>Delivered in 2-3 bussiness days</span>
                                <div class="clearfix"></div>
                            </div>						
                        </div>
                    </div>
<?php
   }
                    }else{
                        ?><h3>Não existem artigos</h3><?php
                    }
?>

                    <script>$(document).ready(function (c) {
                            $('.close2').on('click', function (c) {
                                                       // <input type="hidden" name="remove" value="remove" />
                                window.location = "cartUpdate.php?remove_code=<?= $id ?>";
//                                $('.cart-header2').fadeOut('slow', function (c) {
//                                    //$('.cart-header2').remove(); 
//                                    
//                                });
                            });
                        });
                    </script>		
                </div>

                <div class="col-md-3 cart-total">
                    <a class="continue" href="#">Continue to basket</a>
                    <div class="price-details">
                        <h3>Price Details</h3>
                        <span>Total items</span>
                        <span class="total"><?=count($_SESSION["cart_products"]) ?></span>
                        <span>Discount</span>
                        <span class="total">---</span>
                        <span>Delivery Charges</span>
                        <span class="total">0</span>
                        <div class="clearfix"></div>				 
                    </div>	
                    <h4 class="last-price">TOTAL</h4>
                        <span class="total final">
                   <?php if (isset($_SESSION["cart_products"]) && count($_SESSION["cart_products"]) > 0) {
                       $precos;
                        foreach ($_SESSION["cart_products"] as $cart_itm) {
                            $precos+=$cart_itm["product_price"];
                            
                   } print_r($precos);  ?>
                    </span>
                    <div class="clearfix"></div>
                    <a class="order" href="pagamento.php">Place Order</a>
                   
                   <?php
                        }
                    
                     ?>       
                            
                            
                   
                    <!--			 <div class="total-item">
                                                     <h3>OPTIONS</h3>
                                                     <h4>COUPONS</h4>
                                                     <a class="cpns" href="#">Apply Coupons</a>
                                                     <p><a href="#">Log In</a> to use accounts - linked coupons</p>
                                             </div>-->
                </div>
            </div>
        </div>
        <!---->
        <div class="footer">
            <div class="container wrap">
                <div class="logo2">
                    <a href="indexRegistado.php"><img src="images/logo2.png" alt=""/></a>
                </div>
                <div class="ftr-menu">
                    <ul>
                        <li><a href="bicycles.php">BICYCLES</a></li>
                        <li><a href="suasCompras.php">Área Cliente</a></li>
                        <li><a href="accessories.php">ACCESSORIES</a></li>
                        <li><a href="404.html">EXTRAS</a></li>
                    </ul>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <!---->

    </body>
</html>

