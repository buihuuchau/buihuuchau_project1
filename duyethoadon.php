<?php include "./myfunction.php"?>
<?php
    $idtv = $_COOKIE['idtv'];
    $idquan = $_COOKIE['idquan'];// tranh lay thong tin nhan vien quan khac
    $idchucvu = $_COOKIE['idchucvu'];
    kiemtraquyen(1,0,0,0,0);

    $tungay = $_COOKIE['tungay'];
    $denngay = $_COOKIE['denngay'];
    $tongthunhap = 0;

    $sql = "SELECT * FROM `hoadon` WHERE idquan='$idquan' AND thanhtien!='0'";
    $result = query($sql);

    while($row = $result->fetch_array()){
        $idhd = $row['idhd'];
        $idtvxem = $row['idtv'];
        $idbanxem = $row['idban'];
        $ngaytao = $row['ngaytao'];
        $giotao = $row['giotao'];
        $thanhtien = $row['thanhtien'];
        $tongthunhap = $tongthunhap+$thanhtien;

            $sql2 = "SELECT * FROM `thanhvien` WHERE idtv='$idtvxem'";
            $result2 = query($sql2);
            $row2 = $result2->fetch_array();
            $hoten = $row2['hoten'];

            $sql3 = "SELECT * FROM `ban` WHERE idban='$idbanxem'";
            $result3 = query($sql3);
            $row3 = $result3->fetch_array();
            $tenban = $row3['tenban'];


    $sql4 = "DELETE FROM `chitiet` WHERE idhd='$idhd'";
    $sql5 = "DELETE FROM `hoadon` WHERE idhd='$idhd'";
    $sql6 = "INSERT INTO `hoadonduyet`(`idhd`, `idquan`, `hoten`, `tenban`, `ngaytao`, `giotao`, `thanhtien`, `tungay`, `denngay`, `tongthunhap`) VALUES ('$idhd','$idquan','$hoten','$tenban','$ngaytao','$giotao','$thanhtien','$tungay','$denngay','$tongthunhap')";
    $result4 = query($sql4);
    $result5 = query($sql5);
    $result6 = query($sql6);
    }
    echo"
		<script>
			alert('Da sao luu hoa don');
			window.location.href='./quanlyhoadon.html';
		</script>
    ";
?>