<?php 
    require_once 'conf/db.php';
    if(isset($_POST['txtFullName'])){
        $MSKH = 'KH'. rand(0,99999999);
        $sql = "INSERT INTO khachhang values('"
            . $MSKH . "','" 
            . $_POST['txtFullName'] . "','" 
            . $_POST['txtAddress'] . "','" 
            . $_POST['txtPhone'] . "','"
            . $_POST['txtEmail'] . "','" 
            . $_POST['txtUsername'] . "','" 
            . md5($_POST['txtPassword']) ."')" ; 
        
        if (mysqli_query($connect, $sql)) {
            $madc = 'DC'.rand(0,9999);
            $sql2 ="INSERT INTO diachikh (MaDC, DiaChi, MSKH) value ('$madc', '".$_POST['txtAddress']."' ,'$MSKH');";
            $query2 = mysqli_query($connect, $sql2);
            echo "<script type='text/javascript'>alert('Tạo tài khoản " . $_POST['txtUsername'] . " thành công !'); </script> ";
        } else {
            echo "<script type='text/javascript'>alert('Tạo tài khoản Error: '); </script>";
        }
        mysqli_close($connect);
  }
?>

<html>
	<head>
	<meta http-equiv="Content-Type" content="text/html;x charset=UTF-8"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script language=javascript src="js/emain.js"></script>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<!-- Nhúng file JavaScript -->
<div class="form_body">
    <div class="register">
        <!-- form -->
        <form action="registration.php" method="POST" role="form" id="registerForm">
                <h1>ĐĂNG KÝ TÀI KHOẢN</h1>
                <div class="form-group " id='username'>
                    <i class="bi bi-person-circle"> Tên Đăng Nhập</i>
                    <input type="text" class="form-control" name="txtUsername" placeholder="Username" id="username" onchange="validate(this.value,'username')">
                </div>
   <!--  -->
            <!-- Password -->
                 <div class="form-group " id='pass'>
                    <i class="bi bi-shield-lock"> Mật Khẩu <small style="margin:13px;color:red"><i class="bi bi-exclamation-triangle">  Password phải lớn hơn 6 ký tự</i></small></i>
                    
                    <input type="password" class="form-control" name="txtPassword" placeholder="Password " id="pass" onchange="validate(this.value,'pass', checkPass('pass',this.value))">
                </div>  
                <div class="form-group " id='repass'>
                    <i class="bi bi-shield-lock" > Nhập Lại Mật Khẩu</i>
                    <input type="password" class="form-control" name="txtRepassword" placeholder="Repassword" id="repass" onchange="validate(this.value,'repass',checkSamePass('pass',this.value))">
                </div>
<!--  -->
<!-- họ và tên -->
                <div class="form-group" id="fullname">
                    <i class="bi bi-person-circle"> Họ Và Tên</i>
                    <input type="text" class="form-control" name="txtFullName" id="fullname" placeholder="Full name" onchange="validate(this.value,'fullname')">
                </div>
<!--  -->
<!--  -->
                <div class="form-group" id='email'>
                    <i class="bi bi-envelope"> Email</i>
                    <input type="text" class="form-control" name="txtEmail" placeholder="Email" id="email" onchange="validate(this.value,'email',checkEmail(this.value))">
                </div>
<!-- số điện thoại -->
                <div class="form-group" id='phone'>
                    <i class="bi bi-telephone"> Số Điện Thoại</i>
                    <input type="text" class="form-control" name="txtPhone" id="phone" placeholder="Phone Number" onchange="validate(this.value,'phone',checkPhoneNumber(this.value))">
                </div>
<!--  -->
                <div class="form-group " id='address'>
                    <i class="bi bi-geo"> Địa Chỉ</i>   
                    <input type="text" class="form-control" placeholder="Address" name="txtAddress" id="address" onchange="validate(this.value,'address')">
                </div>

                <button type='submit' name="smt" class="submit" id='submited' onclick=" onSubmitFormReg();" >Đăng ký</button>
            </form>
            <!-- end-form -->
            <div class="login">
                <p style="opacity = 1">Bạn đã có tài khoản rồi? <a href="login.php">Đăng nhập</a>.</p>
                <p><a href="index.php">Quay lại Trang Chủ</a>.</p>
            </div>
    </div> 
</div>
</body>
</html>