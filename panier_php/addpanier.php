<?php
require '_header.php';
if(isset($_GET['id'])){
   $product =    $database->query('select id from products where id=:id', array('id'=>$_GET['id']));
   if(empty($product)){
       die("Ce produit n'existe pas");
   }

   $panier->add($product[0]->id);
   die('le produit a bien été ajouté au panier <a href="javascript:history.back()">
   retour sur le catalogue</a>');
}else {
    die("Vous n'avez pas sélectionné de produit à ajouter au panier");
}
?>