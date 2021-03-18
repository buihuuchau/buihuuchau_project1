<?php include "./myfunction.php"?>
<?php
    $idtv = $_COOKIE['idtv'];
    setcookie('idtv', $idtv, time() + -1);
    echo"
        <script>
            alert('Dang xuat thanh cong');
            window.location.href='./dangnhap.html';
        </script>
    ";
?>