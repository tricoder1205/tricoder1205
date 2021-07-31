<?php
    include 'header_admin.php';
    $sql = "SELECT * FROM nhanvien";
    $query = mysqli_query($connect, $sql);

?>
    <div class="container-fluid bg-light">
    <div class="card">
        <div class="card-header">
           <h1> <i class="bi bi-person-lines-fill"> Danh Sách Nhân Viên</i></h1>
           <a class="btn btn-info btn-add bi bi-person-plus-fill" href="admin.php?page_layout=addimploy"> Thêm nhân viên</a>
        </div>
        <div class="card-body">
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th>#</th>
                        <th>Mã số Nhân Viên</th>
                        <th>Họ và Tên</th>
                        <th>Chức vụ</th>
                        <th>Địa chỉ</th>
                        <th>Số điện thoại</th>
                        <th>Username</th>
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
                        <td><?php echo $row['MSNV']; ?></td>
                        <td><?php echo $row['HoTenNV']; ?></td>
                        <td><?php echo $row['ChucVu']; ?></td>
                        <td><?php echo $row['DiaChi']; ?></td>
                        <td><?php echo $row['SoDienThoai']; ?></td>
                        <td><?php echo $row['username']; ?></td>
                        <?php
                            $idad = 'Admin';
                            $msnv = $_SESSION['IDQT'];
                            if($msnv == $idad){echo '
                                <td><a class="btn btn-warning bi bi-pencil-square" href="admin.php?page_layout=editimploy&id='.$row['MSNV'].'"</a></td>
                                <td><a class="btn btn-danger bi bi-trash" role="button" onclick="return Del('. $row['HoTenNV'] .')" href="admin.php?page_layout=delimploy&id='. $row['MSNV'].'"></a></td>
                        '; }
                        }?>
                    </tr>
                </tbody>
            </table>
            <script>
                function Del(name){
                    return confirm("Bạn có chắc chắn xóa nhân viên " + name + " ???")
                }
            </script>
        </div>
        </div>
    </div> 
    </div>
</body>
</html>