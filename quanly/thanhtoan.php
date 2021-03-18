<?php
    $idtv = $_COOKIE['idtv'];
    $idquan = $_COOKIE['idquan'];// tranh lay thong tin nhan vien quan khac
    $idchucvu = $_COOKIE['idchucvu'];
    if(!isset($_COOKIE['idtv'])){
        echo "
            <script>         
                alert('Ban chua dang nhap');
                window.location.href='./dangnhap.html';
            </script>
        ";
    }
    else{
        if($idchucvu == 1 || $idchucvu == 2 || $idchucvu == 4){// cap quyen theo chuc vu // SE THAY DOI PHAN NAY
        }
        else{
            echo "
                <script>
                    window.location.href='./thongtincanhan.php';    
                    alert('Ban khong co quyen truy cap trang nay!');
                </script>
            ";
        } 
    }

    $con = new mysqli("localhost", "root","", "quanly");
    $con->set_charset("utf8");
    $sql = "SELECT * FROM `ban` WHERE idquan='$idquan'";
    $result = $con->query($sql);//cau lenh di kem sql //result = true when sql success
    $con->close();
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="thanhtoan.css">
    <title>Thanh Toán Hóa Đơn</title>
</head>
<body>
    <div class="than">

        <div class="than1"></div>

        <div class="than2">
            <center>Chọn bàn để tìm hóa đơn</center><br>
            <form action="xulythanhtoan1.php" method="post">
                <label for="idban">Chọn bàn hiện tại:</label>
                <select name="idban" id="idban">
                    <?php
                        while($row = $result->fetch_array()){
                            $idban = $row['idban'];
                            $tenban = $row['tenban'];
                            echo"
                                <option value='$idban'>$tenban</option>
                            ";
                        }
                    ?>
                </select>
                <input type="submit" value="Tìm kiếm">
            </form>
            <a href='hoadon.php' class='nut'>Tùy chọn hóa đơn</a>
        </div>

        <div class="than3"></div>

    </div>  
</body>
</html>