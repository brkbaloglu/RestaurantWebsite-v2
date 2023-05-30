<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
   header('location:home.php');
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Siparişler</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<!-- header section starts  -->
<?php include 'components/user_header.php'; ?>
<!-- header section ends -->

<div class="heading">
   <h3>Siparişler</h3>
   <p><a href="html.php">Ana sayfa</a> <span> / Siparişler</span></p>
</div>

<section class="orders">

   <h1 class="title">Siparişleriniz</h1>

   <div class="box-container">

   <?php
      if($user_id == ''){
         echo '<p class="empty">Siparişlerinizi görmek için giriş yapınız</p>';
      }else{
         $select_orders = $conn->prepare("SELECT * FROM `orders` WHERE user_id = ?");
         $select_orders->execute([$user_id]);
         if($select_orders->rowCount() > 0){
            while($fetch_orders = $select_orders->fetch(PDO::FETCH_ASSOC)){
   ?>
   <div class="box">
      <p>Tarih : <span><?= $fetch_orders['placed_on']; ?></span></p>
      <p>Ad : <span><?= $fetch_orders['name']; ?></span></p>
      <p>E-mail : <span><?= $fetch_orders['email']; ?></span></p>
      <p>Numara : <span><?= $fetch_orders['number']; ?></span></p>
      <p>Adres : <span><?= $fetch_orders['address']; ?></span></p>
      <p>Ödeme Yolu : <span><?= $fetch_orders['method']; ?></span></p>
      <p>Sipariş ettiğiniz ürünler : <span><?= $fetch_orders['total_products']; ?></span></p>
      <p>Toplam fiyat : <span>$<?= $fetch_orders['total_price']; ?>/-</span></p>
      <p>Ödeme metodu : <span style="color:<?php if($fetch_orders['payment_status'] == 'pending'){ echo 'red'; }else{ echo 'green'; }; ?>"><?= $fetch_orders['payment_status']; ?></span> </p>
   </div>
   <?php
      }
      }else{
         echo '<p class="empty">Verilen sipariş yok!</p>';
      }
      }
   ?>

   </div>

</section>










<!-- footer section starts  -->
<?php include 'components/footer.php'; ?>
<!-- footer section ends -->






<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>