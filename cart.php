<?php 
include 'giohang.php';
  if(isset($_GET['page_layout'])){
    switch ($_GET['page_layout']) {
        case 'delcart':
            $id = $_GET['id'];
            $sql_del = "DELETE FROM giohang where msgh = '$id'";
            $query_del = mysqli_query($connect, $sql_del);
            if($query_del){
                echo '<script language="javascript">window.location=" giohang.php";</script>';
                
            } else{
                echo '<script language="javascript">alert("Lỗi")</script>';
            }
            mysqli_close($connect);
            break;
            case 'cancel':
                $id = $_GET['id'];
                $tt = 'HUY';
                $sql ="UPDATE dathang SET trangthai = '$tt' where SoDonDH = '$id'";
                $query = mysqli_query($connect, $sql);
                if($query){
                    echo '<script> window.location ="donmua.php" </script>';
                }
                break;
        default:
        header('location: cart.php');
            break;
        } 
    }else require_once 'cart.php';
?>