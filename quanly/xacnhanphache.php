<?php include "./myfunction.php"?>
<?php
    $idtv = $_COOKIE['idtv'];
    $idquan = $_COOKIE['idquan'];// tranh lay thong tin nhan vien quan khac
    $idchucvu = $_COOKIE['idchucvu'];
    kiemtraquyen(1,2,3,0,0);

    $idct = $_GET['idct'];


    $sql = "UPDATE `chitiet` SET `thuchien`='$idtv' WHERE idct='$idct'";
    $result = query($sql);

    if($result){
        echo"
            <script>
                window.location.href='./phache.php';    
            </script>
        ";
    }
?>