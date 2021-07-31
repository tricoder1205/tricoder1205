<?php
    require_once 'conf/db.php';
    session_start();
    if(isset($_SESSION['ID'])){
        $mskh = $_SESSION['ID'];
        $sql_cart = "SELECT * FROM giohang where MSKH = '$mskh' ";  
        $query_cart = mysqli_query($connect, $sql_cart);
       
        $mskh = $_SESSION['ID'];
        $sql1 = "SELECT sum(thanhtien) AS tt from giohang where MSKH = '$mskh'";
        $query1 = mysqli_query($connect, $sql1);
        $row1 = mysqli_fetch_assoc($query1);
        $num = $row1['tt'];
    if(isset($_POST['sbmt'])){
        $sodh = 'DH'. rand(0,999999);
        $msnv = 'NV02';
        $ngaydh = date("Y/m/d");
        $newdate = strtotime ( '+5 day' , strtotime ( $ngaydh ) ) ;
        $ngaygh = date ( 'Y/m/d' , $newdate );
        $trangthai = 'DXL';
        $sql3 ="INSERT INTO dathang (SoDonDH,MSKH,MSNV,NgayDH,NgayGH,trangthai) value('$sodh','$mskh', '$msnv','$ngaydh','$ngaygh','$trangthai');";
        $query3 = mysqli_query($connect, $sql3);
        
        while($row_cart = mysqli_fetch_assoc($query_cart)){
            $tenhh = $row_cart['TenHH'];
            $sql5 = "SELECT MSHH FROM hanghoa where TenHH = '$tenhh'";
            $query5 = mysqli_query($connect, $sql5);
            $row5 = mysqli_fetch_assoc($query5);
            $mshh = $row5['MSHH'];
            $solg = $row_cart['sl'];
            $gia = $row_cart['gia']*$row_cart['sl'];
            $giamgia = 0;
            $sql4 = "INSERT INTO chitietdathang (SoDonDH,MSHH,Soluong,GiaDathang,Giamgia) value ('$sodh','$mshh','$solg','$gia','$giamgia');";
            $query4 = mysqli_query($connect, $sql4);
            $sql6 = "DELETE FROM giohang where TenHH ='$tenhh'";
            $query6 = mysqli_query($connect, $sql6);
        }
        if($query3){
            echo '<script type="text/javascript" language="javascript">alert("Đã đặt hàng thành công."); window.location= "index.php";</script>';
        } else{
            echo '<script language="javascript">alert("Lỗi!!")</script>';
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
                           <h1>Thanh Toán</h1>
                        </li>
                    </ul>
                </div>
<!--end left  -->
<!-- right -->
                    <div class="right">
                        <?php
                            $sql2 = "SELECT * FROM khachhang where MSKH = '$mskh'";
                            $query2 = mysqli_query($connect, $sql2);
                            $row2 = mysqli_fetch_assoc($query2);  
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
                            </div>"; ?>
                    </div>
<!-- end right -->
                </div>
<!-- end header_nav -->
            </div>
<!-- end container -->
        </div>
<!-- end header_pay -->
            <!-- Thong tin Dat Hang -->
<!-- Start pay info -->
                <div class="pay_info">
                        <div class="container">
<!--Start form  -->
                        <form action="" method ="POST" role="form" enctype="multipart/form-data">
                        <div class="user">
                        <h1>Thông tin đặt hàng </h1>
                            <div class="form-group " id='pass'>
                                <i class="fas fa-lock"> Họ và Tên: </i>
                                <input type="text" class="form-control" name="txt" id="name" value="<?php echo $_SESSION['FullName']; ?>">
                            </div>  
                            <div class="form-group " id='pass'>
                            <i class="fas fa-lock"> Số điện thoại:  </i>
                            <input type="tel" class="form-control" name="txt" id="tel" value="<?php echo $row2['SoDienThoai']; ?>">
                            </div>  
                            <div class="form-group " id='pass'>
                                <i class="fas fa-lock"> Địa chỉ nhận hàng: </i>
                                <input type="text" class="form-control" name="txt" id="address" value="<?php echo $row2['DiaChi'];?>">
                            </div>  
                        </div>
                            <?php } ?>
                        <hr>
                        <div class="card">
                        <div class="card-header">
                            <h1> Sản Phẩm</h1>
                        </div>
                            <div class="card-body">
<!-- table product -->
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
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if(isset($_SESSION['ID'])){ 
                                                    $i =1;
                                                    while($row_cart = mysqli_fetch_assoc($query_cart)){
                                                        $tenhh = $row_cart['TenHH'];
                                                        $sql5 = "SELECT MSHH FROM hanghoa where TenHH = '$tenhh'";
                                                        $query5 = mysqli_query($connect, $sql5);
                                                        $row5 = mysqli_fetch_assoc($query5);
                                                        if(isset($_POST['sbmt'])){
                                                            $mshh = $row5['MSHH'];
                                                            $solg = $row_cart['sl'];
                                                            $gia = $row1['tt'] +30000;
                                                            $giamgia = 0;
                                                            $sql4 = "INSERT INTO dathang (SoDonDH,MSHH,Soluong,GiaDathang,Giamgia) value ('$sodh','$mshh','$solg','$gia','$giamgia');";
                                                            $query4 = mysqli_query($connect, $sql4);
                                                        }?>  
                                                <tr>
                                                    <td><?php echo $i++; ?></td>
                                                    <td><?php echo $row_cart['TenHH']; ?></td>
                                                    <td><?php echo $row_cart['size']; ?></td>
                                                    <td>
                                                        <img height="100px" width="100px" src="<?php echo $row_cart['anhsp'];?>">
                                                    </td>
                                                    <td><?php echo $row_cart['gia']; ?></td>
                                                    <td><?php echo $row_cart['sl']; ?></td>
                                                    <td><?php echo $row_cart['thanhtien']; ?></td>
                                                </tr>
                                            <?php }?>
                                                <tr>
                                                    <td colspan="5"><h1> Tổng Tiền: </h1></td>
                                                    <td colspan="2"> <span style="color:red;padding-left: 20px;font-size:2.5rem;font-weight:bold">
                                                            <?php $english_format_number = number_format($num, 0, ' ', '.');echo $english_format_number; ?> Đ</span>
                                                     </td>
                                                </tr>
                                            
                                        </tbody>
                                    </table>
<!-- end table -->
                            </div> 
<!-- end cart body -->
                        </div>
                
<!-- end form -->
                     <hr>
                    <div class="oder">
                        <div class="payments">
                            <h2>Phương thức thanh toán</h2>
                            <select name="payments" id="paymts">
                                <option value="">Thanh toán khi nhận hàng</option>
                                <option value="">Thẻ ghi nợ</option>
                                <option value=""><i class="bi bi-credit-card"></i>Ví điện tử</option>
                            </select>
                            <p>Phí thu hộ: ₫0 VNĐ. Ưu đãi về phí vận chuyển (nếu có) áp dụng cả với phí thu hộ.</p>
                        </div>
                       
                        <div class="cost">
                            <p>Tổng tiền hàng: <?php echo $english_format_number?> Đ</p>
                            <p>Phí vận chuyển: 30.000 Đ</p>
                            <p>Tổng Tiền: <span> <?php $phivc = 30000; $num2 = $row1['tt']+$phivc;$english_format_number = number_format($num2, 0, ' ', '.'); echo $english_format_number ?> Đ</span></p>
                        </div>
                        <?php  }?>
                        <hr>
                        <div class="oder_pay">
                            <button type="submit" name="sbmt" class="btn_pay btn-danger" role="button" onclick="return oder('Hóa Đơn')">Đặt Hàng</button>
                        </div>
                    </div>
                    <script>
                        function oder(name){
                            return confirm("Bạn xác nhận thanh toán " + name + " ???")
                        }
                    </script>
                </form>
            </div>
            <!-- End container -->
            </div>
<!-- end pay info -->
<?php
    mysqli_close($connect);
    include 'footer.php';
?>