<?php
    include 'header_admin.php';
    $sql = "SELECT * FROM khachhang";
    $query = mysqli_query($connect, $sql);
?>

<div class="container-fluid bg-light">
    <div class="card">
        <div class="card-header">
           <h1> <i class="bi bi-file-earmark-person"> Danh Sách Khách Hàng</i></h1>
           <a class="btn btn-info btn-add bi bi-person-plus-fill" href="admin.php?page_layout=adduser"> Thêm KH</a>
        </div>
        <div class="card-body">
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th>#</th>
                        <th>Mã số khách hàng</th>
                        <th>Họ và Tên</th>
                        <th>Địa chỉ</th>
                        <th>Số điện thoại</th>
                        <th>Email</th>
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
                        <td><?php echo $row['MSKH']; ?></td>
                        <td><?php echo $row['HoTenKH']; ?></td>
                        <td><?php echo $row['DiaChi']; ?></td>
                        <td><?php echo $row['SoDienThoai']; ?></td>
                        <td><?php echo $row['Email']; ?></td>
                        <td><?php echo $row['username']; ?></td>
                        <td><a class="btn btn-warning bi bi-pencil-square" href="admin.php?page_layout=edituser&id=<?php echo $row['MSKH']; ?>"></a></td>
                        <td><a class="btn btn-danger bi bi-trash" role="button" onclick="return Del('<?php echo $row['HoTenKH']; ?>')" href="admin.php?page_layout=deluser&id=<?php echo $row['MSKH']; ?>"></a></td>
                        <?php }?>
                    </tr>
                </tbody>
            </table>
        </div>
        <script>
            function Del(name){
                return confirm(" Bạn có chắc chắn xóa Khách Hàng:  " + name + " ???")
            }
        </script>
        </div>
    </div> 
    </div>
</body>
</html>