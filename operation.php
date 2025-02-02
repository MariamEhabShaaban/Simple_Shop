<?php

session_start();

$items = [
   "cheese" => 1.00,
   "orange" => 0.5,
   "tomato" => 0.75,
   "carrot" => 2.00
];

if (!isset($_SESSION["cart"])) {
    $_SESSION['cart'] = array();
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["add"])) {
    $item = $_POST["item"];
    
        if (isset($_SESSION['cart'][$item])) {
            $_SESSION['cart'][$item]++;
        } else {
            $_SESSION['cart'][$item] = 1;
        }
    
}


if($_SERVER["REQUEST_METHOD"]==="POST" && isset($_POST["remove"])){
    $item=$_POST["item"];
    
      if (isset($_SESSION['cart'][$item]) ) {
         if($_SESSION['cart'][$item]==1){
            unset($_SESSION['cart'][$item]);
         }
         
       else {
        $_SESSION['cart'][$item]--;
     
  }
  
  }
 
}
?>
