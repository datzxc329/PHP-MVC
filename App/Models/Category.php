<?php

namespace App\Models;

use PDO;

/**
 * Example user model
 *
 * PHP version 7.0
 */
class Category extends \Core\Model
{

    /**
     * Get all the users as an associative array
     *
     * @return array
     */
    public static function getAll()
    {
        $db = static::getDB();
        $stmt = $db->query('SELECT * FROM loaisanpham');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function s1($id)
    {
        $db = static::getDB();
        $stmt = $db->prepare("SELECT * FROM loaisanpham WHERE idLSP = :id");
        $stmt->execute(['id' => $id]);
        
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    }
    public static function s2($id, $start, $limit)
    {
        $db = static::getDB();
        $query = "SELECT * FROM sanpham WHERE idLSP = '$id' LIMIT $start, $limit";
        $stmt = $db->query($query);
        $temp = $stmt->fetchAll(PDO::FETCH_ASSOC);
        //d($temp);
        return $temp;
    }
    public static function getProductsByCategory($id, $start, $limit, $key, $giatu, $giaden, $idL, $xem)
    {
        $db = static::getDB();
        $stmt = $db->prepare("SELECT * FROM sanpham WHERE idLSP = :id LIMIT :start, :limit");

        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':start', $start, PDO::PARAM_INT);
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function countProducts($idLSP)
    {
        $db = static::getDB();
        $stmt = $db->prepare("SELECT COUNT(*) FROM sanpham WHERE idLSP = :idLSP");
        $stmt->execute(['idLSP' => $idLSP]);
        return $stmt->fetchColumn();
    }
}