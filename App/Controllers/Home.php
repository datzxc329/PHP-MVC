<?php

namespace App\Controllers;

use App\Models\Category;
use App\Models\User;
use App\Models\Order_Details;
use App\Models\Order;
use App\Models\Product;
use App\Models\Staff;

use \Core\View;

/**
 * Home controller
 *
 * PHP version 7.0
 */
class Home extends \Core\Controller
{

    /**
     * Show the index page
     *
     * @return void
     */
    public function indexAction()
    {
        $categoryDb = new Category();
        $category = $categoryDb->getAll();
        $categoryDb = new Category();
        $category = $categoryDb->getAll();

        //print_r($category);

        $userDb = new User();
        $user = $userDb->getAll();
        $userDb = new User();
        $user = $userDb->getAll();

        //print_r($user);

        $productDb = new Product();
        $product = $productDb->getAll();
        $productDb = new Product();
        $product = $productDb->getAll();

        //print_r($product);
        $productDb1 = new Product();
        $product1 = $productDb1->s1();
        $productDb1 = new Product();
        $product1 = $productDb1->s1();
        //print_r($product1);    
        View::renderTemplate('Home/index.html', 
        ['category' => $category, 
        'user' => $user, 
        'product' => $product, 
        'product1' => $product1]);
    }
}
