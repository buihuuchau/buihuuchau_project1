<?php
    $idtv = $_COOKIE['idtv'];
    $idquan = $_COOKIE['idquan'];// tranh lay thong tin nhan vien quan khac
    $idchucvu = $_COOKIE['idchucvu'];
    $idhd = $_COOKIE['idhd'];

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

    $idban = $_POST['idban'];

    $con = new mysqli("localhost", "root","", "quanly");
    $con->set_charset("utf8");
    $sql = "UPDATE `hoadon` SET `idtv`='$idtv',`idban`='$idban' WHERE idhd='$idhd' AND idquan='$idquan'";
    $result = $con->query($sql);
    $con->close();

    if($result){
        echo"
            <script>
                alert('Doi ban thanh cong');
                window.location.href='./hoadon.php';
            </script>
        ";
    }
    else{
        echo"
            <script>
                alert('Loi! Doi ban that bai');
                window.location.href='./xulydoiban2.php';
            </script>
        ";
    }

?>