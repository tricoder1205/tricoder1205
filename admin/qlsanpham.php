<?php
    include 'header_admin.php';
    $sql = "SELECT * FROM hanghoa ";
    $query = mysqli_query($connect, $sql);
    
?>  
  <div class="container-fluid bg-light">
    <div class="card">
        <div class="card-header">
           <h1> <i class="bi bi-gift"> Danh Sách Sản Phẩm</i></h1>
           <a class="btn btn-info bi bi-clipboard-plus btn-add" href="admin.php?page_layout=add"> Thêm Mới SP</a>
        </div>
        <div class="card-body">
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th>#</th>
                        <th>Mã sản phẩm</th>
                        <th>Tên sản phẩm</th>
                        <th>Ảnh sản phầm</th>
                        <th>Giá sản phẩm</th>
                        <th>Số lượng SP</th>
                        <th>Mô tả</th>
                        <th>Mã Loại Hàng</th>
                        <th>Tên Loại Hàng</th>
                        <th>Ghi Chú</th>
                        <th>Sửa</th>
                        <th>Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;  
                        while($row = mysqli_fetch_assoc($query) ){
                            ?>
                        
                   <tr >
                        <td><?php echo $i++; ?></th>
                        <td><?php echo $row['MSHH']; ?></td>
                        <td><?php echo $row['TenHH']; ?></td>
                        <td>
                            <img height="100px" width="100px" src="<?php echo $row['AnhSP'];?>">
                           
                        </td>
                        <td><?php echo $row['Gia']; ?></td>
                        <td><?php echo $row['SoLuongHang']; ?></td>
                        <td><?php echo $row['Mota']; ?></td>
                        <td><?php echo $row['MaLoaiHang']; ?></td>
                        <td>
                            <?php  
                                $mlhh = $row['MaLoaiHang'];
                                $sql_type = "SELECT * FROM loaihanghoa where maloaihang = '$mlhh' ";
                                $query_type = mysqli_query($connect, $sql_type);
                                $row_type = mysqli_fetch_assoc($query_type);
                                echo $row_type['TenLoaiHang'];
                            ?>
                        </td>
                        <td><?php echo $row['GhiChu']; ?></td>
                        <td><a class="btn btn-warning bi bi-pencil-square" href="admin.php?page_layout=edit&id=<?php echo $row['MSHH']; ?>"></a></td>
                        <td><a class="btn btn-danger bi bi-trash" role="button" onclick="return Del('<?php echo $row['TenHH']; ?>') " href="admin.php?page_layout=del&id=<?php echo $row['MSHH']; ?>"></a></td>
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