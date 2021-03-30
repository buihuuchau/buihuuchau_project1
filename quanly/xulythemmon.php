<?php include "./myfunction.php"?>
<?php
    $idtv = $_COOKIE['idtv'];
    $idquan = $_COOKIE['idquan'];// tranh lay thong tin nhan vien quan khac
    $idchucvu = $_COOKIE['idchucvu'];
    kiemtraquyen(1,2,0,0,0);

    $tenmon = $_POST['tenmon'];
    $dongia = $_POST['dongia'];
    $mota = $_POST['mota'];
    $file = $_FILES['hinhmon']['tmp_name'];
    $hinhmon = "./hinh/".$_FILES['hinhmon']['name'];
    move_uploaded_file($file, $hinhmon);

    $sql = "SELECT * FROM `mon` WHERE idquan='$idquan'";
    $result = query($sql);

    while($row = $result->fetch_array()){
        if($row['tenmon']==$tenmon){
            echo "
                <script>         
                    alert('Mon nay da ton tai');
                    window.location.href='./quanlymon.php';
                </script>
            ";
            $tenmon=null;
        }
    }

    if($tenmon!=null && $dongia!=null){
        $sql2 = "INSERT INTO `mon`(`idquan`, `tenmon`, `dongia`, `mota`, `hinhmon`) VALUES ('$idquan','$tenmon','$dongia','$mota','$hinhmon')";
        $result2 = query($sql2);

        if($result2){
            echo "
                <script>         
                    alert('Ban da them thanh cong');
                    window.location.href='./quanlymon.php';
                </script>
            ";
        }
        else{
            echo "
                <script>         
                    alert('Khong them duoc mon');
                    window.location.href='./themmon.html';
                </script>
            ";
        }
    }
    else{
        echo "
            <script>         
                alert('Khong duoc de ten mon hoac gia mon rong');
                window.location.href='./themmon.html';
            </script>
        ";        
    }
?>