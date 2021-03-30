<?php include "./myfunction.php"?>
<?php
    $idtv = $_COOKIE['idtv'];
    $idquan = $_COOKIE['idquan'];// tranh lay thong tin nhan vien quan khac
    $idchucvu = $_COOKIE['idchucvu'];
    kiemtraquyen(1,2,0,0,0);

    $tenban = $_POST['tenban'];

    $sql = "SELECT * FROM `ban` WHERE idquan='$idquan'";
    $result = query($sql);

    while($row = $result->fetch_array()){
        if($row['tenban']==$tenban){
            echo "
                <script>         
                    alert('Ban nay da ton tai');
                    window.location.href='./quanlyban.php';
                </script>
            ";
            $tenban=null;
        }
    }

    if($tenban!=null){
        $sql2 = "INSERT INTO `ban`(`idquan`, `tenban`) VALUES ('$idquan','$tenban')";
        $result2 = query($sql2);

        if($result2){
            echo "
                <script>         
                    alert('Ban da them thanh cong');
                    window.location.href='./quanlyban.php';
                </script>
            ";
        }
        else{
            echo "
                <script>         
                    alert('Khong them duoc ban');
                    window.location.href='./themban.html';
                </script>
            ";
        }
    }
    else{
        echo "
            <script>         
                alert('Khong duoc de ten ban rong');
                window.location.href='./themban.html';
            </script>
        ";        
    }
?>