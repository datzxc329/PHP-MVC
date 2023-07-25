<?php

namespace App\Models;

use PDO;

/**
 * Example user model
 *
 * PHP version 7.0
 */
class Product extends \Core\Model
{

    /**
     * Get all the users as an associative array
     *
     * @return array
     */
    public static function getAll()
    {
        $db = static::getDB();
        $stmt = $db->query('SELECT * FROM sanpham');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function s1()
    {
        $db = static::getDB();
        $stmt = $db->query('SELECT * FROM sanpham ORDER BY idSP DESC');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
