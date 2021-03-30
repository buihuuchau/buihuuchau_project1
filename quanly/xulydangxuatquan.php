<?php include "./myfunction.php"?>
<?php
    $idquan = $_COOKIE['idquan'];
    setcookie('idquan', $idquan, time() + -1);
    echo"
        <script>
            alert('Dang xuat quan thanh cong');
            window.location.href='./dangnhapquan.html';
        </script>
    ";
?>