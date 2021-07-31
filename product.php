<?php 
  include 'header.php';
  $id = $_GET['id']; 
  $sql_up = "SELECT * FROM hanghoa WHERE MSHH = '$id'";
  $query_up = mysqli_query($connect, $sql_up);
  $row = mysqli_fetch_assoc($query_up);
  $sql_type = "SELECT * FROM hanghoa inner join loaihanghoa on hanghoa.maloaihang = loaihanghoa.maloaihang";
  $query_type = mysqli_query($connect, $sql_type);
  $row_type = mysqli_fetch_assoc($query_type);

  if(isset($_POST['smt'])){
    $msgh = 'GH'. rand(0,9999);
    $mskh = $_SESSION['ID'];
    $mshh = $row['MSHH'];
    $tenhh = $row['TenHH'];
    $anh = $row['AnhSP'];
    $gia = $row['Gia'];
    $size = $_POST['size'];
    $sl = $_POST['sl'];
    $thanhtien = $row['Gia']*$_POST['sl'];
    $sql_add = "INSERT INTO giohang(msgh, MSKH, MSHH, TenHH, anhsp, gia, size, sl,thanhtien) value ('$msgh','$mskh','$mshh','$tenhh','$anh','$gia','$size','$sl',$thanhtien)";
    $query_add = mysqli_query($connect, $sql_add);
    if($query_add){
      echo '<script type="text/javascript">
        alert("Đã thêm sản phẩm vào giỏ hàng.");
        window.location= "product.php?&id='.$id.'";
      </script>';
    }
    else{
      echo '<script language="javascript">alert("Bạn Chưa Đăng Nhập! Vui lòng đăng nhập để tiếp tục nhé!")</script>';
    }
    }
    mysqli_close($connect);
?>

    <section class="product">
      <div class="container">
          <div class="row bg-white pt-4 pb-4 border-bt pc">
          <article class="product__main col-lg-9 col-md-12 col-sm-12">
            <form action="" method ="POST" role="form" enctype="multipart/form-data">
              <div class="row">
                    <div class="product__main-img col-lg-4 col-md-4 col-sm-12">
                        <div class="product__main-img-primary">
                            <img src="<?php echo $row['AnhSP']; ?>">
                        </div>
                    </div>
                    <div class="product__main-info col-lg-8 col-md-8 col-sm-12">   
                      <div class="product__main-info-breadcrumb">
                        <?php echo $row_type['TenLoaiHang']; ?>
                    </div>             
                        <a class="product__main-info-title">
                            <h2 class="product__main-info-heading">
                              <?php echo $row['TenHH']; ?>
                            </h2>
                        </a>
                        <div class="product__main-info-price">
                            <span class="product__main-info-price-current">
                                <?php $num =$row['Gia'];
                                      $english_format_number = number_format($num, 0, ' ', '.');
                                      echo $english_format_number; ?> Đ
                            </span>
                        </div>
                        <div class="product__main-info-cart">
                              <div class="product__main-info-cart-quantity">
                              <div>
                                <label for="size">Chọn Size</label>
                                  <select name="size" id="size" class="form-control select-size">
                                    <option value="35">35</option>
                                      <option value="36">36</option>
                                      <option value="37">37</option>
                                      <option value="38">38</option>
                                      <option value="39">39</option>
                                      <option value="40">40</option>
                                      <option value="41">41</option>
                                      <option value="42">42</option>
                                      <option value="43">43</option>
                                      <option value="44">44</option>
                                  </select>
                                </div>
                                <div class="form-group"> 
                                  <label for="sl">Số Lượng: </label> 
                                  <input type="number" name="sl" value="1" class="form-control">
                                </div>
                              </div>
                            <div class="product__main-info-cart-btn-wrap">
                                <button name="smt" id="smt" type="submit" class="product__main-info-cart-btn">
                                    Thêm vào giỏ hàng
                                </button>
                            </div>
                      </div>
                    </form>
                    <div>
                      <div><i><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bookmark-check" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M10.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                        <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5V2zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1H4z"/>
                      </svg></i> KẾT HÀNG CHÍNH HÃNG 100%</div>
                      <div><i><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-archive" viewBox="0 0 16 16">
                        <path d="M0 2a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1v7.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 12.5V5a1 1 0 0 1-1-1V2zm2 3v7.5A1.5 1.5 0 0 0 3.5 14h9a1.5 1.5 0 0 0 1.5-1.5V5H2zm13-3H1v2h14V2zM5 7.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"/>
                      </svg></i> ĐẦY ĐỦ PHỤ KIỆN : TAG VÀ BOX</div>
                      <div><i><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-suit-heart" viewBox="0 0 16 16">
                        <path d="m8 6.236-.894-1.789c-.222-.443-.607-1.08-1.152-1.595C5.418 2.345 4.776 2 4 2 2.324 2 1 3.326 1 4.92c0 1.211.554 2.066 1.868 3.37.337.334.721.695 1.146 1.093C5.122 10.423 6.5 11.717 8 13.447c1.5-1.73 2.878-3.024 3.986-4.064.425-.398.81-.76 1.146-1.093C14.446 6.986 15 6.131 15 4.92 15 3.326 13.676 2 12 2c-.777 0-1.418.345-1.954.852-.545.515-.93 1.152-1.152 1.595L8 6.236zm.392 8.292a.513.513 0 0 1-.784 0c-1.601-1.902-3.05-3.262-4.243-4.381C1.3 8.208 0 6.989 0 4.92 0 2.755 1.79 1 4 1c1.6 0 2.719 1.05 3.404 2.008.26.365.458.716.596.992a7.55 7.55 0 0 1 .596-.992C9.281 2.049 10.4 1 12 1c2.21 0 4 1.755 4 3.92 0 2.069-1.3 3.288-3.365 5.227-1.193 1.12-2.642 2.48-4.243 4.38z"/>
                      </svg></i> ĐƯỢC KIỂM TRA HÀNG TRƯỚC KHI THANH TOÁN</div>
                      <div><i><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-repeat" viewBox="0 0 16 16">
                        <path d="M11.534 7h3.932a.25.25 0 0 1 .192.41l-1.966 2.36a.25.25 0 0 1-.384 0l-1.966-2.36a.25.25 0 0 1 .192-.41zm-11 2h3.932a.25.25 0 0 0 .192-.41L2.692 6.23a.25.25 0 0 0-.384 0L.342 8.59A.25.25 0 0 0 .534 9z"/>
                        <path fill-rule="evenodd" d="M8 3c-1.552 0-2.94.707-3.857 1.818a.5.5 0 1 1-.771-.636A6.002 6.002 0 0 1 13.917 7H12.9A5.002 5.002 0 0 0 8 3zM3.1 9a5.002 5.002 0 0 0 8.757 2.182.5.5 0 1 1 .771.636A6.002 6.002 0 0 1 2.083 9H3.1z"/>
                      </svg></i> ĐỔI HÀNG TRONG VÒNG 7 NGÀY</div>
                      <div><i><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-truck" viewBox="0 0 16 16">
                        <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5v-7zm1.294 7.456A1.999 1.999 0 0 1 4.732 11h5.536a2.01 2.01 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456zM12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12v4zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                      </svg></i> MIỄN PHÍ SHIP VỚI CÁC ĐƠN HÀNG TỪ 300 NGHÌN ĐỒNG ( TRONG NỘI THÀNH HÀ NỘI VÀ THÀNH PHỐ HCM)</div>
                    </div>
                </div>
            </div>
        </article>
        <aside class="product__aside col-lg-3 col-md-0 col-sm-0">
              <div class="product__aside-top">
                  <div class="product__aside-top-item">
                      <img src="imgs/shipper.png">
                      <div class="product__aside-top-item-text">
                          <p>
                              Giao hàng nhanh chóng
                          </p>
                          <span>
                              Chỉ trong vòng 24h
                          </span>
                      </div>
                  </div>
                  <div class="product__aside-top-item">
                      <img src="imgs/brand.png">
                      <div class="product__aside-top-item-text">
                          <p>
                              Sản phẩm chính hãng
                          </p>
                          <span>
                              Sản phẩm nhập khẩu 100%
                          </span>
                      </div>
                  </div>
                  <div class="product__aside-top-item">
                      <img src="imgs/less.png">
                      <div class="product__aside-top-item-text">
                          <p>
                              Mua hàng tiết kiệm
                          </p>
                          <span>
                              Rẻ hơn từ 10% đến 30%
                          </span>
                      </div>
                  </div>
              </div>
          </aside>
        </div>
        
          <div class="row bg-white">
            <div class="col-12 product__main-tab">
                <P class="product__main-tab-link">
                    THÔNG TIN SẢN PHẨM
                </P>
            </div>
            <div class="col-12 product__main-content-wrap">
                <h1 class="product__main-content-heading">
                  <?php echo $row['TenHH']; ?>
                </h1>
                 <p> <?php echo $row['Mota']; ?>
                  </p>
              </div>
              <div class="col-12 product__main-content-wrap">
                <div>
                  <div class="imgs__product">
                      <img height="550px" width="550px" src="<?php echo $row['AnhSP']; ?>" alt="">
                  </div>
              </div>
              </div>
           </div>
        </div>
      </div>
    </section>
<!--  -->
<?php include 'footer.php'?>

