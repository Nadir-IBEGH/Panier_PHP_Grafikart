<?php
require 'header.php';
?>
<br><br><br>
<div class="home" style="margin-left: 100px;">
    <form method="post" action="monPanier.php">
    <div class="table" style="width:100%;">
     <div class="wrap">
            <div class="rowtitle" >
                <span class="name" >Product name </span>
                <span class="price">Price</span>
                <span class="price">Price avec TVA</span>
                <span class="quantity">Quantity </span>
                <span class="">Subtotal </span>
                <span class="">Actions </span>
            </div>
         <?php
         $ids = array_keys($_SESSION['panier']); // récupérer les cles du tableau panier
         if(empty($ids)){
             $products = [];
         } else {
             $products = $database->query('select * from products where id in (' . implode(',', $ids) . ')');
         }
         foreach ($products as $product):
         ?>

         <div class="row">
              <a href="#" class="img"><img src="images/<?= $product->id; ?>.png" width="100px">
              </a>
              <span class="name"><?= $product->name ; ?></span>
              <span class="price"><?= number_format($product->price,2,',',''); ?></span>
             <span class="price_tva"><?= number_format($product->price *1.196,2,',',''); ?></span>
             <span class="quantity"><input type="text" name="panier[quantity][<?= $product->id ?>]" value="<?= $_SESSION['panier'][$product->id]; ?>"</span>
              <span class="action">
                  <a href="monPanier.php?delPanier=<?= $product->id; ?>" >supprimer</a>
              </span>
         </div>
         <?php endforeach; ?>
         <input type="submit" value="recalcul">
         <span class="subtotal">Total : <?= $panier->total() .' €'; ?></span>

     </div>
    </form>
 </div>
</div>
    <br><br><br>
<?php
require  'footer.php';
?>