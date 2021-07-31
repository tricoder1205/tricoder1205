<?php   
    require_once 'conf/db.php';
?>
<?php 
    session_start();
    if(isset($_SESSION['ID'])){
        $mskh = $_SESSION['ID'];
        $sql_cart = "SELECT * FROM giohang where MSKH = '$mskh' ";  
        $query_cart = mysqli_query($connect, $sql_cart);
        if(isset($_POST['sbmt'])){
            $sql1 = "SELECT sum(thanhtien) AS tt from giohang where MSKH = '$mskh'";
            $query1 = mysqli_query($connect, $sql1);
            $row1 = mysqli_fetch_assoc($query1);
                if($row1['tt'] == null){
                    echo '<script language="javascript">alert("Không có sản phẩm nào trong giỏ hàng!")</script>';
                }else {
                    header('location: thanhtoan.php');
                }
        }
   }

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Thế Giới giầy MindyShose</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/base.css">
    <link rel="stylesheet" href="./css/mains.css">
    <link rel="stylesheet" href="./css/products.css">
    
</head>
<body>
        <div class="header_pay">
<!-- container  -->
            <div class="container ">
<!-- Header_nav -->
            <div class="header__nav">
<!-- left -->
               <div class="left">
                   <ul class="header__nav-list">
                       <li class="boder_right">
                           <div class="header__logo">
                                <a href="index.php" class="header__logo-link">
                                <img class="header__logo-img" src="imgs/logo1.png" alt="logo"> 
                                </a>
                            </div>
                        </li>
                        <li>
                           <h1>Giỏ Hàng</h1>
                        </li>
                    </ul>
                </div>
<!--end left  -->
<!-- right -->
                    <div class="right">
                        <?php
                        if(isset($_SESSION['ID'])){
                            echo "
                            <div class='header__login'>
                            <div class='header__login-wrap'>
                                <i class='bi bi-person-circle ' style='font-size: 35px; color: #EEE' ></i>
                                    <span class='name-login mr-2'>".$_SESSION['UserName']."</span>
                                    <div class='header__login-list'>
                                    <ul class='header__login-list-item '>
                                        <li class='header__navbar-item '>
                                        <a class='header__navbar-item-link' href='index.php' style='font-size: 10px; font-weight: bold;color: black'> Tài Khoản Của Tôi</a>
                                        </li>
                                        <li class='header__navbar-item '>
                                        <a class='header__navbar-item-link' href='donmua.php' style='font-size: 10px; font-weight: bold;color: black'> Đơn mua</a>
                                        </li>
                                        <li class='header__navbar-item ' >
                                        <a class='header__navbar-item-link' href='logout.php' style='font-size: 10px; font-weight: bold; color: red'> Đăng Xuất</a>
                                        </li>
                                    </ul>
                                </div>
                                </div>
                            </div>"; }?>
                    </div>
<!-- end right -->
                </div>
<!-- end header_nav -->
            </div>
<!-- end container -->
        </div>
<div class="product">
<div class="row bg-white pt-4 pb-4 border-bt pc">
            <article class="product__main col-lg-9 col-md-12 col-sm-12">
                <form action="" method ="POST" role="form" enctype="multipart/form-data">
                        <div class="card">
                        <div class="card-header">
                        <h1> Danh Sách Sản Phẩm</h1>
                        </div>
                            <div class="card-body">
                                    <!-- table -->
                                    <table class="table">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>STT</th>
                                                <th>Tên sản phẩm</th>
                                                <th>Size</th>
                                                <th>Ảnh sản phầm</th>
                                                <th>Giá sản phẩm</th>
                                                <th>Số lượng SP</th>
                                                <th>Thành Tiền</th>
                                                <th>Xóa</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            if(isset($_SESSION['ID'])){ 
                                                    $i =1;
                                                   
                                                    while($row_cart = mysqli_fetch_assoc($query_cart)){
                                                ?>  
                                        <tr>
                                                <td><?php echo $i++; ?></td>
                                                <td><a href="product.php?&id=<?php echo $row_cart['MSHH']; ?>"><?php echo $row_cart['TenHH']; ?></a> </td>
                                                <td><?php echo $row_cart['size']; ?></td>
                                                <td>
                                                    <img height="100px" width="100px" src="<?php echo $row_cart['anhsp'];?>">
                                                </td>
                                                <td><?php echo number_format($row_cart['gia'], 0, ' ', '.'); ?></td>
                                                <td><?php echo $row_cart['sl']; ?></td>
                                                <td><?php echo number_format($row_cart['thanhtien'], 0, ' ', '.'); ?></td>
                                                <td>
                                                    <a name="del_cart" id="del" class="btn btn-danger" onclick="return reloaded()"; href="cart.php?page_layout=delcart&id=<?php echo $row_cart['msgh'] ;?>" role="button"><i class="bi bi-trash"> Xóa</i></a>
                                                </td>
                                            </tr>
                                            <?php }}?>
                                        </tbody>
                                    </table>
                                <!-- end table -->
                            </div> <!-- end cart body -->
                        </div>
                
            </article>
            <?php 
            if(isset($_SESSION['ID'])){ 
                $mskh = $_SESSION['ID'];
                $sql1 = "SELECT sum(thanhtien) AS tt from giohang where MSKH = '$mskh'";
                $query1 = mysqli_query($connect, $sql1);
                $row1 = mysqli_fetch_assoc($query1);}
            ?>
            <aside class="product__aside col-lg-3 col-md-12 col-sm-12">
              <div class="product__aside-top">
                  <div class="product__aside-top-item">
                      <div class="product__aside-top-item-text">
                           Tạm Tính: 
                          <span>
                              <span style="padding-left: 50px;"><?php 
                             
                              if(isset($_SESSION['ID'])){ 
                                    echo number_format($row1['tt'], 0, ' ', '.');
                                  }?>.0 Đ
                          </span>
                      </div>
                  </div>
                  <div class="product__aside-top-item">
                      <div class="product__aside-top-item-text">
                         <p style="font-size:2.5rem;">Tổng Tiền: <span style="color:red;padding-left: 20px;font-size:2.5rem;"> <?php if(isset($_SESSION['ID'])){  $num = $row1['tt'];
                                  echo number_format($row1['tt'], 0, ' ', '.');}?>.0 Đ
                                  </span>
                           </p>
                      </div>
                  </div>
                  
                  <div class="product__aside-top-item">
                      <div class="product__aside-top-item-text">
                      <button type="submit" name="sbmt" class="btn_pay btn-danger" role="button"><i class="bi bi-wallet"> Tiến Hành Thanh Toán</i></button>
                          <!-- <a name="submit" id="submit" class="btn_pay btn-danger" href="thanhtoan.php" role="button"></a> -->
                      </div>
                  </div>
                  </form>
                  <p>Các phương thức thanh toán khác</p>
                  <div class="product__aside-top-item">
                      <img src="imgs/zalopay.png">
                      <div class="product__aside-top-item-text">
                          <p>
                              Ví điện tử Zalo Pay
                          </p>
                      </div>
                  </div>
                  <div class="product__aside-top-item">
                      <img src="imgs/momo.png">
                      <div class="product__aside-top-item-text">
                          <p>
                             Ví điện tử Momo
                          </p>
                      </div>
                  </div>    
              </div>
          </aside>
        </div>
    </div>

<?php include 'footer.php'?>
