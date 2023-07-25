<?php

namespace App\Controllers;

use App\Models\OrderDetail;
use App\Models\User;


use \Core\View;

/**
 * Home controller
 *
 * PHP version 7.0
 */
class OrderDetailController extends \Core\Controller
{

    /**
     * Show the index page
     *
     * @return void
     */
    public function order_detailAction()
    {
        $userDb = new User();
        $user = $userDb->getAll();
        $userDb = new User();
        $user = $userDb->getAll();
        $order_detail = null;
        if (isset($_SESSION['user'])) {
            $hoten = $_SESSION['user']['hoten'];
            $idHD = $_GET['idHD'];
            $order_detailDb = new OrderDetail();
            $order_detail = $order_detailDb->getDonHangDetail($idHD);
        }

        //print_r($order_detail); 
   
        View::renderTemplate('OrderDetail/order_detail.html', ['order_detail' => $order_detail,
        'user' => $user, ]);
    }
}
