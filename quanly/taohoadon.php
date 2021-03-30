<?php include "myfunction.php"?>
<?php
    $idtv = $_COOKIE['idtv'];
    $idquan = $_COOKIE['idquan'];// tranh lay thong tin nhan vien quan khac
    $idchucvu = $_COOKIE['idchucvu'];
    kiemtraquyen(1,2,4,0,0);

    $idban = $_GET['idban'];

    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $ngaytao = date('Y-m-d');
    $giotao = date('H:i:s');

    $sql = "SELECT * FROM `hoadon` WHERE idquan='$idquan' and idban='$idban' and trangthai = '0'";
    $result = query($sql);
    $sohang = mysqli_num_rows($result);
    if($sohang>0){
        echo"
            <script>
                alert('Ban dang co hoa don chua thanh toan');
                window.history.back();
            </script>
        ";
    }
    else{
        $sql2 = "INSERT INTO `hoadon`(`idtv`, `idban`, `idquan`, `ngaytao`, `giotao`) VALUES ('$idtv','$idban','$idquan','$ngaytao','$giotao')";
        $result2 = query($sql2);

        $sql4 = "UPDATE `ban` SET trangthai='1' WHERE idban='$idban'";
        $result4 = query($sql4);
    
        $sql3 = "SELECT * FROM `hoadon` WHERE idtv='$idtv' AND idban='$idban' AND idquan='$idquan' AND ngaytao='$ngaytao' AND giotao='$giotao'";
        $result3 = query($sql3);
    
        $row3 = $result3->fetch_array();
        $idhd = $row3['idhd'];// neu duoc thi get du lieu chu ko cai cookie vi chi xai 1 lan nhu sua va xoa
    
        if($result2){
            echo"
                <script>
                    window.location.href='./datmon.php?idhd=$idhd';
                </script>
            ";
        }
        else{
            echo"
                <script>
                    alert('Loi! Khong tao duoc hoa don.');
                    window.location.href='./chucnanghoadon.php';
                </script>
            ";
        }
    }
?>