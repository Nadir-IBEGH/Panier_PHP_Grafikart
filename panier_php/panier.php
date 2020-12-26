<?php

class Panier
{
    private $database;

    public function __construct($database)
    {
        $this->database = $database;

        if (!isset($_SESSION)) session_start();


        if (!isset($_SESSION['panier'])) $_SESSION['panier'] = array();

        if(isset($_GET['delPanier'])){
            $this->del($_GET['delPanier']);
        }
    }

    public function add($product_id)
    {
        if (isset($_SESSION['panier'][$product_id])) {
            $_SESSION['panier'][$product_id]++;
        } else {
            $_SESSION['panier'][$product_id] = 1;
        }
    }

    public function del($product_id)
    {
        unset($_SESSION['panier'][$product_id]);

    }

    public function nbProduct(){  // nombre de produit dans le panier
        return array_sum($_SESSION['panier']);
    }

    public function total()
    {
        $total = 0;
        $ids = array_keys($_SESSION['panier']);
        if(empty($ids)){
            $products =[];
        } else {
            $products = $this->database->query('select id, price from products where id in (' . implode(',', $ids) . ')');
        }

        foreach ($products as $product) {
                 $total+= $product->price*$_SESSION['panier'][$product->id];
        }
        return $total;
    }
}









