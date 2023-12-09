<?php 
require '../bootstrap.php';
is_connected();

page("header");

getPDO();

$sql = "SELECT * FROM `products` 
            INNER JOIN 
                categories ON  products.category_id =  categories.id ";
$requette = getPDO()->prepare($sql);
$requette->execute();
$foods = $requette->fetchAll(PDO::FETCH_ASSOC);


?>

<section class="container-card">

    <div class="car-container">
    <?php foreach ($foods as $food) :  ?>
        <div class="card-container">
        <img style="width: 150px;" src="../images/joseph-gonzalez-fdlZBWIP0aM-unsplash.jpg" alt="">
                <div>
                    <p><?= $food["name"]?></p>
                    <p><?= $food["description"]?></p>
                </div>
                <div class="flex-card">
                    <p><?= $food["price"]?></p>
                    <button>Ajouter au panier</button>
                </div>
        </div>
    <?php endforeach ?>

    </div>

</section>



<?php



page("footer");








