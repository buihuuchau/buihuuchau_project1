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

    $idct = $_COOKIE['idct'];
    $idmon = $_POST['idmon'];

    $con = new mysqli("localhost", "root","", "quanly");
    $con->set_charset("utf8");
    $sql = "SELECT * FROM `mon` WHERE idmon='$idmon'";
    $result = $con->query($sql);
    $con->close();

    $row = $result->fetch_array();
    $dongia = $row['dongia'];

    $soluong = $_POST['soluong'];
    $giamon = $dongia*$soluong;

    $con2 = new mysqli("localhost", "root","", "quanly");
    $con2->set_charset("utf8");
    $sql2 = "UPDATE `chitiet` SET `idmon`='$idmon',`soluong`='$soluong',`giamon`='$giamon' WHERE idct='$idct' AND thuchien='0'";
    $result2 = $con2->query($sql2);
    $con2->close();

    if($result2){
        echo"
            <script>
                alert('Sua thong tin mon thanh cong');
                window.location.href='./doimon.php';
            </script>
        ";
    }
    else{
        echo"
            <script>
                alert('Loi! Khong sua duoc thong tin mon');
                window.location.href='./doimon.php';
            </script>
        ";
    }
?>