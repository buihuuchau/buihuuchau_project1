<?php include "myfunction.php"?>
<script type="text/javascript" src="myfunction.js"></script>

<?php
    $idtv = $_COOKIE['idtv'];
    $idquan = $_COOKIE['idquan'];// tranh lay thong tin nhan vien quan khac
    $idchucvu = $_COOKIE['idchucvu'];

    kiemtraquyen(1,2,4,0,0);

    $idhd = $_POST['idhd'];

    $idmon = $_POST['idmon'];
        $sql3 = "SELECT * FROM `mon` WHERE idmon='$idmon' AND idquan='$idquan'";
        $result3 = query($sql3);

        $row3 = $result3->fetch_array();
        $dongia = $row3['dongia'];
    $soluong = $_POST['soluong'];
    if($soluong<=0){
        echo"
            <script>
                    alert('Dat mon that bai');
                    window.location.href='./datmon.php?idhd=$idhd';
                </script>
            ";
    }
    else{
        for($i=0;$i<$soluong;$i++){
            $sql = "INSERT INTO `chitiet`(`idhd`, `idquan`, `idmon`) VALUES ('$idhd','$idquan','$idmon')";
            $result = query($sql);
        }

        if($result){
            quayve();
        }
        else{
            quayve();
            // echo"
            //     <script>
            //         history.back();
            //     </script>
            // ";
            // echo"
            //     <script>
            //         alert('Loi! Dat mon that bai.');
            //         window.location.href='./datmon.php?idhd=$idhd';
            //     </script>
            // ";
        }
    }


?>