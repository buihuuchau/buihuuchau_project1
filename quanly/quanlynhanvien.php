<?php include "./myfunction.php"?>
<?php
    $idtv = $_COOKIE['idtv'];
    $idquan = $_COOKIE['idquan'];// tranh lay thong tin nhan vien quan khac
    $idchucvu = $_COOKIE['idchucvu'];
    kiemtraquyen(1,2,0,0,0);

    $sql ="SELECT * FROM `thanhvien` WHERE idquan='$idquan'";
    $result = query($sql);
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="quanlynhanvien.css">
    <title>Quản lý nhân viên</title>
</head>
<body>
    <div class="than">

        <div class="than1"></div>

        <div class="than2">
            <center><h1>Danh sách nhân viên quán</h1></center>
            <?php
                while($row = $result->fetch_array()){
                    $idtv = $row['idtv'];// neu dat ten bien giong ben tren he thong se tu gan gia trị moi
                    $hinhtv = $row['hinhtv'];
                    $hoten = $row['hoten'];
                    $idchucvu = $row['idchucvu'];

                    $sql2 ="SELECT * FROM `chucvu` WHERE idchucvu='$idchucvu'";
                    $result2 = query($sql2);

                    $row2 = $result2->fetch_array();
                    $tenchucvu = $row2['tenchucvu'];

                    $luong = $row['luong'];
                    echo"
                        <div class='hang'>
                            <div class='hinh'><img src='$hinhtv' width='60px' height='60px'></div>
                            <div class='ttin'>Họ tên: $hoten<br>Chức vụ: $tenchucvu<br>Lương: $luong vnđ</div>
                            <div class='button'>
                                <a href='./thongtinthanhvien.php?idtvxem=$idtv' class='nut'>Xem</a>
                                <a href='./xulysuatv1.php?idtvsua=$idtv' class='nut'>Sửa</a>
                                <a href='./xulyxoatv.php?idtvxoa=$idtv' class='nut'>Xóa</a>
                            </div>
                        </div>
                    ";
                }
            ?>
            <div class="nut">
                <a href='./dangky.html' class='nut1'><center>Thêm</center></a>
                <a href='./thongtincanhan.php' class='nut1'><center>Về trang chính</center></a>
            </div>
            
                
        </div>

        <div class="than3"></div>

    </div>
</body>
</html>