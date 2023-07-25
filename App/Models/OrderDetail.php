<?php

namespace App\Models;

use PDO;

/**
 * Example user model
 *
 * PHP version 7.0
 */
class OrderDetail extends \Core\Model
{

    /**
     * Get all the users as an associative array
     *
     * @return array
     */
    public static function getAll()
    {
        $db = static::getDB();
        $stmt = $db->query('SELECT * FROM chitietdonhang');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public static function getDonHangDetail($idHD) {
        // Thực hiện truy vấn CSDL để lấy thông tin đơn hàng dựa vào $idHD

        // Kết nối đến CSDL
        $db = static::getDB();
        $sql = "SELECT idCTHD, hinhanh, tensp, dongia, soluong, thanhtien, Tongtien, Diachi, phone, payment, Trangthai, hoten_user FROM donhang dh, chitietdonhang ct, sanpham sp WHERE ct.idSP = sp.idSP AND ct.idHD = dh.idHD AND dh.idHD = :idHD";
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':idHD', $idHD);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
}
