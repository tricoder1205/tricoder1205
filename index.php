<?php
    include 'header.php';
    $sql = "SELECT * FROM hanghoa inner join loaihanghoa on hanghoa.maloaihang = loaihanghoa.maloaihang";
    $query = mysqli_query($connect, $sql);
    $sql_up = "SELECT * FROM loaihanghoa";
    $query_up = mysqli_query($connect, $sql_up);
?>
<!--  -->
    <!-- slide - menu list -->
      <div class="container_slide">
        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="imgs/panner05.jpg" class="d-block w-100" alt="1">
              <div class="carousel-caption d-none d-md-block">
                <h5></h5>
                <p></p>
              </div>
            </div>
            <div class="carousel-item">
              <img src="imgs/panner04.jpg" class="d-block w-100" alt="2">
              <div class="carousel-caption d-none d-md-block">
                <h5> </h5>
                <p> </p>
              </div>
            </div>
            <div class="carousel-item">
              <img src="imgs/panner02.jpg" class="d-block w-100" alt="3">
              <div class="carousel-caption d-none d-md-block">
                <h5> </h5>
                <p> </p>
              </div>
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
  </div>
<!--  -->
<div class="app__container">
  <div class="grid wide">
    <div class="row sm-gutter app__content">

      <!-- aside -->
     
      <!-- end aside -->
      <!-- article -->
      <div class="col l-10 m-12 c-12">
        <!-- home filter -->
        <div class="home-filter">
          <span class="home-filter__label">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-filter-circle" viewBox="0 0 16 16">
              <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
              <path d="M7 11.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5z"/>
            </svg>
          </span>
          <div class="select-input">
            <span class="select-input__label">Tùy Chọn Sản Phẩm</span>
            <i class="fas fa-chevron-down select-input__icon"></i>
            <ul class="select-input__list">
              <li class="select-input__item">
                <a href="#" class="select-input__link"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-sort-down-alt" viewBox="0 0 16 16">
                  <path d="M3.5 3.5a.5.5 0 0 0-1 0v8.793l-1.146-1.147a.5.5 0 0 0-.708.708l2 1.999.007.007a.497.497 0 0 0 .7-.006l2-2a.5.5 0 0 0-.707-.708L3.5 12.293V3.5zm4 .5a.5.5 0 0 1 0-1h1a.5.5 0 0 1 0 1h-1zm0 3a.5.5 0 0 1 0-1h3a.5.5 0 0 1 0 1h-3zm0 3a.5.5 0 0 1 0-1h5a.5.5 0 0 1 0 1h-5zM7 12.5a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 0-1h-7a.5.5 0 0 0-.5.5z"/>
                </svg> Giá Thấp đến cao</a>
              </li>
              <li class="select-input__item">
                <a href="#" class="select-input__link"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-sort-down" viewBox="0 0 16 16">
                  <path d="M3.5 2.5a.5.5 0 0 0-1 0v8.793l-1.146-1.147a.5.5 0 0 0-.708.708l2 1.999.007.007a.497.497 0 0 0 .7-.006l2-2a.5.5 0 0 0-.707-.708L3.5 11.293V2.5zm3.5 1a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zM7.5 6a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zm0 3a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3zm0 3a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1z"/>
                </svg> Giá Cao đến thấp</a>
              </li>
            </ul>
          </div>
          <button class="btn btn--primary home-filter__btn">Mới nhất</button>
          <button class="btn home-filter__btn">Bán chạy</button>
          <div class="select-input">
            <span class="select-input__label"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-square" viewBox="0 0 16 16">
              <path d="M3.626 6.832A.5.5 0 0 1 4 6h8a.5.5 0 0 1 .374.832l-4 4.5a.5.5 0 0 1-.748 0l-4-4.5z"/>
              <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm15 0a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2z"/>
            </svg>  Bộ Lọc </span>
            <i class="bi bi-caret-down-square"></i>
            <i class="select-input__icon"></i>
              <ul class="select-input__list">
                <li class="select-input__item">
                  <a href="#" class="select-input__link"> Phong Cách</a>
                </li>
                <li class="select-input__item">
                  <a href="#" class="select-input__link"> Loại giày</a>
                </li>
              </ul>
          </div>
        </div>
        
        <!--end home filter -->
        <!-- product -->

        <div class="home-product">
        <div id="LH29" ></div>
        <h1 class="home-product-h1">Giày Balenciaga</a></h1>
          <div class="row sm-gutter">
            <!-- product item --> 
            <?php
              $sql3 = "SELECT * FROM hanghoa inner join loaihanghoa on hanghoa.maloaihang = loaihanghoa.maloaihang where hanghoa.maloaihang = 'LH29'";
              $query3 = mysqli_query($connect, $sql3);
                while($row3 = mysqli_fetch_assoc($query3)){?>
                    <div class="col l-2-4 m-4 c-6">
                      <a class="home-product-item" href="product.php?&id=<?php echo $row3['MSHH'];?>">
                        <div class="home-product-item-img" style="background-image: url(<?php echo $row3['AnhSP'];?>)">
                        </div>
                        <h4 class="home-product-item-name"><?php echo $row3['TenHH']; ?></h4>
                        <div class="home-product-item__price">
                          <span class="home-product-item__type">
                            <?php
                              $mlhh = $row3['MaLoaiHang'];
                              $sql_type = "SELECT * FROM loaihanghoa where maloaihang = '$mlhh' ";
                              $query_type = mysqli_query($connect, $sql_type);
                              $row_type = mysqli_fetch_assoc($query_type);
                              echo $row_type['TenLoaiHang'];
                            ?>
                          </span>
                          <span class="home-product-item__price-current"><?php echo number_format($row3['Gia'], 0, ' ', '.');?> Đ</span>
                        </div>
                        <div class="home-product-item__origin"> 
                        </div>
                        <div class="home-product-item__favourite">
                          <i class="fas"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="12" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                            <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
                          </svg></i>
                          <span>Yêu thích</span>
                        </div>
                      </a>
                    </div>
            <?php }?>
        <!--end product -->
      </div>
      <hr>
      <h1 class="home-product-h1" ><a name="LH16"> Giày Adidas</a></h1>
          <div class="row sm-gutter">
            <!-- product item -->
            <?php
              $sql3 = "SELECT * FROM hanghoa inner join loaihanghoa on hanghoa.maloaihang = loaihanghoa.maloaihang where hanghoa.maloaihang = 'LH16'";
              $query3 = mysqli_query($connect, $sql3);
                while($row3 = mysqli_fetch_assoc($query3)){?>
                    <div class="col l-2-4 m-4 c-6">
                      <a class="home-product-item" href="product.php?&id=<?php echo $row3['MSHH'];?>">
                        <div class="home-product-item-img" style="background-image: url(<?php echo $row3['AnhSP'];?>)">
                        </div>
                        <h4 class="home-product-item-name"><?php echo $row3['TenHH']; ?></h4>
                        <div class="home-product-item__price">
                          <span class="home-product-item__type">
                            <?php
                              $mlhh = $row3['MaLoaiHang'];
                              $sql_type = "SELECT * FROM loaihanghoa where maloaihang = '$mlhh' ";
                              $query_type = mysqli_query($connect, $sql_type);
                              $row_type = mysqli_fetch_assoc($query_type);
                              echo $row_type['TenLoaiHang'];
                            ?>
                          </span>
                          <span class="home-product-item__price-current"><?php echo number_format($row3['Gia'], 0, ' ', '.');?> Đ</span>
                        </div>
                        <div class="home-product-item__origin"> 
                        </div>
                        <div class="home-product-item__favourite">
                          <i class="fas"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="12" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                            <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
                          </svg></i>
                          <span>Yêu thích</span>
                        </div>
                      </a>
                    </div>
            <?php }?>
        <!--end product -->
      </div>
      <hr>
      <h1 class="home-product-h1"><a  name="LH37"> Giày Nike</a> </h1>
          <div class="row sm-gutter">
            <!-- product item -->
            <?php
              $sql3 = "SELECT * FROM hanghoa inner join loaihanghoa on hanghoa.maloaihang = loaihanghoa.maloaihang where hanghoa.maloaihang = 'LH37'";
              $query3 = mysqli_query($connect, $sql3);
                while($row3 = mysqli_fetch_assoc($query3)){?>
                    <div class="col l-2-4 m-4 c-6">
                      <a class="home-product-item" href="product.php?&id=<?php echo $row3['MSHH'];?>">
                        <div class="home-product-item-img" style="background-image: url(<?php echo $row3['AnhSP'];?>)">
                        </div>
                        <h4 class="home-product-item-name"><?php echo $row3['TenHH']; ?></h4>
                        <div class="home-product-item__price">
                          <span class="home-product-item__type">
                            <?php
                              $mlhh = $row3['MaLoaiHang'];
                              $sql_type = "SELECT * FROM loaihanghoa where maloaihang = '$mlhh' ";
                              $query_type = mysqli_query($connect, $sql_type);
                              $row_type = mysqli_fetch_assoc($query_type);
                              echo $row_type['TenLoaiHang'];
                            ?>
                          </span>
                          <span class="home-product-item__price-current"><?php echo number_format($row3['Gia'], 0, ' ', '.');?> Đ</span>
                        </div>
                        <div class="home-product-item__origin"> 
                        </div>
                        <div class="home-product-item__favourite">
                          <i class="fas"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="12" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                            <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
                          </svg></i>
                          <span>Yêu thích</span>
                        </div>
                      </a>
                    </div>
            <?php }?>
        <!--end product -->
      </div>
      <hr>
      <h1 class="home-product-h1"><a  name="LH6"> Giày Converse </a></h1>
          <div class="row sm-gutter">
            <!-- product item -->
            <?php
              $sql3 = "SELECT * FROM hanghoa inner join loaihanghoa on hanghoa.maloaihang = loaihanghoa.maloaihang where hanghoa.maloaihang = 'LH6'";
              $query3 = mysqli_query($connect, $sql3);
                while($row3 = mysqli_fetch_assoc($query3)){?>
                    <div class="col l-2-4 m-4 c-6">
                      <a class="home-product-item" href="product.php?&id=<?php echo $row3['MSHH'];?>">
                        <div class="home-product-item-img" style="background-image: url(<?php echo $row3['AnhSP'];?>)">
                        </div>
                        <h4 class="home-product-item-name"><?php echo $row3['TenHH']; ?></h4>
                        <div class="home-product-item__price">
                          <span class="home-product-item__type">
                            <?php
                              $mlhh = $row3['MaLoaiHang'];
                              $sql_type = "SELECT * FROM loaihanghoa where maloaihang = '$mlhh' ";
                              $query_type = mysqli_query($connect, $sql_type);
                              $row_type = mysqli_fetch_assoc($query_type);
                              echo $row_type['TenLoaiHang'];
                            ?>
                          </span>
                          <span class="home-product-item__price-current"><?php echo number_format($row3['Gia'], 0, ' ', '.');?> Đ</span>
                        </div>
                        <div class="home-product-item__origin"> 
                        </div>
                        <div class="home-product-item__favourite">
                          <i class="fas"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="12" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                            <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
                          </svg></i>
                          <span>Yêu thích</span>
                        </div>
                      </a>
                    </div>
            <?php }?>
        <!--end product -->
      </div>
      <!--end article -->
    </div>
  </div>

  <div class="col l-2 m-0 c-0">
              <nav class="category">
                <h2 class="category__heading">
                  <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-list-stars" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5z"/>
                    <path d="M2.242 2.194a.27.27 0 0 1 .516 0l.162.53c.035.115.14.194.258.194h.551c.259 0 .37.333.164.493l-.468.363a.277.277 0 0 0-.094.3l.173.569c.078.256-.213.462-.423.3l-.417-.324a.267.267 0 0 0-.328 0l-.417.323c-.21.163-.5-.043-.423-.299l.173-.57a.277.277 0 0 0-.094-.299l-.468-.363c-.206-.16-.095-.493.164-.493h.55a.271.271 0 0 0 .259-.194l.162-.53zm0 4a.27.27 0 0 1 .516 0l.162.53c.035.115.14.194.258.194h.551c.259 0 .37.333.164.493l-.468.363a.277.277 0 0 0-.094.3l.173.569c.078.255-.213.462-.423.3l-.417-.324a.267.267 0 0 0-.328 0l-.417.323c-.21.163-.5-.043-.423-.299l.173-.57a.277.277 0 0 0-.094-.299l-.468-.363c-.206-.16-.095-.493.164-.493h.55a.271.271 0 0 0 .259-.194l.162-.53zm0 4a.27.27 0 0 1 .516 0l.162.53c.035.115.14.194.258.194h.551c.259 0 .37.333.164.493l-.468.363a.277.277 0 0 0-.094.3l.173.569c.078.255-.213.462-.423.3l-.417-.324a.267.267 0 0 0-.328 0l-.417.323c-.21.163-.5-.043-.423-.299l.173-.57a.277.277 0 0 0-.094-.299l-.468-.363c-.206-.16-.095-.493.164-.493h.55a.271.271 0 0 0 .259-.194l.162-.53z"/>
                  </svg>
                Danh mục</h2>
                <ul class="category-list">
                <?php
                    while($row = mysqli_fetch_assoc($query_up)){?>
                    <li class="category-item catgory-item">
                      <a href="#<?php echo $row['MaLoaiHang']; ?>" class="category-item__link"><?php echo $row['TenLoaiHang']; ?></a>
                    </li>
                  <?php }?>
                </ul>
              </nav>
      </div>
</div>
</div>
</div>
<!--end container -->


<!--  -->
<?php include 'footer.php'?>

