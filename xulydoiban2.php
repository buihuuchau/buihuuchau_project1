<?php include "./myfunction.php"?>
<?php
    $idtv = $_COOKIE['idtv'];
    $idquan = $_COOKIE['idquan'];// tranh lay thong tin nhan vien quan khac
    $idchucvu = $_COOKIE['idchucvu'];
    

    kiemtraquyen(1,2,4,0,0);

    $idhd = $_POST['idhd'];
    $idban = $_POST['idban'];
    $idbancu = $_POST['idbancu'];

    $sql = "UPDATE `hoadon` SET `idtv`='$idtv',`idban`='$idban' WHERE idhd='$idhd' AND idquan='$idquan' AND trangthai='0'";
    $result = query($sql);

    $sql2 = "UPDATE `ban` SET `trangthai`='0' WHERE idban='$idbancu'";
    $result2 = query($sql2);

    $sql3 = "UPDATE `ban` SET `trangthai`='1' WHERE idban='$idban'";
    $result3 = query($sql3);

    if($result){
        echo"
            <script>
                window.location.href='./chucnanghoadon.php?idban=$idban';
            </script>
        ";
    }
    else{
        echo"
            <script>
                alert('Loi! Doi ban that bai');
                window.location.href='./xulydoiban1.php?idhd=$idhd';
            </script>
        ";
    }

?>