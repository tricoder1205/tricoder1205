<?php
    include 'header_admin.php';
    $sql = "SELECT * FROM loaihanghoa";
    $query = mysqli_query($connect, $sql);
?>

    <div class="container-fluid bg-light">
    <div class="card">
        <div class="card-header">
           <h1><i class="bi bi-box-seam"> Danh Sách Loại Sản Phẩm</i></h1>
           <a class="btn btn-info bi bi-clipboard-plus btn-add" href="admin.php?page_layout=addtype"> Thêm Mới LSP</a>
           
        </div>
        <div class="card-body">
        <!-- table -->
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th>#</th>
                        <th>Mã Loại Hàng</th>
                        <th class="th-l">Tên Loại Hàng </th>
                        <th>Sửa</th>
                        <th>Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                        while($row = mysqli_fetch_assoc($query)){?>
                   <tr>
                        <td><?php echo $i++; ?></th>
                        <td><?php echo $row['MaLoaiHang']; ?></td>
                        <td><?php echo $row['TenLoaiHang']; ?></td>
                        <td><a class="btn btn-warning bi bi-pencil-square" href="admin.php?page_layout=edittype&id=<?php echo $row['MaLoaiHang']; ?>"></a></td>
                        <td><a class="btn btn-danger bi bi-trash" role="button" onclick="return Del('<?php echo $row['TenLoaiHang']; ?>')" href="admin.php?page_layout=deltype&id=<?php echo $row['MaLoaiHang']; ?>"></a></td>
                        <?php }?>
                    </tr>
                </tbody>
            </table>
            <!--End table  -->
        </div>
        </div>
    </div> 
    </div> 
    <!--  -->
<script>
    function Del(name){
        return confirm("Bạn có chắc chắn xóa Loại sản phẩm " + name + " ???")
    }
</script>
<!--  -->
    </div>
</body>
</html>