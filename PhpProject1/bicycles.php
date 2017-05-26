<?php
require_once './Manager/getData.php';
$manager=new getData();
?>
<html>
<head>
<title>Bike Shop a Ecommerce Category Flat Bootstarp Responsive Website Template| Bicycles :: w3layouts</title>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- jQuery (Bootstrap's JavaScript plugins) -->
<script src="js/jquery.min.js"></script>
<!-- Custom Theme files -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- Custom Theme files -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Bike-shop Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
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
						  <li class="dropdown1"><a href="parts.html">PARTS</a>
							 <ul class="dropdown2">
									<li><a href="parts.html">CHAINS</a></li>
									<li><a href="parts.html">TUBES</a></li>
									<li><a href="parts.html">TIRES</a></li>
									<li><a href="parts.html">DISC BREAKS</a></li>
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
<div class="bikes">		 
	 <div class="mountain-sec">
		 <h2>MOUNTAIN BIKES</h2>
		 
                <?php 
                $array=$manager->getBikeMontanha();
              foreach ($array as $key => $value) {?>
                 <form action="cartUpdate.php" method="post">
                  <a href="single.php?cod=<?=print_r($array[$key]['CodArtigo']) ?>"><div class="bike">				 
			 <img src=<?= print_r($array[$key]['imagem'])?> alt=""/>
		     <div class="bike-cost">
					 <div class="bike-mdl">
                                             <h4><?= print_r($array[$key]['Marca'])?><span>Model:M4585</span></h4>
					 </div>
					 <div class="bike-cart">
                                             <input type="hidden" name="cod" value="<?=$array[$key]['CodArtigo'] ?>"/>
                                             <button  type="submit"><a class="buy" href="cartUpdate.php?cod=<?=$array[$key]['CodArtigo'] ?>">BUY NOW</a></button>
					 </div>
					 <div class="clearfix"></div>
				 </div>
				 <div class="fast-viw">
                                     <input type="hidden" name="type" value="add"/>
                         <input type="hidden" name="product_qty" value="1"/>
                         <a href="single.php?cod=<?=$array[$key]['CodArtigo'] ?>">Quick View</a>
				 </div>
                         
			 </div></a></form>
             <?php }
                        ?>
               

			 <div class="clearfix"></div>
	  </div>
		 
	  <div class="singlespeed-sec">
		   <h2>SINGLE SPEED-BIKES</h2>
			 <?php 
                $arrays=$manager->getBikeSingleSpeed();
              foreach ($array as $key => $value) {?>
                 <form action="cartUpdate.php" method="post">
                  <a href="single.php?cod=<?=print_r($array[$key]['CodArtigo']) ?>"><div class="bike">				 
			 <img src=<?= print_r($array[$key]['imagem'])?> alt=""/>
		     <div class="bike-cost">
					 <div class="bike-mdl">
                                             <h4><?= print_r($array[$key]['Marca'])?><span>Model:M4585</span></h4>
					 </div>
					 <div class="bike-cart">
                                             <input type="hidden" name="cod" value="<?=$array[$key]['CodArtigo'] ?>"/>
                                             <button  type="submit"><a class="buy" href="cartUpdate.php?cod=<?=$array[$key]['CodArtigo'] ?>">BUY NOW</a></button>
					 </div>
					 <div class="clearfix"></div>
				 </div>
				 <div class="fast-viw">
                                     <input type="hidden" name="type" value="add"/>
                         <input type="hidden" name="product_qty" value="1"/>
                         <a href="single.php?cod=<?=$array[$key]['CodArtigo'] ?>">Quick View</a>
				 </div>
                         
			 </div></a></form>
             <?php }
                        ?>
			 
			 <div class="clearfix"></div>
		 </div>
		 
		 <div class="road-sec">
		   <h2>ROAD-BIKES</h2>
                   
                   <?php 
                $arrays=$manager->getRoadBikes();
              foreach ($array as $key => $value) {?>
                 <form action="cartUpdate.php" method="post">
                  <a href="single.php?cod=<?=print_r($array[$key]['CodArtigo']) ?>"><div class="bike">				 
			 <img src=<?= print_r($array[$key]['imagem'])?> alt=""/>
		     <div class="bike-cost">
					 <div class="bike-mdl">
                                             <h4><?= print_r($array[$key]['Marca'])?><span>Model:M4585</span></h4>
					 </div>
					 <div class="bike-cart">
                                             <input type="hidden" name="cod" value="<?=$array[$key]['CodArtigo'] ?>"/>
                                             <button  type="submit"><a class="buy" href="cartUpdate.php?cod=<?=$array[$key]['CodArtigo'] ?>">BUY NOW</a></button>
					 </div>
					 <div class="clearfix"></div>
				 </div>
				 <div class="fast-viw">
                                     <input type="hidden" name="type" value="add"/>
                         <input type="hidden" name="product_qty" value="1"/>
                         <a href="single.php?cod=<?=$array[$key]['CodArtigo'] ?>">Quick View</a>
				 </div>
                         
			 </div></a></form>
             <?php }
                        ?>  
			 <div class="clearfix"></div>
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
				 <li><a href="parts.html">PARTS</a></li>
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


