<?php
session_start(); //start session
print_r($_POST["type"]);
print_r($_POST["product_qty"]);
print_r($_POST["cod"]);

require_once './Manager/getData.php';
$manager=new getData();
$arrays=$manager->getartigo(filter_input(INPUT_POST,'cod' ,FILTER_SANITIZE_SPECIAL_CHARS));
                $marca=$arrays['Marca'];
                $preco=$arrays['preco'];
                $imagem=$arrays['imagem'];
                $id=$arrays['CodArtigo'];
//add product to session or create new one
if(isset($_POST["type"]) && $_POST["type"]=='add' && $_POST["product_qty"]>0)
{
    foreach($_POST as $key => $value){ //add all post vars to new_product array
        $new_product[$key] = filter_var($value, FILTER_SANITIZE_STRING);
    }
    //remove unecessary vars
    unset($new_product['type']);
    unset($new_product['return_url']);
   
   
       
        //fetch product name, price from db and add to new_product array
        $new_product["product_name"] = $marca;
        $new_product["product_price"] = $preco;
        $new_product["imagem"] = $imagem;
       
        if(isset($_SESSION["cart_products"])){  //if session var already exist
            if(isset($_SESSION["cart_products"][$new_product['cod']])) //check item exist in products array
            {
                unset($_SESSION["cart_products"][$new_product['cod']]); //unset old array item
            }          
        }
        $_SESSION["cart_products"][$new_product['cod']] = $new_product; //update or create product session with new item  
    
}


//update or remove items
if(isset($_GET["remove_code"]))
{
//    //update item quantity in product session
//    if(isset($_POST["product_qty"]) && is_array($_POST["product_qty"])){
//        foreach($_POST["product_qty"] as $key => $value){
//            if(is_numeric($value)){
//                $_SESSION["cart_products"][$key]["product_qty"] = $value;
//            }
//        }
//    }
    //remove an item from product session
   
    if(isset($_GET["remove_code"]) || is_array($_GET["remove_code"])){
         echo 'dcececec';
      //  foreach($_GET["remove_code"] as $key){
            unset($_SESSION["cart_products"][$_GET["remove_code"]]);
       // }  
    }
}
print_r($_SESSION["cart_products"]);

header('Location: cart.php');