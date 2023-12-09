<?php 
require '../bootstrap.php';
page("header");
?>

<?php
 // $sql = getPDO()->prepare("SELECT * FROM `users` WHERE `email` = ?");
                    // $sql->bindValue(1 , $email , PDO::PARAM_STR);
                    // $sql->execute()

$error = "";


   
if (is_post()) {
    if (isset($_POST["submit"])) {
        $name  = is_valid($_POST['name']);
       
        $message  = is_valid($_POST['message']);
         $price  =  floatval(is_valid($_POST['price']));
         $a = "";
         $b = 1;

        if (!empty($name) && !empty($price) && !empty($message)) {
            if (is_float($price) || is_int($price)) {
                $sql = getPDO()->prepare("INSERT INTO `products` (`name`, `description`,`price`, `image`) VALUES (?,?,?,?)");
                $sql->bindValue(1 , $name , PDO::PARAM_STR);
                $sql->bindValue(2 , $message , PDO::PARAM_STR);
                $sql->bindValue(3 , $price, PDO::PARAM_INT);
                $sql->bindValue(4 , $a, PDO::PARAM_STR);
                $request = $sql->execute();
            } else {
                echo $error = "entre un nombre ou une valeur decimale";
            }
        }else {
            echo $error = "les champs ne doivent pas être null";
        }
        
            
    } 

}

 ?>


<section>
    <form action="" method="post">
        <div class="">
            <label for="name">Product Name</label>
            <input type="text" name="name" id="name">
        </div>

        <div>
            <label for="name">Product price</label>
            <input type="text" name="price" min=0 step="0.01" id="totalAmt">
        </div>

        <div>
            <label for="name">Description</label>
            <textarea name="message" id="" cols="30" rows="10"></textarea>
        </div>

        <button class="btn" name="submit">Creer le produit</button>
    </form>
</section>

<?php

page("footer");

