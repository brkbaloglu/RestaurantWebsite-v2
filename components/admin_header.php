<?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>

<header class="header">

   <section class="flex">

      <a href="dashboard.php" class="logo">Admin<span>Paneli</span></a>

      <nav class="navbar">
         <a href="dashboard.php">Ana sayfa</a>
         <a href="products.php">Ürünler</a>
         <a href="placed_orders.php">Siparişler</a>
         <a href="admin_accounts.php">Adminler</a>
         <a href="users_accounts.php">Kullanıcılar</a>
         <a href="messages.php">Mesajlar</a>
      </nav>

      <div class="icons">
         <div id="menu-btn" class="fas fa-bars"></div>
         <div id="user-btn" class="fas fa-user"></div>
      </div>

      <div class="profile">
         <?php
            $select_profile = $conn->prepare("SELECT * FROM `admin` WHERE id = ?");
            $select_profile->execute([$admin_id]);
            $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
         ?>
         <p><?= $fetch_profile['name']; ?></p>
         <a href="update_profile.php" class="btn"> Güncelle</a>
         <div class="flex-btn">
            <a href="admin_login.php" class="option-btn">Giriş yap</a>
            <a href="register_admin.php" class="option-btn">Kayıt ol</a>
         </div>
         <a href="../components/admin_logout.php" onclick="return confirm('Sayfadan çıkış yapmak istediğinize emin misiniz?');" class="delete-btn">Çıkış yap</a>
      </div>

   </section>

</header>