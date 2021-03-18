<?php include "./myfunction.php"?>
<?php
    $idtv = $_COOKIE['idtv'];
    $idquan = $_COOKIE['idquan'];// tranh lay thong tin nhan vien quan khac
    $idchucvu = $_COOKIE['idchucvu'];
    
    kiemtraquyen(1,2,4,0,0);

    $idct = $_GET['idct'];

    $sql2 = "SELECT * FROM `chitiet` WHERE idct='$idct'";
    $result2 = query($sql2);
	$chitiet = $result2->fetch_array();
    $idhd = $chitiet['idhd'];

    $sql3 = "SELECT * FROM `hoadon` WHERE idhd='$idhd'";
    $result3 = query($sql3);
    $hoadon = $result3->fetch_array();
    $idban = $hoadon['idban'];

    $sql = "DELETE FROM `chitiet` WHERE idct='$idct' AND thuchien='0'";
    $result = query($sql);

    // quayve();
    chuyentrang("./chucnanghoadon.php?idban=$idban");
?>


