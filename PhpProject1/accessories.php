<?php
require_once './Manager/getData.php';
$manager=new getData();
?>
<html>
<head>
<title>Bike Shop a Ecommerce Category Flat Bootstarp Responsive Website Template| Accessories :: w3layouts</title>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- jQuery (Bootstrap's JavaScript plugins) -->
<script src="js/jquery.min.js"></script>
<!-- Custom Theme files -->
<link href="css/form.css" rel="stylesheet" type="text/css" media="all" />
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
<div class="Área Cliente">
	 <div class="container">
		 <h2>BIKE-ACCESSORIES</h2>
		 <div class="bike-Área Cliente-sec">
		 <div class="bike-Área Cliente acces">
			 <div class="top">
				 <ul>
					 <li><a href="indexRegistado.php">home</a></li>
					 <li><a href="#"> / </a></li>
					 <li><a href="#">Área Cliente</a></li>
				 </ul>				 
			 </div>
			 <div class="bike-apparels">
                             
                             <?php 
                $array=$manager->getacessorios("acessório");
              foreach ($array as $key => $value) {?>
                             <form action="cartUpdate.php" method="post">
                             
                             <div class="Área Cliente1">
					 <a href="single.php?cod=<?=print_r($array[$key]['CodArtigo']) ?>"><div class="part-sec">					 
                                                 <img src=<?php print_r($array[$key]['imagem'])?> alt=""/>
						 <div class="part-info">
                                                     <a href="#"><h5><?php print_r($array[$key]['DescArtigo'])?><span><?php print_r($array[$key]['preco']); echo '€'?></span></h5></a>
							 <a class="add-cart" href="single.php?cod=<?=print_r($array[$key]['CodArtigo']) ?>">Quick View</a>
                                                         <input type="hidden" name="type" value="add"/>
                         <input type="hidden" name="product_qty" value="1"/>
                                                         <input type="hidden" name="cod" value="<?=$array[$key]['CodArtigo'] ?>"/>
                                             <button  type="submit"><a class="buy" href="cartUpdate.php?cod=<?=$array[$key]['CodArtigo'] ?>">BUY NOW</a></button>
						 </div>
					 </div></a>
					
                             </div> </form>
                             <?php }
                        ?>
				 
			 </div>
		 </div>
		 
		 <div class="rsidebar span_1_of_left">
				 <section  class="sky-form">
					 <div class="product_right">
						 <h3 class="m_2">Categories</h3>
							<select class="dropdown" tabindex="10" data-settings='{"wrapperClass":"metro"}'>
								<option value="0">Frames</option>	
								<option value="1">Back Packs</option>
								<option value="2">Frame Bags</option>
								<option value="3">Panniers </option>
								<option value="4">Saddle Bags</option>								
						   </select>
						   <select class="dropdown" tabindex="50" data-settings='{"wrapperClass":"metro"}'>
								<option value="1">Body Armour</option>
								<option value="2">Sub Category1</option>
								<option value="3">Sub Category2</option>
								<option value="4">Sub Category3</option>
						   </select>
						   <select class="dropdown" tabindex="8" data-settings='{"wrapperClass":"metro"}'>
								<option value="1">Tools</option>
								<option value="2">Sub Category1</option>
								<option value="3">Sub Category2</option>
								<option value="4">Sub Category3</option>
						   </select>
						   <select class="dropdown" tabindex="8" data-settings='{"wrapperClass":"metro"}'>
								<option value="1">Services</option>
								<option value="2">Sub Category1</option>
								<option value="3">Sub Category2</option>
								<option value="4">Sub Category3</option>
						   </select>
						   <select class="dropdown" tabindex="8" data-settings='{"wrapperClass":"metro"}'>
								<option value="1">Materials</option>
								<option value="2">Sub Category1</option>
								<option value="3">Sub Category2</option>
								<option value="4">Sub Category3</option>
						   </select>
					  </div>
			 
					 <h4>components</h4>
					 <div class="row row1 scroll-pane">
						 <div class="col col-4">
								<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Frames(20)</label>
						 </div>
						 <div class="col col-4">
								<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Foks, Suspensions (48)</label>
								<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Breaks and Pedals (45)</label>
								<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Tires,Tubes,Wheels (45)</label>
								<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Serevice Área Cliente(12)</label>
						 </div>
					 </div>
					 <h4>Apparels</h4>
					 <div class="row row1 scroll-pane">
						 <div class="col col-4">
								<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Locks (20)</label>
						 </div>
						 <div class="col col-4">
								<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Speed Cassette (5)</label>
								<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Bike Pedals (7)</label>
								<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Handels (2)</label>
								<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Other (50)</label>
						 </div>
					 </div>
				 </section>
				 <section  class="sky-form">
						<h4>Brand</h4>
							<div class="row row1 scroll-pane">
								<div class="col col-4">
									<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Lezyne</label>
								</div>
								<div class="col col-4">
									<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Marzocchi</label>
									<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>EBC</label>
									<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Oakley</label>
									<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Jagwire</label>
									<label class="checkbox"><input type="checkbox" name="checkbox" ><i></i>Yeti Cycles</label>
									<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Vee Rubber</label>
									<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Zumba</label>
								</div>
							</div>
				   </section>		      
				   <section  class="sky-form">
						<h4>Price</h4>
							<div class="row row1 scroll-pane">
								<div class="col col-4">
									<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>$50.00 and Under (30)</label>
								</div>
								<div class="col col-4">
									<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>$100.00 and Under (30)</label>
									<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>$200.00 and Under (30)</label>
									<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>$300.00 and Under (30)</label>
									<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>$400.00 and Under (30)</label>
								</div>
							</div>
				   </section>		       
			 </div>	 
		 
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

