<?php include "./myfunction.php"?>
<?php
    $idtv = $_COOKIE['idtv'];
    $idquan = $_COOKIE['idquan'];// tranh lay thong tin nhan vien quan khac
    $idchucvu = $_COOKIE['idchucvu'];

    kiemtraquyen(1,2,4,0,0);

    $idhd = $_GET['idhd'];

    $sql2 = "SELECT * FROM `chitiet` WHERE idquan='$idquan' AND idhd='$idhd' AND thuchien!='0'";
    $result2 = query($sql2);
    $thanhtien = 0;
    while($chitiet = $result2->fetch_array()){
        $idmon = $chitiet['idmon'];
        $sql4 = "SELECT * FROM `mon` WHERE idquan='$idquan' AND idmon='$idmon'";
        $result4 = query($sql4);
        $mon = $result4->fetch_array();
        $dongia = $mon['dongia'];
        $thanhtien = $thanhtien + $dongia;
    }

    $sql3 = "UPDATE `hoadon` SET `idtv`='$idtv',`thanhtien`='$thanhtien',`trangthai`='1' WHERE idhd='$idhd'";
    $result3 = query($sql3);

    if($result3){
        chuyentrang("./xulythanhtoan2.php?idhd=$idhd");
    }
    else{
        thongbao("Thanh toan that bai!");
    }
    $sql = "DELETE FROM `chitiet` WHERE idhd='$idhd' AND thuchien='0'";
    echo $sql;
    $result = query($sql);

?>