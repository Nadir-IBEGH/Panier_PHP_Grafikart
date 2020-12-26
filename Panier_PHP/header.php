<?php
require 'db.php';
require 'panier.php';
$database = new Database();
$panier = new Panier($database);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Ecommerce template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Holtwood+One+SC" rel="stylesheet" type='text/css'>
  <!--  <link rel="stylesheet" href="css/style.css">  -->
</head>
<body>
<div id="header">
    <div class="wrap">
        <div class="menu">
            <ul class="panier">
                <li class="items">
                    ITEMS
                    <span><?= $panier->nbProduct(); ?></span>
                </li>
                <li class="total">
                    TOTAL
                    <span><?= $panier->total().' €'; ?></span>
                </li>
            </ul>
        </div>
    </div>
</div>

<!--  BODY  -->
<div id="subheader">
    <class="wrap"><h2>
        Welcome visitor you can <a href="#">login</a>or
        <a href="#" >create an account</a>.
    </h2>
</div>

