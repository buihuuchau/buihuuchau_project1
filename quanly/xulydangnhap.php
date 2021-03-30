<?php include "./myfunction.php"?>
<?php
    $acc = $_POST['acc'];
    $pwd = $_POST['pwd'];
    $pwd = md5($pwd);
    
    $sql = "SELECT * FROM `thanhvien` WHERE acc='$acc' and pwd='$pwd'";
    $result = query($sql);

    $sohang = $result->num_rows;
    if($sohang > 0){
        $row = $result->fetch_array();
        $idtv = $row['idtv'];
        setcookie('idtv', $idtv, time() + 3600); 

        echo"
            <script>
                window.location.href='./thongtincanhan.php';
            </script>
        ";   
    }
    else{
        echo"
            <script>
                alert('Dang nhap that bai');
                window.location.href='./dangnhap.html';
            </script>
        ";
    }
?>