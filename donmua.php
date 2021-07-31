<?php
    include 'header.php';
    if(isset($_SESSION['ID'])){ 
        $mskh = $_SESSION['ID'];
        $sql_detal = "SELECT * FROM dathang where MSKH='$mskh' ORDER BY NgayDH DESC;";
        $query_detal = mysqli_query($connect, $sql_detal); 
    }
?>

<div class="product">
<div class="row bg-white pt-4 pb-4 border-bt pc">
            <article class="product__main col-lg-9 col-md-12 col-sm-12">
                        <div class="card">
                        <div class="card-header">
                        <h1> Tất cả</h1>
                        </div>
                            <div class="card-body">
                                    <!-- table -->
                                    <table class="table">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>STT</th>
                                                <th>Ngày đặt hàng</th>
                                                <th>Mã số đơn hàng</th>
                                                <th>Số lượng SP</th>
                                                <th>Tổng Tiền</th>
                                                <th>Trạng Thái</th>
                                                <th>Chi tiết</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            if(isset($_SESSION['ID'])){ 
                                                    $i =1;
                                                    while($row_detal = mysqli_fetch_assoc($query_detal)){
                                                        $msdh = $row_detal['SoDonDH'];
                                                        $sql_detal = "SELECT sum(giadathang) as tt, sum(SoLuong) as sl FROM chitietdathang where SoDonDH = '$msdh'";
                                                        $query_detl = mysqli_query($connect, $sql_detal);
                                                        $row_detl = mysqli_fetch_assoc($query_detl);
                                                        ?>  
                                                    <tr>
                                                        <td><?php echo $i++; ?></td>
                                                        <td><?php echo $row_detal['NgayDH']; ?></td>
                                                        <td><?php echo $row_detal['SoDonDH']; ?></td>
                                                        <td><?php echo $row_detl['sl']; ?></td>
                                                        <td><?php  echo number_format($row_detl['tt'] + 30000, 0, ' ', '.');?> Đ</td>
                                                        <td>
                                                        <?php 
                                                                if($row_detal['trangthai'] == 'DN'){
                                                                    echo ' <button class="btn btn-success status_re"> Đã nhận</button>';
                                                                }else if($row_detal['trangthai'] == 'DXL') {     
                                                                    echo ' <button class="btn btn-warning status_ex"> Đang xử lý</button>
                                                                    <a name="cancel" id="" class="btn btn-danger status_cancel" href="cart.php?page_layout=cancel&id='. $row_detal['SoDonDH'] .'" role="button">Hủy</a>';
                                                                } else  if($row_detal['trangthai'] == 'HUY'){
                                                                    echo '<button class="btn btn-danger status_cancel"> Đã hủy</button>';
                                                                }
                                                                ?>
                                                        </td>
                                                        <td><a name="cancel" id="" class="btn btn-info bi bi-eye" href="detail_cart.php?&id=<?php echo $msdh;?>"></a></td>
                                            </tr>
                                            <?php }}?>
                                        </tbody>
                                    </table>
                                <!-- end table -->
                            </div> <!-- end cart body -->
                        </div>
            </article>
            <aside class="product__aside col-lg-3 col-md-0 col-sm-0">
              <div class="product__aside-top">
                  <div class="product__aside-top-item">
                      <div class="product__aside-top-item-text">
                          <p style="font-size:30px;"><b><i class="bi bi-person-bounding-box"> <?php echo $_SESSION['FullName']?></i> </b></p> 
                      </div>
                  </div>
                  <div class="product__aside-top-item">
                      <div class="product__aside-top-item-text">
                      <a class="" href="index.php"><i class="bi bi-person-badge"> Tài khoản của tôi</i></a> 
                      </div>
                  </div>
                  
                  <div class="product__aside-top-item">
                      <div class="product__aside-top-item-text">
                      </div>
                  </div>
                  <?php ?>
              </div>
          </aside>
        </div>
    </div>
<?php include 'footer.php'?>