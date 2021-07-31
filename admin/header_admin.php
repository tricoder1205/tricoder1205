<?php 
  require_once 'conf/db.php';
  session_start();
  $msnv = $_SESSION['IDQT'];
  $sqlt = "SELECT * from nhanvien where MSNV = '$msnv'";
  $queryt = mysqli_query($connect, $sqlt);
  $row = mysqli_fetch_assoc($queryt);
  $idmsnv = $row['MSNV'];
  if( $msnv = $idmsnv){
      echo '
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Adminimation</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://code.jquery.com/jquery-latest.js"></script>
        <script src="js/maine.js"></script>
        <link rel="stylesheet" href="css/admin.css">
        <link rel="stylesheet" href="css/navbars.css">
    </head>
    <body>
        <aside id="left-panel" class="left-panel">
            <nav class="navbar">
                <div class="navbar-header">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fa fa-bars"></i>
                    </button>
                    <a class="navbar-brand" href="dashboard.php"><img height="69px" width="230px" src="imgs/logo1.png" alt="Logo"></a>
                </div>
                <div class="main-menu">
                    <ul class="nav navbar-nav">
                        <li class="active">
                        <a href="dashboard.php">
                        <i class="bi bi-speedometer2"> Dashboard</i>
                        </a>
                    </li>
                        <h3 class="menu-title">Quản Trị </h3>
                        <li class="">
                            <a href="qlkhachhang.php">
                                <i class="menu-icon bi bi-file-earmark-person"></i>
                                Quản lý khách hàng
                                <i class="menu-icon-end bi bi-caret-right"></i>
                            </a>
                        </li>
                        <li class="">
                            <a href="qlnhanvien.php">
                                <i class="menu-icon bi bi-person-lines-fill"></i>
                                Quản lý Nhân viên
                                <i class="menu-icon-end bi bi-caret-right"></i>
                            </a>
                        </li>
                        <li class="">
                            <a href="qlsanpham.php">
                                <i class="menu-icon bi bi-gift"></i>
                                Quản lý sản phẩm
                                <i class="menu-icon-end bi bi-caret-right"></i>
                            </a>
                        </li>
                    
                        <li class="">
                            <a href="qlloaisanpham.php">
                                <i class="menu-icon bi bi-box-seam"></i>
                                Quản lý Loại Sản Phẩm
                                <i class="menu-icon-end bi bi-caret-right"></i>
                            </a>
                        </li>
                        <li class="">
                            <a href="qldondathang.php">
                                <i class="menu-icon bi bi-calendar2-check"></i>
                                Quản lý Đặt Hàng
                                <i class="menu-icon-end bi bi-caret-right"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav> 
        </aside>
    <div class="body-right">
        <div class="navbar_top">
            <div class="button-search">
                <form class="form-inline">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-secondary bg-info my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
                <div class="icon_user">
                    <i class="bi bi-person-bounding-box"></i>
                        <div class="login_warp">
                            <ul class=login_list >
                                <li>'. $_SESSION['FullNameNV'] .'</li>
                                <li><a href="logout_admin.php">Đăng xuất</a></li>
                            </ul>
                        </div>
                </div>
        </div>
    ';
} 
    else { 
        require_once 'login_admin.php';}
?>