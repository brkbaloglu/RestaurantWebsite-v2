<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

include 'components/add_cart.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rest</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<!-- header section -->
<?php include "components/user_header.php"?>
<!-- header section -->

<!-- home section -->
<section class="home">
<div class="home-items">
            <div class="home-info">
                <h3>Restoranımıza Hoşgeldiniz</h3>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Neque fugit vero, explicabo soluta sunt
                    tempore incidunt repellendus unde. Provident, quisquam.</p>
            </div>
        </div>
</section>
<!-- home section -->

<!-- home category -->

<section class="home-category">
    <h1 class="title">Yemek Kategorileri</h1>
    <div class="box-container">
        <a href="category.php?category=fast food" class="box">
            <img src="images/cat-1.png" alt="">
            <h3>Fast food</h3>
        </a>

        <a href="category.php?category=main dish" class="box">
            <img src="images/cat-2.png" alt="">
            <h3>Ana yemek</h3>
        </a>

        <a href="category.php?category=drinks" class="box">
            <img src="images/cat-3.png" alt="">
            <h3>İçecekler</h3>
        </a>

        <a href="category.php?category=dessert" class="box">
            <img src="images/cat-4.png" alt="">
            <h3>Tatlılar</h3>
        </a>
    </div>
</section>

<!-- home category -->

<!-- home products -->
<section class="products">
<h1 class="title">Ürünlerimiz</h1>
    <div class="box-container">
        <?php
            $select_products = $conn -> prepare("SELECT * FROM `products` LIMIT 6");
            $select_products -> execute();
            if($select_products -> rowCount() > 0){
                while($fetch_products = $select_products -> fetch(PDO::FETCH_ASSOC)){
        ?>
        <form action="" method="post" class="box">
            <input type="hidden" name="pid" value="<?= $fetch_products["id"];?>">
            <input type="hidden" name="name" value="<?= $fetch_products["name"];?>">
            <input type="hidden" name="price" value="<?= $fetch_products["price"];?>">
            <input type="hidden" name="image" value="<?= $fetch_products["image"];?>">
            <a href="quick_view.php?pid=<?= $fetch_products["id"];?>" class="fas fa-eye"></a>
            <button type="submit" name="add_to_cart" class="fas fa-shopping-cart"></button>
            <img src="uploaded_img/<?= $fetch_products["image"];?>" class="image" alt="">
            <a href="category.php?category=<?= $fetch_products["category"];?>" class="cat"><?= $fetch_products["category"]?></a>
            <div class="name"><?= $fetch_products["name"]?></div>
            <div class="flex">
                <div class="price"><span>$</span><?= $fetch_products["price"];?></div>
                <input type="number" name="qty" class="qty" value="1" min="1" max="99" maxlength="2">
            </div>
        </form>
        <?php
        }
        }else{
            echo "<div class='empty'>Eklenen ürün yok!</div>";
        }
        
        ?>
    </div>
</section>
<!-- home products -->


<!-- footer section -->
<?php include "components/footer.php"?>
<!-- footer section -->




<script src="js/script.js"></script>

    
</body>
</html>