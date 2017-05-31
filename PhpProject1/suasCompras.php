<?php
session_start();
if((!isset($_SESSION['userid'])==true)and (!isset($_SESSION['passwordinput'])==true)){
    unset($_SESSION['userid']);
    unset($_SESSION['passwordinput']);
    header('location:index.php');
}else{
    $logado=$_SESSION['userid'];
}
include 'verificaOnline.php';
require_once './Manager/getData.php';
$manager=new getData();
$aa=$manager->getfaturas("Admin");
//print_r($aa);
$z=$aa[0]['id'];
$as=str_replace(array( '{', '}' ), '', $z);
//print_r($as);
//$aaa=$manager->getlinha($as);
?>
<html>
<head>
<title>Bike Shop a Ecommerce Category Flat Bootstarp Responsive Website Template| 404 Error :: w3layouts</title>
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
						 
						  <a class="shop" href="cart.php"><img src="images/cart.png" alt=""/></a>
					  </ul>
				 </div>
				 <div class="clearfix"></div>
			 </div>
	  </div> 				 
</div>

   <div class="singlespeed-sec">
		   <h2>SINGLE SPEED-BIKES</h2>
	
		 
		 <div class="road-sec">
		   <h2>ROAD-BIKES</h2>
                   
                   <?php 
                $arrays=$manager->getfaturas($logado);
                
              foreach ($arrays as $key => $value) {?>
              <?php      $z=$arrays[$key]['id'];//id linhadoc
              $as=str_replace(array( '{', '}' ), '', $z);
                   $linha=$manager->getlinha($z);
                   $idartigo=$linha['CodArtigo'];
                  $array=$manager->getartigo($idartigo);?>
                  <a href=""><div class="bike">				 
			 <img src=<?= print_r($array['imagem'])?> alt=""/>
		     <div class="bike-cost">
					 <div class="bike-mdl">
                                             <h4><?= print_r($array['Marca'])?><span>Model:M4585</span></h4>
					 </div>
					 <div class="clearfix"></div>
				 </div>
				 <div class="fast-viw">
                         <a href="single.php?cod=<?=$idartigo ?>">Quick View</a>
				 </div>
                         
			 </div></a>
             <?php }
                        ?>  
			 <div class="clearfix"></div>
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

