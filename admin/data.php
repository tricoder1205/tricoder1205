<?php
    require_once 'conf/db.php';
    $sql1 = "SELECT MONTH(b.NgayGH) as thang, SUM(a.GiaDatHang + 30000) as dt
    FROM chitietdathang  as a, dathang as b
    where a.SoDonDH = b.SoDonDH and b.trangthai = 'DN' and year(b.NgayGH) = 2021
    GROUP BY thang;";
    $query1 = mysqli_query($connect, $sql1);
    echo json_encode($query1 -> fetch_all(MYSQLI_ASSOC));
?>