
<?php require '../bootstrap.php' ;
// if (is_connected()) {
//     header('Location: ./profils.php');
// }
?>

<?php page("header"); 


$error  = "";

if (is_post()) {

    if (isset($_POST["submit"])) {
       
        $name  = trim(htmlentities($_POST['name']));
        $email  = trim(htmlentities($_POST['email']));
        $password  = trim(htmlentities($_POST['password']));

        if (!empty($name) && !empty($email) && !empty($password)) {
            if (strlen($password) > 5) {
                if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    
                    $sql = getPDO()->prepare("SELECT * FROM `users` WHERE `email` = ?");
                    $sql->bindValue(1 , $email , PDO::PARAM_STR);
                    $sql->execute();
                    
                    $count = $sql->rowCount();
                    if ($count > 0) {
                        $error =  "L'email est déja utilisé Connectez vous !";
                    }
                    else {
                        $sql = getPDO()->prepare("INSERT INTO `users` (`name`, `email`,`password`) VALUES (?,?,?)");
                        $sql->bindValue(1 , $name , PDO::PARAM_STR);
                        $sql->bindValue(2 , $email , PDO::PARAM_STR);
                        $sql->bindValue(3 , password_hash($password, PASSWORD_ARGON2ID) , PDO::PARAM_STR);
                        $request = $sql->execute();
                        header("Location: ../login.php?message=success");

                    }

                } else {
                     $error = "l'email est incorrect";
                }
            }else {
                $error = 'The password should be at leat 5 character';
            }
    }
    else {
        $error = 'Fields can not be empty';
    }
   

}

}

?>

<section class="container">
    <div class="flex">
       <div class="form">
           <div class="container-form">
           
                <form action="" method="post">
                        <div class="">
                        <div>
                                <?php if (isset($error) && !empty($error)) :  ?>
                                <p> <?php echo flash_message($error) ?></p>
                                <?php endif?>
                        </div>
                            <div>
                                <label class="label" for="name">name :</label>
                                <input type="text" name="name" placeholder="Enter your name">
                            </div>
                            
                        </div>
                        <div class="">
                            <div>
                                <label class="label" for="email">email :</label>
                            </div>
                            <input type="email" name="email" placeholder="Enter your email" ">
                        </div>

                        <div class="label-div">
                            <div class="label-div2 ">
                                <label  class="label" for="password">Mot de passe :</label>
                                <p><a href="">Forgot password?</a></p>
                            </div>
                            <input type="password" name="password" placeholder="Enter your password">
                               
                        </div>
                        <div class="div-btn">
                            <button class="btn1" type="submit" name="submit">LOGIN</button>
                        </div>
                </form>
            </div>
       </div>

            <div class="signIn">
                    <h1 class="h1">First time here ?</h1>
                    <p class="paragraphe">Sign up and order amazing <br> food</p>
                    <button class="btn2 btn-btn">Sign in</button>
            </div>
    </div>


</section>


<?php 

page("footer");






