<?php
    include 'header.php';  
    $id = $_GET['id'];
    $sql = "SELECT * FROM chitietdathang where SoDonDH = '$id'" ;
    $query =mysqli_query($connect, $sql);
?>

<div class="product">
<div class="card">
                        <div class="card-header">
                        <h1> Tất cả <a class="btn btn-secondary" href="donmua.php" role="button"> Trở về</a></h1>
                        </div>
                            <div class="card-body">
                                    <!-- table -->
                                    <table class="table">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>STT</th>
                                                <th>Tên sản phẩm</th>
                                                <th>Ảnh sản phầm</th>
                                                <th>Giá sản phẩm</th>
                                                <th>Số lượng SP</th>
                                                <th>Thành Tiền</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            if(isset($_SESSION['ID'])){ 
                                                    $i =1;
                                                    while($row_detal = mysqli_fetch_assoc($query)){
                                                        $mshh =$row_detal['MSHH'];
                                                        $sql2 = "SELECT * FROM hanghoa where MSHH = '$mshh'";
                                                        $query2 = mysqli_query($connect, $sql2);
                                                        $row2 = mysqli_fetch_assoc($query2);
                                                        ?>  
                                                    <tr>
                                                        <td><?php echo $i++; ?></td>
                                                        <td><?php echo $row2['TenHH']; ?></td>
                                                        <td><img height="100px" width="100px" src="<?php echo $row2['AnhSP'];?>"></td>
                                                        <td><?php echo number_format($row2['Gia'],0,'','.'); ?></td>
                                                        <td><?php echo $row_detal['SoLuong']; ?></td>
                                                        <td><?php  echo number_format($row_detal['GiaDatHang'],0,'','.'); ?></td>
                                                  
                                            </tr>
                                            <?php }}?>
                                        </tbody>
                                    </table>
                                <!-- end table -->
                            </div> <!-- end cart body -->
                        </div>
</div>

<?php include 'footer.php';  ?>