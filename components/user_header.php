<?php
if(isset($message)){
    foreach($message as $message){
        echo "
        <div class='message'>
            <span>".$message."</span>
            <i class='fas fa-times' onclick='this.parentElement.remove();'></i>
        </div>
        ";
    }

}

?>


<header class="header">

<section class="flex">
    <div class="logo">
        <img src="images/logo.png" alt="">
        <a href="home.php" class="logo">REST</a>
    </div>

    <nav class="navbar">
        <a href="home.php">Ana sayfa</a>
        <a href="about.php">Hakkımızda</a>
        <a href="menu.php">Menu</a>
        <a href="orders.php">Siparişler</a>
        <a href="contact.php">İletişim</a>
    </nav>

    <div class="icons">
        <?php
            $count_user_cart_items = $conn -> prepare("SELECT * FROM `cart` WHERE user_id = ?");
            $count_user_cart_items -> execute([$user_id]);
            $total_user_cart_items = $count_user_cart_items -> rowCount();
        ?>
    <a href="cart.php"><i class="fas fa-shopping-cart"></i><span>(<?= $total_user_cart_items; ?>)</span></a>
    <div id="user-btn" class="fas fa-user"></div>
    <div id="menu-btn" class="fas fa-bars"></div>
    </div>

    <div class="profile">
        <?php
            $select_profile = $conn -> prepare("SELECT * FROM `users` WHERE id = ?");
            $select_profile -> execute([$user_id]);
            if($select_profile -> rowCount() > 0 ){
                $fetch_profile = $select_profile -> fetch(PDO::FETCH_ASSOC);
           
        ?>
        <p class="name"><?= $fetch_profile["name"];?></p>
        <div class="flex">
            <a href="profile.php" class="btn">Profil</a>
            <a href="components/user_logout.php" onclick="return confirm('Çıkış yapmak istediğinize emin misiniz?');" class="btn">Çıkış yap</a>
        </div>
        <?php
        }else{
        ?>
           <p class="name">Lütfen giriş yapın</p>
           <a href="login.php" class="btn">Giriş yap</a>
           <a href="admin/admin_login.php" class="btn">Admin Girişi</a>
        
        <?php
        }
        ?>
    </div>
</section>
</header>

