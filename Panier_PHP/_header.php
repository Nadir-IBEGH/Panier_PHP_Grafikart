<?php
require 'db.php';
require 'panier.php';
$database = new Database();
$panier = new Panier($database);
?>