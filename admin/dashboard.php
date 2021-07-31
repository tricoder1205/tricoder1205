<?php 
    include 'header_admin.php';
    echo '<script language=javascript> loaddata(); </script>';
    // Format money
    function bd_nice_number($n) {
      $n = (0+str_replace(",","",$n));
      if(!is_numeric($n)) return false;
      if($n>1000000000000) return round(($n/1000000000000),1).' trillion';
      else if($n>1000000000) return round(($n/1000000000),1).' billion';
      else if($n>1000000) return round(($n/1000000),1).' tr';
      return number_format($n);
        }
      // 
      // Revenue
    $revenue = "SELECT SUM(a.GiaDatHang +30000) as revenue FROM chitietdathang  as a, dathang as b
                  where a.SoDonDH = b.SoDonDH and b.trangthai = 'DN' and year(b.NgayGH) = 2021;";
    $query1 = mysqli_query($connect, $revenue);
    $revenue_r = mysqli_fetch_assoc($query1);
      // Sales
    $sales = "SELECT COUNT(a.SoLuong) as sales from chitietdathang  as a, dathang as b
                where a.SoDonDH = b.SoDonDH and b.trangthai = 'DN' and year(b.NgayGH) = 2021;  ";
    $query2 = mysqli_query($connect, $sales);
    $sale_s = mysqli_fetch_assoc($query2);
        // Userb
    $user = "SELECT count(MSKH) as user FROM khachhang";
    $query3 = mysqli_query($connect, $user);
    $user_u = mysqli_fetch_assoc($query3);
        // Bill
    $bill = "SELECT COUNT(SoDonDH) as bill from dathang 
    where trangthai = 'DN' and year(NgayGH) = 2021;";
    $query4 = mysqli_query($connect, $bill);
    $bill_b = mysqli_fetch_assoc($query4);

?>
        <div class="dashboard-top">
          <i class="bi bi-speedometer2">  Dashboard</i>
        </div>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 statistical">
              <div class="col col-lg-3 col-md-6 statistical-body">
                  <div class="lop">
                    <div class="statistical-icon statistical-icon-revenue"><i class="bi bi-cash-stack"></i></div>
                    <div class="statistical-content"> Revenue 
                      <p style="color:green"><?php echo bd_nice_number($revenue_r['revenue']); ?></p>
                    </div>
                  </div>
              </div>
           
          <div class="col col col-lg-3 col-md-6 statistical-body">
              <div class="lop">
                  <div class="statistical-icon statistical-icon-sales"><i class="bi bi-basket"></i></div>
                  <div class="statistical-content"> Sales 
                    <p style="color:#5f0ce3"><?php echo $sale_s['sales'];?> <meter min="0" max="100" value="<?php echo $sale_s['sales'];?>"  ></meter>  </p>
                  </div>
                </div>
          </div>
          <div class="col col-lg-3 col-md-6 statistical-body">
              <div class="lop">
                  <div class="statistical-icon "><i class="bi bi-clipboard-data"></i></div>
                  <div class="statistical-content"> Bill 
                    <p><?php echo $bill_b['bill'];?></p>
                  </div>
                </div>
          </div>
          <div class="col col-lg-3 col-md-6 statistical-body">
              <div class="lop">
                  <div class="statistical-icon statistical-icon-user"><i class="bi bi-people"></i></div>
                  <div class="statistical-content"> Clients 
                    <p style="color:#e80808"><?php echo $user_u['user'];?></p>
                  </div>
                  
              </div>
          </div>
        </div>

        <div class="chart">
                <canvas id="myChart" width=400px height=100px></canvas>
        </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</html>