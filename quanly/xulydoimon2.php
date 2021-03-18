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

    $idhd = $_GET['idhd'];

    $con = new mysqli("localhost", "root","", "quanly");
    $con->set_charset("utf8");
    $sql = "SELECT * FROM `chitiet` WHERE idquan='$idquan' AND idhd='$idhd' AND thuchien='0'";
    $result = $con->query($sql);
    $con->close();
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="xulydoimon2.css">
    <title>Chọn Món Muốn Đổi</title>
</head>
<body>
    <div class="than">
        <div class="than1"></div>
        <div class="than2">
            <center>Chọn Món Muốn Đổi</center><br>
                <?php
                    while($row = $result->fetch_array()){
                        $idct = $row['idct'];
                        $idmon = $row['idmon'];

                            $con2 = new mysqli("localhost", "root","", "quanly");
                            $con2->set_charset("utf8");
                            $sql2 = "SELECT * FROM `mon` WHERE idquan='$idquan' AND idmon='$idmon'";
                            $result2 = $con2->query($sql2);
                            $con2->close();

                            $row2 = $result2->fetch_array();
                            $tenmon = $row2['tenmon'];
                            $dongia = $row2['dongia'];

                        $soluong = $row['soluong'];
                        $giamon = $row['giamon'];
                        echo"
                            idct: $idct<br>
                            Tên món: $tenmon<br>
                            Đơn giá: $dongia VNĐ<br>
                            Số lượng: $soluong<br>
                            Giá món: $giamon VNĐ&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<a href='./xulydoimon3.php?idct=$idct' class='nut'>Đổi TTin Món</a><br><br>     
                        ";
                    }
                ?>
            <a href='hoadon.php' class='nut'>Tùy chọn hóa đơn</a>
        </div>
        <div class="than3"></div>
    </div>
</body>
</html>