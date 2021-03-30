<?php include "./myfunction.php"?>
<?php
    $idtv = $_COOKIE['idtv'];
    $idquan = $_COOKIE['idquan'];// tranh lay thong tin nhan vien quan khac
    $idchucvu = $_COOKIE['idchucvu'];
    kiemtraquyen(1,2,0,0,0);

    $idbanxoa = $_GET['idbanxoa'];

    $sql = "DELETE FROM `ban` WHERE idban='$idbanxoa' AND idquan='$idquan'";
    $result = query($sql);//cau lenh di kem sql //result = true when sql success

    if($result){
        echo "
            <script>         
                alert('Ban da xoa thanh cong');
                window.location.href='./quanlyban.php';
            </script>
        ";
    }
    else{
        echo "
            <script>         
                alert('Khong xoa duoc ban');
                window.location.href='./quanlyban.php';
            </script>
        ";
    }
?>