<?php 
    include 'header_admin.php';
    $sql_oder = "SELECT * FROM dathang ORDER BY NgayDH DESC";
    $query_oder = mysqli_query($connect, $sql_oder);
?>

  <div class="container-fluid bg-light">
    <div class="card">
        <div class="card-header">
           <h1> <i class="bi bi-calendar2-check"> Danh Sách Đơn Đặt Hàng</i></h1>
        </div>
        <div class="card-body card-body-table">
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th>#</th>
                        <th>Số Đơn ĐH</th>
                        <th>MSKH</th>
                        <th>MSNV</th>
                        <th>Ngày Đặt</th>
                        <th>Ngày Giao</th>
                        <th>Tổng Tiền</th>
                        <th>Trạng Thái</th>
                        <th>Sửa</th>
                        <th>Xóa</th>
                        <th>Chi tiết</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $i = 1; 
                        while($row = mysqli_fetch_assoc($query_oder) ){
                            $msdh = $row['SoDonDH'];
                            $sql_detal = "SELECT sum(giadathang) as tt FROM chitietdathang where SoDonDH = '$msdh'";
                            $query_detl = mysqli_query($connect, $sql_detal);
                            $row_detl = mysqli_fetch_assoc($query_detl);
                            ?>
                            <tr>
                                <td><?php echo $i++; ?></th>
                                <td><?php echo $row['SoDonDH']; ?></td>
                                <td><?php echo $row['MSKH']; ?></td>
                                <td><?php echo $row['MSNV']; ?></td>
                                <td><?php echo $row['NgayDH']; ?></td>
                                <td><?php echo $row['NgayGH']; ?></td>
                                <td><?php echo number_format($row_detl['tt'] + 30000, 0, ' ', '.').'  Đ'; ?></td>
                                <td>
                                    <?php 
                                        if($row['trangthai'] == 'DN'){
                                            echo ' <button class="btn btn-success"> Đã nhận</button>';
                                        }else if($row['trangthai'] == 'DXL') {
                                            echo ' <button class="btn btn-warning"> Đang xử lý</button>
                                                <a class="btn btn-success" href="admin.php?page_layout=accept&id='.$msdh.'"><i class="bi bi-check2-square"></i></a   >
                                            ';
                                        }else if($row['trangthai'] == 'HUY'){
                                            echo '<button class="btn btn-danger"> Đã hủy</button>';
                                        }
                                ?>
                                </td>
                                <td><a class="btn btn-warning bi bi-pencil-square" href="admin.php?page_layout=editdondh&id=<?php echo $row['SoDonDH']; ?>"></a></td>
                                <td><a class="btn btn-danger bi bi-trash" role="button" onclick="return Del('<?php echo $row['SoDonDH']; ?>')" href="admin.php?page_layout=deldondh&id=<?php echo $row['SoDonDH']; ?>"></a> </td>
                                <td><a class="btn btn-info bi bi-eye" href="admin.php?page_layout=detaildondh&id=<?php echo $row['SoDonDH']; ?>"></a></td>
                            </tr>
                        <?php }?>
                </tbody>
            </table>
        </div>
    </div>
</div> 
<script>
    function Del(name){
        return confirm("Bạn có chắc chắn xóa sản phẩm " + name + " ???")
    }
</script>
    </div>
</body>
</html>