<?php   
    require_once 'conf/db.php';
    include 'header_admin.php';
?>
      <?php
            if(isset($_GET['page_layout'])){    
                switch ($_GET['page_layout']) {
                    // San pham
                    case 'add':
                        // ADD
                        $sql_brand = "SELECT * FROM loaihanghoa";
                        $query_brand = mysqli_query($connect, $sql_brand);
                        if(isset($_POST['sbmt'])){
                          $MSHH = 'HH'.rand(0,99999999);
                          $TenHH = $_POST['TenHH'];
                          $anhsp = $_POST['anh'];
                          $Gia = $_POST['Gia'];
                          $SoLuongHang = $_POST['SoLuongHang'];
                          $Mota = $_POST['Mota'];
                          $MaLoaiHang = $_POST['MaLoaiHang'];
                          $GhiChu = $_POST['GhiChu'];
                          $sql_brand_2 = "INSERT INTO hanghoa(MSHH, TenHH, AnhSP , Gia, SoLuongHang, Mota, MaLoaiHang, GhiChu) 
                          value ('$MSHH', '$TenHH','$anhsp',$Gia,$SoLuongHang, '$Mota', '$MaLoaiHang', '$GhiChu')";
                          $query_add = mysqli_query($connect, $sql_brand_2);
                          
                          if($query_add){
                            echo '<script type="text/javascript" language="javascript">alert("Thêm Sản phẩm Thành Công")</script>';
                          } else{
                            echo '<script type="text/javascript" language="javascript">alert("Lỗi!!")</script>';
                          }
                        }
                        echo '<div class="container-fluid bg-dark">
                        <div class="card">
                            <div class="card-header">
                               <h2> Thêm Sản Phẩm</h2>
                            </div>
                            <div class="card-body">
                                <form action="" method ="POST" role="form" enctype="multipart/form-data">
                                    <div class="form-group">
                                      <label for="">Tên Sản Phẩm</label>
                                      <input type="text" name="TenHH" class="form-control" placeholder="" required>
                                    </div>
                                    <div class="form-group">
                                      <label for="">Ảnh Sản Phẩm</label>
                                      <input type="text" name="anh" class="form-control" placeholder="Link hình ảnh" required >
                                    </div>
                                    <div class="form-group">
                                      <label for="">Giá Sản Phẩm</label>
                                      <input type="number" name="Gia"  class="form-control"  placeholder="" required>
                                    </div>
                                    <div class="form-group">
                                      <label for="">Số Lượng Sản Phẩm</label>
                                      <input type="number" name="SoLuongHang"  class="form-control"  placeholder="" required>
                                    </div>
                                    <div class="form-group">
                                      <label for="">Mô Tả</label>
                                      <input type="text" name="Mota"  class="form-control"  placeholder="" required>
                                    </div>
                                    <div class="form-group">
                                      <label for="">Tên Loại Sản Phẩm</label>
                                        <select class="form-control" name=MaLoaiHang> ';
                                          while($row_brand = mysqli_fetch_assoc($query_brand)){
                                           echo '<option value="'. $row_brand['MaLoaiHang'] .'">'. $row_brand['TenLoaiHang'].'</option>';}
                                           echo '
                                        </select>
                                    </div>
                                    <div class="form-group">
                                      <label for="">Ghi Chú</label>
                                      <input type="text" name="GhiChu" placeholder="" class="form-control" required>
                                    </div>
                                    <button name="sbmt" class="btn btn-success bi bi-plus-circle" type="submit"> Thêm</button>
                                    <a name="" id="" class="btn btn-secondary bi bi-box-arrow-in-left" href="qlsanpham.php" role="button" > Quay Lại</a>
                                </form>
                            </div>
                        </div>
                        </div>';
                        break;
                        // 
                    case 'edit':
                        $id = $_GET['id']; 
                        $sql_brand = "SELECT * FROM loaihanghoa";
                        $query_brand = mysqli_query($connect, $sql_brand);
                        $sql_up = "SELECT * FROM hanghoa WHERE MSHH = '$id'";
                        $query_up = mysqli_query($connect, $sql_up);
                        $row_up = mysqli_fetch_assoc($query_up);
                        if(isset($_POST['sbmt'])){
                        $MSHH = $_POST['MSHH'];
                        $TenHH = $_POST['TenHH'];
                        $anhsp = $_POST['anh'];
                        $Gia = $_POST['Gia'];
                        $SoLuongHang = $_POST['SoLuongHang'];
                        $Mota = $_POST['Mota'];
                        $MaLoaiHang = $_POST['MaLoaiHang'];
                        $GhiChu = $_POST['GhiChu'];
                        $sql_brand_3 = "UPDATE hanghoa SET MSHH='$id', TenHH='$TenHH', AnhSP='$anhsp' , Gia=$Gia, SoLuongHang=$SoLuongHang, Mota='$Mota', MaLoaiHang='$MaLoaiHang', GhiChu='$GhiChu' where MSHH = '$id'";
                        $query = mysqli_query($connect, $sql_brand_3);
                        if($query){
                            echo '<script type="text/javascript" language="javascript">alert("Đã thay đổi thông tin Sản phẩm."); window.location= "admin.php?page_layout=edit&id='.$id.'";</script>';
                        } else{
                            echo '<script type="text/javascript" language="javascript">';
                            echo 'alert("Lỗi!!")';
                            echo '</script>';
                        }}
                        
                        echo'
                        <div class="container-fluid bg-dark">
                        <div class="card">
                            <div class="card-header">
                            <h2> Sửa Sản Phẩm</h2>
                            </div>
                            <div class="card-body">
                                <form action="" method ="POST" role="form" enctype="multipart/form-data">
                                    <div class="form-group">
                                    <label for="">Mã Hàng Hóa</label>
                                    <input type="text" name="MSHH" class="form-control" placeholder="" required value="'. $row_up['MSHH'].'">
                                    </div>
                                    <div class="form-group">
                                    <label for="">Tên Sản Phẩm</label>
                                    <input type="text" name="TenHH" class="form-control" placeholder="" required value="'. $row_up['TenHH'] . '">
                                    </div>
                                    <div class="form-group">
                                    <label for="">Ảnh Sản Phẩm</label>
                                    <input type="text" name="anh" class="form-control" placeholder="Link hình ảnh" required value="'. $row_up['AnhSP'] . '">
                                    </div>
                                    <div class="form-group">
                                    <label for="">Giá Sản Phẩm</label>
                                    <input type="number" name="Gia"  class="form-control"  placeholder="" required value="'. $row_up['Gia'] . '">
                                    </div>
                                    <div class="form-group">
                                    <label for="">Số Lượng Sản Phẩm</label>
                                    <input type="number" name="SoLuongHang"  class="form-control"  placeholder="" required value="'. $row_up['SoLuongHang'] . '">
                                    </div>
                                    <div class="form-group">
                                    <label for="">Mô Tả</label>
                                    <input type="text" name="Mota"  class="form-control"  placeholder="" required value="'. $row_up['Mota'] . '">
                                    </div>
                                    <div class="form-group">
                                    <label for="">Mã Loại Sản Phẩm</label>
                                    <input type="text" name="ma"  class="form-control" placeholder="" required value="'. $row_up['MaLoaiHang'] .'">
                                    </div> 
                                    <div class="form-group">
                                    <label for="">Danh Mục Sản Phẩm</label>
                                            <select class="form-control" name=MaLoaiHang>';
                                        while($row_brand = mysqli_fetch_assoc($query_brand)){
                                            echo '<option value="'. $row_brand['MaLoaiHang'] . '">' . $row_brand['TenLoaiHang'] .'</option>';
                                        }
                                        echo'
                                            </select>
                                </div>

                                <div class="form-group">
                                <label for="">Ghi Chú</label>
                                <input type="text" name="GhiChu" placeholder="" class="form-control" required value="'. $row_up['GhiChu'] . '">
                                </div>
                                <button name="sbmt" class="btn btn-warning bi bi-pencil-square" onclick="return Edit('. $row['TenHH'] . ')" type="submit">Sửa</button>
                                <a name="" id="" class="btn btn-primary bi bi-box-arrow-in-left" href="qlsanpham.php" role="button"> Quay lại</a>
                            </form>
                        </div>
                    </div>
                    </div>
                    <script>
                        function Edit(name){
                            return confirm("Bạn có chắc chắn sửa sản phẩm " + name + " ???")
                        }
                    </script>';
                    mysqli_close($connect);
                        break;
                    case 'del':
                        $id = $_GET['id'];
                        $sql = "DELETE FROM hanghoa where MSHH = '$id'";
                        $query = mysqli_query($connect, $sql);
                        if($query){
                            echo '<script type="text/javascript" language="javascript">alert("Xóa SP Thành Công."); window.location= "qlsanpham.php";</script>';
                         }else {
                           echo '<script type="text/javascript" language="javascript">alert("Lỗi.");window.location= "qlsanpham.php";</script>';
                         }
                        mysqli_close($connect);
                        break; 

// Loai san pham-======================================================

                    case 'addtype':
                        if(isset($_POST['sbmt'])){
                            $Maloai = 'LH'. rand(0,99);
                            $Tenloai = $_POST['TenLoaiHang'];
                            $sql_brand_2 = "INSERT INTO loaihanghoa(MaLoaihang, TenLoaiHang) value ('$Maloai', '$Tenloai')";
                            $query = mysqli_query($connect, $sql_brand_2);
                            if($query){
                              echo '<script type="text/javascript" language="javascript">alert("Thêm Thành Công.")</script>';
                            } 
                            else{
                              echo '<script type="text/javascript" language="javascript">alert("Lỗi!!")</script>';
                            }
                          }
                          echo '
                          <div class="body-right">
                            <div class="container-fluid bg-dark">
                                <div class="card">
                                    <div class="card-header">
                                        <h2> Thêm Loại Sản Phẩm</h2>
                                    </div>
                                    <div class="card-body">
                                        <form action="" method ="POST" role="form" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label for="">Tên Loại Hàng</label>
                                                <input type="text" name="TenLoaiHang" class="form-control" placeholder="" required>
                                            </div>
                                            <button name="sbmt" class="btn btn-success bi bi-plus-circle" type="submit"> Thêm</button>
                                            <a name="" id="" class="btn btn-secondary bi bi-box-arrow-in-left" href="qlloaisanpham.php" role="button"> Quay lại</a>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            </div>';
                        break;
                    case 'edittype':
                        // Edit
                                $id = $_GET['id']; 
                                $sql_up = "SELECT * FROM loaihanghoa WHERE MaLoaiHang = '$id'";
                                $query_up = mysqli_query($connect, $sql_up);
                                $row_up = mysqli_fetch_assoc($query_up);
                                if(isset($_POST['sbmt'])){
                                $Maloai = $_POST['Maloai'];
                                $Tenloai = $_POST['Tenloai'];
                                $sql_brand_3 = "UPDATE loaihanghoa SET TenLoaiHang = '$Tenloai' where MaLoaiHang = '$id'";
                                $query = mysqli_query($connect, $sql_brand_3);
                                
                                if($query){
                                    echo '<script type="text/javascript" language="javascript">alert("Đã thay đổi thông tin."); window.location= "admin.php?page_layout=edittype&id='.$id.'";</script>';
                                } else{
                                    echo '<script type="text/javascript" language="javascript">';
                                    echo 'alert("Lỗi!!")';
                                    echo '</script>';
                                }
                            }
                                echo '
                                <div class="body-right">
                                    <div class="container-fluid bg-dark">
                                    <div class="card">
                                        <div class="card-header">
                                        <h2> Sửa Sản Phẩm</h2>
                                        </div>
                                        <div class="card-body">
                                            <form action="" method ="POST" role="form" enctype="multipart/form-data">
                                                <div class="form-group">
                                                <label for="">Mã Hàng Hóa</label>
                                                <input type="text" name="Maloai" class="form-control" placeholder="" required value="'. $row_up['MaLoaiHang'] . '">
                                                </div>
                                                <div class="form-group">
                                                <label for="">Tên Loại Sản Phẩm</label>
                                                <input type="text" name="Tenloai" class="form-control" placeholder="" required value="'. $row_up['TenLoaiHang'] . '">
                                                </div>
                                                <button name="sbmt" class="btn btn-warning bi bi-pencil-square" onclick="return Edit('. $row_up['TenLoaiHang'] . ')" type="submit"> Sửa</button>
                                                <a name="" id="" class="btn btn-primary bi bi-box-arrow-in-left" href="qlloaisanpham.php" role="button"> Quay lại</a>
                                            </form>
                                        </div>
                                    </div>
                                    </div>
                                    <script>
                                        function Edit(name){
                                            return confirm("Bạn có chắc chắn sửa sản phẩm " + name + " ???")
                                        }
                                    </script>';
                        break;
                        // End
                    case 'deltype':
                        $id = $_GET['id'];
                        $sql = "DELETE FROM loaihanghoa where MaLoaiHang = '$id'";
                        $query = mysqli_query($connect, $sql);
                        if($query){
                            echo '<script type="text/javascript" language="javascript">alert("Xóa Loại SP Thành Công."); window.location= "qlloaisanpham.php";</script>';
                        }else {
                        echo '<script type="text/javascript" language="javascript">alert("Lỗi khóa ngoại."); window.location= "qlloaisanpham.php";</script>';
                        }
                        mysqli_close($connect);
                        break;
// End Loai san pham ====================
// Khach Hang ---------------------------------------------------
                    case 'adduser':
                        if(isset($_POST['sbmt'])){
                            $mskh = 'KH'.rand(0,999999);
                            $hotenkh = $_POST['hotenkh'];
                            $diachi = $_POST['diachi'];
                            $sdt = $_POST['sdt'];
                            $email = $_POST['email'];
                            $username = $_POST['username'];
                            $pass = md5($_POST['pass']);
                            $sql_up = "INSERT INTO khachhang (MSKH, HoTenKH, DiaChi, SoDienThoai, Email, username, passwd) 
                            value ('$mskh','$hotenkh','$diachi','$sdt','$email','$username','$pass');";
                            $query_up = mysqli_query($connect, $sql_up);
                            if($query_up){
                                echo '<script type="text/javascript" language="javascript">alert("Đã thêm nhân viên mới.")</script>';
                            } else{
                                echo '<script type="text/javascript" language="javascript">alert("Lỗi!!")</script>';
                                }
                            }
                                echo '<div class="body-right">
                                    <div class="container-fluid bg-dark">
                                    <div class="card">
                                        <div class="card-header">
                                        <h2> Thêm khách hàng mới</h2>
                                        </div>
                                        <div class="card-body">
                                            <form action="" method ="POST" role="form" enctype="multipart/form-data">
                                                <div class="form-group">
                                                <label for="">Họ và Tên khách hàng</label>
                                                <input type="text" name="hotenkh" class="form-control" placeholder="" required>
                                                </div>
                                                <div class="form-group">
                                                <label for="">Địa chỉ</label>
                                                <input type="text" name="diachi" class="form-control" placeholder="" required>
                                                </div>
                                                <div class="form-group">
                                                <label for="">Số Điện Thoại</label>
                                                <input type="text" name="sdt" class="form-control" placeholder="" required>
                                                </div>
                                                <div class="form-group">
                                                <label for="">Email</label>
                                                <input type="text" name="email" class="form-control" placeholder="" required>
                                                </div>
                                                <div class="form-group">
                                                <label for="">username</label>
                                                <input type="text" name="username" class="form-control" placeholder="" required>
                                                </div>
                                                <div class="form-group">
                                                <label for="">Mật Khẩu</label>
                                                <input type="password" name="pass" class="form-control" placeholder="" required>
                                                </div>
                                                <button name="sbmt" class="btn btn-success bi bi-plus-circle" type="submit"> Thêm</button>
                                                <a name="" id="" class="btn btn-secondary bi bi-box-arrow-in-left" href="qlkhachhang.php" role="button"> Quay lại</a>
                                            </form>
                                        </div>
                                    </div></div>';
                        mysqli_close($connect);
                        break;
                    case 'edituser':
                        $id = $_GET['id'];
                        $sql = "SELECT * FROM khachhang where MSKH = '$id'";
                        $query = mysqli_query($connect, $sql);
                        $row = mysqli_fetch_assoc($query);
                        if(isset($_POST['sbmt'])){
                            $hotenkh = $_POST['hotenkh'];
                            $diachi = $_POST['diachi'];
                            $sdt = $_POST['sdt'];
                            $email = $_POST['email'];
                            $username = $row['username'];
                            $pass = $row['passwd'];
                            $sql_up = "UPDATE khachhang SET MSKH ='$id', HoTenKH ='$hotenkh', DiaChi ='$diachi', SoDienThoai ='$sdt', Email ='$email', username ='$username', passwd ='$pass' where MSKH = '$id';";
                            $query_up = mysqli_query($connect, $sql_up);
                            if($query_up){ 
                                echo '<script type="text/javascript" language="javascript">alert("Đã sửa đổi thông tin."); window.location= "admin.php?page_layout=edituser&id='.$id.'";</script>';
                            } else{
                                echo '<script type="text/javascript" language="javascript">alert("Lỗi!!")</script>';
                                }
                            }
                                echo '<div class="body-right">
                                    <div class="container-fluid bg-dark">
                                    <div class="card">
                                        <div class="card-header">
                                        <h2> Thông tin khách hàng</h2>
                                        </div>
                                        <div class="card-body">
                                            <form action="" method ="POST" role="form" enctype="multipart/form-data">
                                                <div class="form-group">
                                                <label for="">Họ và Tên khách hàng</label>
                                                <input type="text" name="hotenkh" class="form-control" placeholder="" required value ="'. $row['HoTenKH'] . '">
                                                </div>
                                                <div class="form-group">
                                                <label for="">Địa chỉ</label>
                                                <input type="text" name="diachi" class="form-control" placeholder="" required value ="'. $row['DiaChi'] . '">
                                                </div>
                                                <div class="form-group">
                                                <label for="">Số Điện Thoại</label>
                                                <input type="text" name="sdt" class="form-control" placeholder="" required value ="'. $row['SoDienThoai'] . '">
                                                </div>
                                                <div class="form-group">
                                                <label for="">Email</label>
                                                <input type="text" name="email" class="form-control" placeholder="" required value ="'. $row['Email'] . '">
                                                </div>
                                                <button name="sbmt" class="btn btn-warning bi bi-pencil-square" type="submit"> Sửa</button>
                                                <a name="" id="" class="btn btn-secondary bi bi-box-arrow-in-left" href="qlkhachhang.php" role="button"> Quay lại</a>
                                            </form>
                                        </div>
                                    </div></div>';
                        break;
                        mysqli_close($connect);
                    case 'deluser':
                        $id = $_GET['id'];
                        $sql2 = "DELETE FROM giohang where MSKH = '$id'";
                        $query2 = mysqli_query($connect, $sql2);
                        $sql = "DELETE FROM khachhang where MSKH = '$id'";
                        $query = mysqli_query($connect, $sql);
                        if( $query2 && $query){
                           echo '<script type="text/javascript" language="javascript"> 
                                    window.location = "qlkhachhang.php";
                                </script>';
                        }else {
                            echo '<script type="text/javascript" language="javascript"> 
                                    window.location = "qlkhachhang.php";
                                </script>';
                        }
                        mysqli_close($connect);
                        break;  
// Nhan viên
                    case 'addimploy':
                        if(isset($_POST['sbmt'])){
                            $msnv = $_POST['msnv'];
                            $hotennv = $_POST['hotennv'];
                            $chucvu = $_POST['chucvu'];
                            $diachi = $_POST['diachi'];
                            $sdt = $_POST['sdt'];
                            $username = $_POST['username'];
                            $pass = md5($_POST['pass']);

                            $sql_up = "INSERT INTO nhanvien (MSNV, HoTenNV, ChucVu, DiaChi, SoDienThoai, username, passwd) 
                            value ('$msnv','$hotennv','$chucvu','$diachi','$sdt','$username','$pass');";
                            $query_up = mysqli_query($connect, $sql_up);
                            if($query_up){
                                echo '<script type="text/javascript" language="javascript">alert("Đã thêm nhân viên mới.")</script>';
                            } else{
                                echo '<script type="text/javascript" language="javascript">alert("Lỗi!!")</script>';
                                }
                            }
                                echo '
                                <div class="body-right">
                                    <div class="container-fluid bg-dark">
                                    <div class="card">
                                        <div class="card-header">
                                        <h2> Thêm nhân viên mới</h2>
                                        </div>
                                        <div class="card-body">
                                            <form action="" method ="POST" role="form" enctype="multipart/form-data">
                                                <div class="form-group">
                                                <label for="">Mã số Nhân Viên</label>
                                                <input type="text" name="msnv" class="form-control" placeholder="" required>
                                                </div>
                                                <div class="form-group">
                                                <label for="">Tên Nhân Viên</label>
                                                <input type="text" name="hotennv" class="form-control" placeholder="" required>
                                                </div>
                                                <div class="form-group">
                                                <label for="">Chức vụ</label>
                                                <input type="text" name="chucvu" class="form-control" placeholder="" required>
                                                </div>
                                                <div class="form-group">
                                                <label for="">Địa chỉ</label>
                                                <input type="text" name="diachi" class="form-control" placeholder="" required>
                                                </div>
                                                <div class="form-group">
                                                <label for="">Số Điện Thoại</label>
                                                <input type="text" name="sdt" class="form-control" placeholder="" required>
                                                </div>
                                                <div class="form-group">
                                                <label for="">username</label>
                                                <input type="text" name="username" class="form-control" placeholder="" required>
                                                </div>
                                                <div class="form-group">
                                                <label for="">Mật Khẩu</label>
                                                <input type="password" name="pass" class="form-control" placeholder="" required>
                                                </div>
                                                <button name="sbmt" class="btn btn-success bi bi-plus-circle" type="submit"> Thêm</button>
                                                <a name="" id="" class="btn btn-secondary bi bi-box-arrow-in-left" href="qlnhanvien.php" role="button"> Quay lại</a>
                                            </form>
                                        </div>
                                    </div>
                                    </div>';
                        break;mysqli_close($connect);
                        case 'editimploy':
                            $id = $_GET['id'];
                            $sql = "SELECT * FROM nhanvien where MSNV = '$id'";
                            $query = mysqli_query($connect, $sql);
                            $row = mysqli_fetch_assoc($query);
                            if(isset($_POST['sbmt'])){
                                $hotennv = $_POST['hotennv'];
                                $diachi = $_POST['diachi'];
                                $sdt = $_POST['sdt'];
                                $chucvu = $_POST['chucvu'];
                                $username = $row['username'];
                                $pass = $row['passwd'];
                                $sql_up = "UPDATE nhanvien SET MSNV ='$id', HoTenNV ='$hotennv', ChucVu = '$chucvu', DiaChi ='$diachi', SoDienThoai ='$sdt', username ='$username', passwd ='$pass' where MSNV = '$id';";
                                $query_up = mysqli_query($connect, $sql_up);
                                if($query_up){ 
                                    echo '<script type="text/javascript" language="javascript">window.location= "admin.php?page_layout=editimploy&id='.$id.'";</script>';
                                } else{
                                    echo '<script type="text/javascript" language="javascript">alert("Lỗi!!")</script>';
                                    }
                                }

                                    echo '<div class="body-right">
                                        <div class="container-fluid bg-dark">
                                        <div class="card">
                                            <div class="card-header">
                                            <h2> Thông tin khách hàng</h2>
                                            </div>
                                            <div class="card-body">
                                                <form action="" method ="POST" role="form" enctype="multipart/form-data">
                                                    <div class="form-group">
                                                    <label for="">Họ và Tên khách hàng</label>
                                                    <input type="text" name="hotennv" class="form-control" placeholder="" required value ="'. $row['HoTenNV'].'">
                                                    </div>
                                                    <div class="form-group">
                                                    <label for="">Chức Vụ</label>
                                                    <input type="text" name="chucvu" class="form-control" placeholder="" required value ="'. $row['ChucVu']. '">
                                                    </div>
                                                    <div class="form-group">
                                                    <label for="">Địa chỉ</label>
                                                    <input type="text" name="diachi" class="form-control" placeholder="" required value ="'. $row['DiaChi'] . '">
                                                    </div>
                                                    <div class="form-group">
                                                    <label for="">Số Điện Thoại</label>
                                                    <input type="text" name="sdt" class="form-control" placeholder="" required value ="'. $row['SoDienThoai'] . '">
                                                    </div>
                                                   
                                                    <button name="sbmt" class="btn btn-warning bi bi-pencil-square" type="submit"> Sửa</button>
                                                    <a name="" id="" class="btn btn-secondary bi bi-box-arrow-in-left" href="qlnhanvien.php" role="button"> Quay lại</a>
                                                </form>
                                            </div>
                                        </div> </div>';
                            break;
                        case 'delimploy':
                            $id = $_GET['id'];
                            $sql="DELETE FROM nhanvien where MSNV = '$id'";
                            $query = mysqli_query($connect, $sql);
                            if($query){
                                echo '<script type="text/javascript" language="javascript">alert("Xóa nhân viên Thành Công."); window.location= "qlnhanvien.php";</script>';
                             }
                             else{
                                echo '<script type="text/javascript" language="javascript">alert("Lỗi.")</script>';
                             }
                             mysqli_close($connect);
                            break;mysqli_close($connect);

                        case 'editdondh': 
                            $id = $_GET['id'];
                            $sql_detail = "SELECT * FROM chitietdathang where SoDonDH = '$id'";
                            $query_detail = mysqli_query($connect,$sql_detail);
                            $sql_u = "SELECT * FROM dathang where SoDonDH = '$id'";
                            $query_u =mysqli_query($connect, $sql_u);
                            $row_u = mysqli_fetch_assoc($query_u);
                                $mskh = $row_u['MSKH'];
                            $sql_kh = "SELECT * FROM khachhang where MSKH = '$mskh'";
                            $query_kh =mysqli_query($connect, $sql_kh);
                            $row_kh = mysqli_fetch_assoc($query_kh);
                            if(isset($_POST['edit'])){
                                $tennv = $_POST['tennv'];
                                $sql_nv = "SELECT * FROM nhanvien where HoTenNV = '$tennv'";
                                $query_nv =mysqli_query($connect, $sql_nv);
                                $row_nv= mysqli_fetch_assoc($query_nv);
                                $ngaydh = $_POST['ngaydh'];
                                $ngaygh = $_POST['ngaygh'];
                                $trangthai = $row_u['trangthai'];
                                $msnv = $row_nv['MSNV'];
                                $sql = "UPDATE dathang SET MSNV ='$msnv', NgayDH ='$ngaydh', NgayGH = '$ngaygh' where SoDonDH = '$id'";
                                $query = mysqli_query($connect, $sql);
                                if($query){ 
                                    echo '<script type="text/javascript" language="javascript">alert("Đã sửa đổi thông tin.");window.location ="admin.php?page_layout=editdondh&id='.$id.'"</script>';
                                } else{
                                    echo '<script type="text/javascript" language="javascript">alert("Lỗi!!")</script>';
                                    }
                            }
                            echo '<div class="body-right">
                            <div class="container-fluid bg-light">
                                        <div class="card">
                                            <div class="card-header">
                                            <h2> Chi tiết tiết đơn đặt hàng: '. $id. '</h2>
                                        </div>
                                        <div class="card-body">
                                        <form action="" method ="POST" role="form" enctype="multipart/form-data">
                                        <div class = "info_detail">
                                        <div class="left">
                                            <div class="form-group">
                                            <i class="bi bi-caret-right"> Tên khách hàng:  '. $row_kh['HoTenKH'] .'</i>
                                            </div>
                                                <p>
                                                    <i class="bi bi-caret-right"> Tên nhân viên:
                                                        <select class="form-control" name=tennv>
                                                        '; 
                                                        $sqlnv = "SELECT * FROM nhanvien";
                                                        $querynv =mysqli_query($connect, $sqlnv);

                                                        while ( $rownv = mysqli_fetch_assoc($querynv)){
                                                            echo'<option value="'. $rownv['HoTenNV'] .'">'. $rownv['HoTenNV'] .'</option>';}
                                                    echo' </select>
                                                    </i> 
                                                </p>
                                            </div>
                                            <div class="right">
                                                <p><i class="bi bi-caret-right"> Ngày đặt hàng: <input type="date" name="ngaydh" class="form-control" required value="'. $row_u['NgayDH'] .'"> </i></p>
                                                <p><i class="bi bi-caret-right"> Ngày giao hàng: <input type="date" name="ngaygh" class="form-control" required value="'. $row_u['NgayGH'] .'"></i></p>
                                            </div>
                                            </div>
                                        <div class="detail_update">
                                            <p><i class="bi bi-arrow-right-circle"> Trạng trạng thái ĐH:</i>'; 
                                                $trangt = 'DN';
                                                    if($row_u['trangthai'] == $trangt){
                                                        echo ' <span class="btn btn-success"> Đã nhận</span>';
                                                    }else {
                                                        echo ' <span class="btn btn-warning"> Đang xử lý</span>';
                                                    } 
                                    echo '</p>
                                        </div>
                                        <hr>
                                        <table class="table">
                                         <thead class="thead-light">
                                            <tr>
                                                <th>#</th>
                                                <th>MSHH</th>
                                                <th>Tên Hàng Hóa</th>
                                                <th>Số lượng</th>
                                                <th>Giá Đặt Hàng</th>
                                                <th>Giảm giá</th>
                                            </tr>
                                            </thead>
                                        <tbody>';
                                        $i=1;
                                        while($row = mysqli_fetch_assoc($query_detail)){
                                            $mshh = $row['MSHH'];
                                            $sql5 = "SELECT * FROM hanghoa where MSHH = '$mshh'";
                                            $query5 = mysqli_query($connect, $sql5);
                                            $row5 = mysqli_fetch_assoc($query5);
                                            $msdh = $row['SoDonDH'];
                                            $sql_detal = "SELECT sum(giadathang) as tt FROM chitietdathang where SoDonDH = '$msdh'";
                                            $query_detal = mysqli_query($connect, $sql_detal);
                                            $row_detal = mysqli_fetch_assoc($query_detal);
                                            echo ' 
                                            <tr>
                                                <td>'.$i++ .'</td>
                                                <td>'. $row['MSHH'].'</td>
                                                <td>'. $row5['TenHH'] .'</td>
                                                <td>'. $row['SoLuong'] .'</td>
                                                <td>'. $row['GiaDatHang']*$row['SoLuong'] .'</td>
                                                <td>'. $row['GiamGia'] .'</td>
                                            </tr>
                                            ';}
                                            echo '</tbody>
                                        </table>
                                        </div>
                                        <hr>
                                        <h3> Tổng Tiền: <span style="color:red";> '; 
                                        echo number_format($row_detal['tt']+30000, 0, ' ', '.') .' </span></h3>`
                                
                                </div>
                                <button name="edit" class="btn btn-warning bi bi-pencil-square" type="submit"> Sửa</button>
                                <a class="btn btn-secondary bi bi-box-arrow-in-left" href="qldondathang.php" role="button"> Quay lại</a>
                                </form>
                            </div> 
                                </div>';
                                        
                            break;
                        case 'deldondh':
                            $id = $_GET['id'];
                            $sql = "DELETE FROM chitietdathang where SoDonDH = '$id'";
                            $query = mysqli_query($connect, $sql);
                            if($query){
                            $sql2 = "DELETE FROM dathang where SoDonDH = '$id'";
                            $query2 = mysqli_query($connect, $sql2);
                                if($query2){
                                    echo '<script language=javascript>window.location ="qldondathang.php"</script>';
                                }
                            }mysqli_close($connect);
                            break;mysqli_close($connect);
                        case 'detaildondh':
                            $id = $_GET['id'];
                            $sql_detail = "SELECT * FROM chitietdathang where SoDonDH = '$id'";
                            $query_detail = mysqli_query($connect,$sql_detail);
                            $sql_u = "SELECT * FROM dathang where SoDonDH = '$id'";
                            $query_u =mysqli_query($connect, $sql_u);
                            $row_u = mysqli_fetch_assoc($query_u);
                                $mskh = $row_u['MSKH'];
                            $sql_kh = "SELECT * FROM khachhang where MSKH = '$mskh'";
                            $query_kh =mysqli_query($connect, $sql_kh);
                            $row_kh = mysqli_fetch_assoc($query_kh);
                                $msnv = $row_u['MSNV'];
                            $sql_nv = "SELECT * FROM nhanvien where MSNV = '$msnv'";
                            $query_nv =mysqli_query($connect, $sql_nv);
                            $row_nv= mysqli_fetch_assoc($query_nv);
                            $ngaydh =  $row_u['NgayDH'];
                            $ngaygh = $row_u['NgayGH'];
                            if(isset($_POST['dn'])){
                                $tt = 'DN';
                                $sql_up="UPDATE dathang SET trangthai='$tt' where SoDonDH = '$id'";
                                $query_up = mysqli_query($connect, $sql_up);
                                if($query_up){
                                    echo '<script type="text/javascript" language="javascript">window.location ="admin.php?page_layout=detaildondh&id='.$id.'"</script>';
                                }
                            }else if(isset($_POST['dxl'])){
                                $tt = 'DXL';
                                $sql_up="UPDATE dathang SET trangthai='$tt' where SoDonDH = '$id'";
                                $query_up = mysqli_query($connect, $sql_up);
                                if($query_up){
                                    echo '<script type="text/javascript" language="javascript">window.location ="admin.php?page_layout=detaildondh&id='.$id.'"</script>';
                                }
                            } 
                            echo '
                            <div class="body-right">
                            <div class="container-fluid bg-light">
                                        <div class="card">
                                            <div class="card-header">
                                            <h2> Chi tiết tiết đơn đặt hàng: '. $id .'</h2>
                                        </div>
                                        <div class="card-body">
                                        <form action="" method ="POST" role="form" enctype="multipart/form-data">
                                        <div class = "info_detail">
                                        <div class="left">
                                            <p><i class="bi bi-caret-right"> Tên khách hàng: '. $row_kh['HoTenKH'] .'</i></p>
                                            <p><i class="bi bi-caret-right"> Tên nhân viên: '. $row_nv['HoTenNV'] .'</i> </p>
                                        </div>
                                            <div class="right">
                                                <p><i class="bi bi-caret-right"> Ngày đặt hàng: '. $row_u['NgayDH'] .' </i></p>
                                                <p><i class="bi bi-caret-right"> Ngày giao hàng: '. $row_u['NgayGH'] .' </i></p>
                                            </div>
                                        </div>
                                        <div class="detail_update">
                                         <div class="left">
                                            <p><i class="bi bi-arrow-right-circle"> Trạng trạng thái ĐH hiện tại: </i>'; 
                                                if($row_u['trangthai'] == 'DN'){
                                                    echo ' <button class="btn btn-success"> Đã nhận</button>';
                                                }else if($row_u['trangthai'] == 'DXL') {
                                                    echo ' <button class="btn btn-warning"> Đang xử lý</button>';
                                                }else if($row_u['trangthai'] == 'HUY'){
                                                    echo '<button class="btn btn-danger status_cancel"> Đã hủy</button>';
                                                }
                                    echo '</p>
                                            </div>
                                            ';
                                    if($row_u['trangthai'] == 'HUY');
                                    else {echo'
                                        <div class="right">
                                            <p><i class="bi bi-arrow-repeat"> Cập nhật trạng thái ĐH hiện tại: </i></p>
                                                <button type="submit" name="dn" id="dn" class="btn btn-success">Đã giao</button>
                                                <button type="submit" name="dxl" id="dxl" class="btn btn-warning">Đang xử lý</button>
                                            </div>';}
                                           echo '</div>
                                        </form>
                                        <hr>
                                        <table class="table">
                                         <thead class="thead-light">
                                            <tr>
                                                <th>#</th>
                                                <th>MSHH</th>
                                                <th>Tên Hàng Hóa</th>
                                                <th>Số lượng</th>
                                                <th>Giá Đặt Hàng</th>
                                                <th>Giảm giá</th>
                                            </tr>
                                            </thead>
                                        <tbody>';
                                        $i=1;
                                        while($row = mysqli_fetch_assoc($query_detail)){
                                            $mshh = $row['MSHH'];
                                            $sql5 = "SELECT * FROM hanghoa where MSHH = '$mshh'";
                                            $query5 = mysqli_query($connect, $sql5);
                                            $row5 = mysqli_fetch_assoc($query5);
                                            $msdh = $row['SoDonDH'];
                                            $sql_detal = "SELECT sum(giadathang) as tt FROM chitietdathang where SoDonDH = '$msdh'";
                                            $query_detal = mysqli_query($connect, $sql_detal);
                                            $row_detal = mysqli_fetch_assoc($query_detal);
                                            echo ' 
                                            <tr>
                                                <td>'. $i++ .'</td>
                                                <td>'. $row['MSHH'].'</td>
                                                <td>'. $row5['TenHH'] .'</td>
                                                <td>'. $row['SoLuong'] .'</td>
                                                <td>'. $row['GiaDatHang'].'</td>
                                                <td>'. $row['GiamGia'] .'</td>
                                            </tr>
                                            '; } echo '</tbody>
                                        </table>
                                        </div>
                                        <hr>
                                        <h3> Tổng Tiền: <span style="color:red";> '. number_format($row_detal['tt']+30000, 0, ' ', '.') .' </span></h3>
                                </div>
                                <a class="btn btn-secondary bi bi-box-arrow-in-left" href="qldondathang.php" role="button"> Quay lại</a>

                            </div></div>
                            ';mysqli_close($connect);
                            break;
                            case 'accept':
                                $id = $_GET['id'];
                                $tt = 'DN';
                                $sql ="UPDATE dathang SET trangthai = '$tt' where SoDonDH = '$id'";
                                $query = mysqli_query($connect, $sql);
                                if($query){
                                    echo '<script> window.location ="qldondathang.php"</script>';
                                }
                                break;
                    default:
                            break;
            } 
        }else {
            header ('location:login_admin.php');
        }
        ?>
    </div>
</body>
</html>