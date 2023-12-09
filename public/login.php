
<?php require_once '../bootstrap.php' ?>
<?php page("header");

// if (is_connected()) {
//     header('Location: ./profils.php');
// }

?>

<?php

if (is_post()) {

    $email  = is_valid($_POST['email']);
    $password  = is_valid($_POST['password']);

    if (!empty($email) && !empty($password)) {
        if (strlen($password) > 5) {
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $sql = getPDO()->prepare("SELECT * FROM `users` WHERE `email` = :email");
                $sql->execute(["email" => $email,]);
                $user = $sql->fetch(PDO::FETCH_ASSOC);
                
                if (!empty(password_verify($password, $user['password']))) {
                        session_start();
                        header("Location: ./profils.php");
                        $_SESSION['$user'] = $user;
                       
                    } else {
                    $error =  "email ou mot de passe incorect";
                }
                
            } else {
                 $error = "bad email";
            }
        }else {
             $error = "password can't be less than 5 carather";
        }
    }
    else {
         $error = 'Fields can not be empty';
    }

}

?>


<section class="container">
    <div class="flex">
       <div class="form">
            
           <div class="container-form">
                <div>
                        <div>
                            <?php if (isset($error) && !empty($error)) :  ?>
                            <p> <?php echo flash_message($error) ?></p>
                            <?php endif?>
                        </div>
            
                    <form action="" method="post">
                            <div class="">
                                <div>
                                    <label class="label" for="email">email :</label>
                                </div>
                                <input type="email" name="email" placeholder="Enter your email">
                            </div>


                            <div class="label-div">
                                <div class="label-div2 ">
                                    <label  class="label" for="password">Mot de passe :</label>
                                    <p><a href="">Forgot password?</a></p>
                                </div>
                                    <input type="password" name="password" placeholder="Enter your password">
                            </div>
                            <div class="div-btn">
                                <button class="btn1" type="submit">LOGIN</button>
                            </div>
                    </form>
                </div>
            </div>
       </div>

            <div class="signIn">
                    <h1 class="h1">First time here ?</h1>
                    <p class="paragraphe">Sign up and order amazing <br> food</p>
                    <button class="btn2 btn-btn">Sign in</button>
            </div>
    </div>



    
    <div>
        <p></p>
    </div>


<?php 

page("footer");
