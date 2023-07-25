<?php
namespace App\Controllers;


use App\Models\Category;
use App\Models\Product;
use \Core\View;

/**
 * Home controller
 *
 * PHP version 7.0
 */
class CategoryController extends \Core\Controller
{
    public function categoryAction()
    {
        $id = $_GET['id'] ?? null;
        $categoryDb = new Category();
        $category = $categoryDb->getAll();

        $categoryDb1 = new Category();
        $category1 = $categoryDb1->s1($id);


        $result = null;
        $cat1 = new Category();
        $count = $cat1->countProducts($id);
	    $total_records = $count;
        
        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
        $limit = 8;
        $total_page = 0;
        $start = 0;

        $key = $_GET['key'];
        $giatu = $_GET['giatu'];
        $giaden = $_GET['giaden'];
        $idL = $_GET['idL'];
        $xem = $_GET['xem'];

        if ($id !== null) {
            $result = $categoryDb1->s1($id);

            
            $total_records = $count;
            $total_page = ceil($total_records / $limit);

            if ($current_page > $total_page) {
                $current_page = $total_page;
            } elseif ($current_page < 1) {
                $current_page = 1;
            }

            $start = ($current_page - 1) * $limit;
        }
        print_r($total_page);
        $categoryDb2 = new Category();
        $category2 = $categoryDb2->getProductsByCategory($id, $start, $limit, $key, $giatu, $giaden, $idL, $xem);
        
        View::renderTemplate('Cate/category.html', [
            'category' => $category,
            'category1' => $category1,
            'category2' => $category2,
            'total_page' => $total_page,
            'current_page' => $current_page,
            'id' => $id,
            'key' => $key,
            'giatu' => $giatu,
            'giaden' => $giaden,
            'idL' => $idL,
            'xem' => $xem,
        ]);

    }
}