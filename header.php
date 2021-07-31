<?php   
    require_once 'conf/db.php';
?>
<?php 
  session_start();
  if(isset($_SESSION['ID'])){
    $mskh = $_SESSION['ID'];
    $sql_cart = "SELECT * FROM giohang where MSKH = '$mskh' ";  
    $query_cart = mysqli_query($connect, $sql_cart);
  }
  $sql4 = "SELECT * FROM hanghoa inner join loaihanghoa on hanghoa.maloaihang = loaihanghoa.maloaihang";
  $query4 = mysqli_query($connect, $sql4);
  $row4 =mysqli_fetch_assoc($query4);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
  <html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Mindy Kandy Lab Shop</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/base.css">
    <link rel="stylesheet" href="./css/mains.css">
    <link rel="stylesheet" href="./css/gridc.css">
    <link rel="stylesheet" href="./css/products.css">
</head>

<body>  
 		<!-- header -->
     <header class="header">
			  <div class="grid wide">
				<!-- header navbar -->
					<!-- end header-navbar -->
					<!-- header-search -->
					<div class="header-with-search">
              <!-- logo -->
              <div class="header__logo">
                <a href="index.php" class="header__logo-link">
                  <img class="header__logo-img" src="imgs/logo1.png" alt="logo"> 
                </a>
              </div>
						<!-- end logo -->
            
						<!-- search -->
              <div class="header__search">
                <div class="header__search-input-wrap">
                  <input type="text" class="header__search-input" placeholder="Tìm kiếm sản phẩm tại đây">
                  <div class="header__search-history">
                    <h3 class="header__search-history-heading">Lịch sử tìm kiếm</h3>
                    <ul class="header__search-history-list">
                      <li class="header__search-history-item">
                        <a href="#">giày thể thao</a>
                      </li>
                      <li class="header__search-history-item">
                        <a href="#">giày sandal</a>
                      </li>
                    </ul>
                  </div>
                </div>
                <button class="header__search-btn">
                  <i class="header__search-btn-icon"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                  </svg></i>
                </button>
              </div>
              
						<!--end search -->
            <!-- login-logout -->
            <div>
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
                              </div>
                                ";
                        }else {
                            echo ' 
                            <ul class="header__navbar-list">
                                    <li>
                                      <img src="imgs/account.png" height="30px" width="30px"><span class="header__navbar-item-link" style="font-size: 12px; font-weight: bold; padding-left: 5px">Tài Khoản <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                                      <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
                                    </svg><span>
                                    </li>
                                    <li class="header__navbar-item ">
                                        <a class="header__navbar-item-link" href="login.php"  style="font-size: 10px; font-weight: bold;"> Đăng nhập</a>
                                        <b> /</b>
                                        <a class="header__navbar-item-link" href="registration.php" style="font-size: 10px; font-weight: bold;"> Đăng ký</a>
                                    </li>
                                  </ul>';
                        }
                        ?>
            </div>
          <!--  -->
						<!-- cart -->
						<div class="header__cart">
							<div class="header__cart-wrap">
								<i class="header__cart-icon"><img src="imgs/cart.png" height="60px" width="70px"></i>
								<div class="header__cart-list">
									<!-- no cart: header__cart-list--no-cart -->
									<img src="imgs/no_cart.png" alt="" class="header__cart-no-cart-img">
                      <p class="header__cart-no-cart-msg">Chưa có sản phẩm</p>
                      <h4 class="header__cart-heading">Sản phẩn đã thêm</h4>
                    <ul class="header__cart-list-item">
                       <?php 
                        if(isset($_SESSION['ID'])){
                            while($row_cart = mysqli_fetch_assoc($query_cart)) {
                        ?>
                            <li class="header__cart-item">
                                <img src="<?php echo $row_cart['anhsp']; ?>" class="header__cart-img">
                                <div class="header__cart-item-info">
                                  <div class="header__cart-item-head">
                                    <h5 class="header__cart-item-name"><?php echo $row_cart['TenHH']; ?></h5>
                                    <div class="header__cart-item-price-wrap">
                                      <span class="header__cart-item-price">
                                      <?php echo number_format($row_cart['gia'], 0, ' ', '.');?> Đ</span>
                                    </div>
                                  </div>
                                </div>
                            </li>
                          <?php }}?>
                    </ul>
									<button class="btn btn--primary header__cart-view-cart">
									 <a href="giohang.php" class="header__navbar-item-link">Xem giỏ hàng</a>	
									</button>
								</div>
                <span class="header__cart-notice">
									<?php
                    if(isset($_SESSION['ID'])){
                      $mskh = $_SESSION['ID'];
                      $sql = "SELECT count(msgh) AS 'stt' FROM giohang WHERE MSKH = '$mskh' ";
                      $query = mysqli_query($connect, $sql);
                      $row = mysqli_fetch_assoc($query);
                       echo $row['stt'];
                      }
                  ?>
								</span>
							</div>
						</div>
						<!--end cart -->
					</div>
					<!--end header-search -->
          <div class="header__nav">
                <div class="container">
                    <section class="row">
                            <ul class="header__nav-list">
                                <li class="header__nav-item">
                                    <a href="index.php" class="header__nav-link">Trang chủ</a>
                                </li>
                                <li class="header__nav-item">
                                    <a href="#" class="header__nav-link">Giới thiệu</a>
                                </li>
                                <li class="header__nav-item">
                                    <a href="index.php" class="header__nav-link">Sản phẩm</a>
                                </li>
                                <li class="header__nav-item">
                                    <a href="#" class="header__nav-link">Tuyển cộng tác viên</a>
                                </li>
                                <li class="header__nav-item">
                                    <a href="#" class="header__nav-link">Liên hệ</a>
                                </li>
                            </ul>
                    </section>
                  </div>
              </div>
            </div>
		</header>
		<!--end header -->