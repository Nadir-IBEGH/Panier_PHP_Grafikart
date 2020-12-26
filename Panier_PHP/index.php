<?php
require '_header.php';
$product = $database->query('select * from products');
?>

<br><br><br>
<div class="home" style="margin-left: 100px;">
    <div class="row">
        <div class="wrap">
         <?php   $product = $database->query('select * from products');
         foreach ($product as $product): ?>
            <div class="box">
                <div class="product full">
                    <a href="#">
                        <img src="images/<?= $product->id; ?>.png" width="100px">
                    </a>
                    <div class="description">
                     <?= $product->name; ?>
                     <a href="#" class="price"><?= number_format($product->price,2,',',''); ?></a>
                    <a href="addpanier.php?id=<?= $product->id; ?> ">
                        Gift
                    </a>
                        <div class="rating">
                            <a href="addpanier.php?id=<?= $product->id; ?> ">

add
                            </a>


                        </div>
                    </div>
                </div>

            </div>
         <hr>
        <?php endforeach; ?>
        </div>

    </div>




</div>
    <br><br><br>
<?php
require  'footer.php';
?>